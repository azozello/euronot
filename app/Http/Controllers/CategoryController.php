<?php

namespace App\Http\Controllers;

use App\Category;
use App\Languages;
use Illuminate\Http\Request;
use App\DefaultMetaTags;
use Illuminate\Support\Facades\Redirect;
use Translit;

class CategoryController extends Controller
{
    public function categories_make(Request $request){
        if(is_null($request->parent_category)){
            $category_id = NULL;
        }
        else{
            $category = Category::where('name','=',$request->parent_category)->get();
            $category_id = $category[0]->category_id;
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
            if(!count(Category::where('url',$url)->get()) > 1){
                return Redirect::back()->withErrors(['Такой url уже занят']);
            }

            if(is_null($request->description[$k])){
                $description = DefaultMetaTags::where('type','=','category')->value('description');
                if(is_null($description)){
                    $description = '';
                }
            }
            else{
                $description = $request->description[$k];
            }
            if(is_null($request->title[$k])){
                $title = DefaultMetaTags::where('type','=','category')->value('title');
                if(is_null($request->title)){
                    $title = '';
                }
            }
            else{
                $title = $request->title[$k];
            }

            $data = new Category();
            $data->name = $request->name[$k];
            $data->text = $request->editor[$k];
            $data->category_id = $request->number;
            $data->parent_category_id = $category_id;
            $data->url = $url;
            $data->is_active = 1;
            $data->lang_id = $request->lang_id[$k];
            $data->title = $title;
            $data->down_text = $request->foot[$k];
            $data->description = $description;
            $data->save();
        }
        return redirect()->back();
    }
    public function categories_active(Request $request){
        //dd($request);
        $ru = $request->ru;
        $ua = $request->ua;
        //dd($ua);
        //dd($ru);
        if(!is_null($ru)) {
            while ($is_active = current($ru)) {
                //dd(current($ru));
                if (current($ru) == 'on') {
                    $condition = 1;
                } else {
                    $condition = 0;
                }
                //dd($condition);
                Category::where('category_id', '=', key($ru))->where('lang_id', '=', 1)->update(['is_active' => $condition]);
                next($ru);
            }
        }
        if(!is_null($ua)) {
            while ($is_active = current($ua)) {
                if (current($ua) == 'on') {
                    $condition = 1;
                } else {
                    $condition = 0;
                }
                Category::where('category_id', '=', key($ua))->where('lang_id', '=', 2)->update(['is_active' => $condition]);
                next($ua);
            }
        }
        return redirect()->back();
    }
    public function categories_delete(Request $request){
        Category::where('category_id','=',$request->category_id)->delete();
        Category::where('parent_category_id','=',$request->category_id)->delete();
        return redirect()->back();
}
    public function categories_edit_show(Request $request){
        $categories = Category::where('category_id','=',$request->category_id)->get();
        $all_categories = Category::where('lang_id','=',1)->where('category_id','<',$request->category_id)->get();
        $languages = array();
        foreach($categories as $category){
            $languages[] = Languages::where('id','=',$category->lang_id)->get()->toArray();
        }
        $parent_category =Category::where('category_id','=',$categories[0]->parent_category_id)->where('lang_id','=',1)->value('name');
        return view('edit_categories',[
            'categories' => $categories,
            'languages' => $languages,
            'parent_category' => $parent_category,
            'all_categories' => $all_categories,
            'its_category' => $request->category_id
        ]);
    }
    public function categories_edit(Request $request){
        if(is_null($request->parent_category)){
            $category_id = NULL;
        }
        else{
            $category = Category::where('name','=',$request->parent_category)->get();
            $category_id = $category[0]->category_id;
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
            $urls_count = Category::where('url',$url)->get();
            if(count($urls_count) > 1 && $urls_count[0]->url != $url){
                return Redirect::back()->withErrors(['Такой url уже занят']);
            }

            if(is_null($request->description[$k])){
                $description = DefaultMetaTags::where('type','=','category')->value('description');
                if(is_null($description)){
                    $description = '';
                }
            }
            else{
                $description = $request->description[$k];
            }
            if(is_null($request->title[$k])){
                $title = DefaultMetaTags::where('type','=','category')->value('title');
                if(is_null($request->title)){
                    $title = '';
                }
            }
            else{
                $title = $request->title[$k];
            }
            Category::where('category_id','=',$request->category_id)
                ->where('lang_id','=',$request->lang_id[$k])
                ->update([
                    'name' => $request->name[$k],
                    'down_text' => $request->foot[$k],
                    'text' =>$request->editor[$k],
                    'parent_category_id' =>$category_id,
                    'url' =>$url,
                    'title' =>$title,
                    'description' => $description
                ]);
        }
        return redirect()->route('product_categories');
    }
}
