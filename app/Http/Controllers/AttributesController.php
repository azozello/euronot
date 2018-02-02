<?php
namespace App\Http\Controllers;
use App\ProductAttributesImages;
use Translit;
use App\ProductAttributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Languages;
use App\DefaultMetaTags;
use App\Filters;
use DB;
use Image;
class AttributesController extends Controller
{
    public function attributes_make(Request $request){
        $parent_f = $request->parent_filter;
        if(!is_null($parent_f)) {
            while ($is_active = current($parent_f)) {
                $parent_filter = key($parent_f);
                next($parent_f);
            }
        }
        else {
            $parent_filter = NULL;
        }
        foreach ($request->editor as $k => $editor) {
            if(is_null($request->name[$k])){
                return Redirect::back()->withErrors(['Введите название страницы']);
            }
            $url = $request->url[$k];
            $url = Translit::translit_lower_with_underlining($url);
            if(empty($url)){
                $url = Translit::translit_lower_with_underlining($request->name[$k]);
            }
            if(!count(ProductAttributes::where('attributes_url',$url)->get())>1){
                return Redirect::back()->withErrors(['Такой url уже занят']);
            }
            if(is_null($request->description[$k])){
                $description = DefaultMetaTags::where('type','=','attributes')->value('description');
                if(is_null($description)){
                    $description = '';
                }
            }
            else{
                $description = $request->description[$k];
            }
            if(is_null($request->title[$k])){
                $title = DefaultMetaTags::where('type','=','attributes')->value('title');
                if(is_null($request->title)){
                    $title = '';
                }
            }
            else{
                $title = $request->title[$k];
            }
//dd($request->editor[$k]);
            $data = new ProductAttributes();
            $data->attributes_name = $request->name[$k];
            $data->attributes_text = $request->editor[$k];
            $data->attributes_id = $request->number;
            $data->attributes_parent_filter = $parent_filter;
            $data->attributes_url = $url;
            $data->attributes_lang_id = $request->lang_id[$k];
            $data->attributes_title = $title;
            $data->attributes_description = $description;
            $data->save();
        }
        foreach ($request->file() as $file) {
            foreach ($file as $f) {
                if (Image::make($f)
                    ->save(public_path('attributes') . '/' . $f->getClientOriginalName())) {
                    $data = new ProductAttributesImages();
                    $data->attribute_image = $f->getClientOriginalName();
                    $data->connection_attribute_id = $request->number;
                    $data->save();
                } else {
                    return 'Ошибка загрузки';
                }
            }
        }
        return redirect()->back();
    }
    public function attributes_show_editor(Request $request){
        $attributes = ProductAttributes::where('attributes_id','=',$request->attributes_id)->get();
        $languages = Languages::where('active','=',1)->get();
        $filters = Filters::where('lang_id','=',1)->get();
        //dd($attributes);
        return view('edit_attribute',[
            'attributes' => $attributes,
            'languages' => $languages,
            'filters' => $filters,
            'images' => ProductAttributesImages::where('connection_attribute_id','=',$request->attributes_id)->get()
        ]);
    }
    public function attributes_delete(Request $request){
        ProductAttributes::where('attributes_id','=',$request->attributes_id)->delete();
        return \redirect()->back();
    }
    public function attributes_edit(Request $request){
        //dd($request);
        $parent_f = $request->parent_filter;
        if(!is_null($parent_f)) {
            while ($is_active = current($parent_f)) {
                $parent_filter = key($parent_f);
                next($parent_f);
            }
        }
        else {
            $parent_filter = NULL;
        }
        foreach ($request->editor as $k => $editor) {
            if(is_null($request->name[$k])){
                return Redirect::back()->withErrors(['Введите название страницы']);
            }
            $url = $request->url[$k];
            $url = Translit::translit_lower_with_underlining($url);
            if(empty($url)){
                $url = Translit::translit_lower_with_underlining($request->name[$k]);
            }
            $urls_count = ProductAttributes::where('attributes_url',$url)->get();
            //dd($urls_count);
            if(count($urls_count) > 1 && $urls_count[0]->attributes_url != $url){
                return Redirect::back()->withErrors(['Такой url уже занят']);
            }
            if(is_null($request->description[$k])){
                $description = DefaultMetaTags::where('type','=','attributes')->value('description');
                if(is_null($description)){
                    $description = '';
                }
            }
            else{
                $description = $request->description[$k];
            }
            if(is_null($request->title[$k])){
                $title = DefaultMetaTags::where('type','=','attributes')->value('title');
                if(is_null($request->title)){
                    $title = '';
                }
            }
            else{
                $title = $request->title[$k];
            }
            //dd($request->attributes_id);
            ProductAttributes::where('attributes_id','=',$request->attributes_id)
                ->where('attributes_lang_id','=',$request->lang_id[$k])
                ->update([
                    'attributes_name' => $request->name[$k],
                    'attributes_text' => $request->editor[$k],
                    'attributes_parent_filter' => $parent_filter,
                    'attributes_url' => $url,
                    'attributes_title' => $title,
                    'attributes_description' => $description
                ]);
        }
        ProductAttributesImages::where('connection_attribute_id','=',$request->attributes_id)->delete();
        foreach ($request->file() as $file) {
            foreach ($file as $f) {
                if (Image::make($f)
                    ->save(public_path('attributes') . '/' . $f->getClientOriginalName())) {
                    $data = new ProductAttributesImages();
                    $data->attribute_image = $f->getClientOriginalName();
                    $data->connection_attribute_id = $request->attributes_id;
                    $data->save();
                } else {
                    return 'Ошибка загрузки';
                }
            }
        }
        //dd();
        return redirect()->route('attribute_list');
    }
    public function attributes_search(Request $request){
        $attributes = DB::table('product_attributes')->
        where('product_attributes.attributes_lang_id',1)->
        where('product_attributes.attributes_name','like',$request->attribute_name.'%')->
        join('filters','product_attributes.attributes_parent_filter','=','filters.filter_id')->
        where(['filters.lang_id' => 1])->
        get();
        //dd($request->attribute_name);
        $filters = Filters::where('lang_id','=',1)->get();
        return view('attribute_list',[
            'attributes' => $attributes,
            'filters' => $filters
        ]);
    }
    public function attributes_search_by_filter(Request $request){
        if(is_null($request->filter)){
            return redirect()->route('attribute_list');
        }
        $filter_id = Filters::where('name','=',$request->filter)->value('filter_id');
        $attributes = DB::table('product_attributes')->
        where('product_attributes.attributes_lang_id',1)->
        where('product_attributes.attributes_parent_filter',$filter_id)->
        join('filters','product_attributes.attributes_parent_filter','=','filters.filter_id')->
        where(['filters.lang_id' => 1])->
        get();
        $filters = Filters::where('lang_id','=',1)->get();
        return view('attribute_list',[
            'attributes' => $attributes,
            'filters' => $filters
        ]);
    }
}