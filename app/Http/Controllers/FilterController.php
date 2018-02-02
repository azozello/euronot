<?php

namespace App\Http\Controllers;

use App\Filters;
use App\DefaultMetaTags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Languages;
use Translit;

class FilterController extends Controller
{
    public function add_filter(Request $request){
        //dd($request);
        //dd($request->is_view);
        if($request->is_view == 'on'){
            $is_view = 1;
        }
        else{
            $is_view = 0;
        }
        switch ($request->filter_type){
            case 'Чекбокс':
                $type = 1;
                break;
            case 'Ползунок':
                $type = 2;
                break;
            case 'Картинка':
                $type = 3;
                break;
            default :
                $type = 1;
        }
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
            if(count(Filters::where('url',$url)->get()) > 1){
                return Redirect::back()->withErrors(['Такой url уже занят']);
            }

            if(is_null($request->description[$k])){
                $description = DefaultMetaTags::where('type','=','filters')->value('description');
                if(is_null($description)){
                    $description = '';
                }
            }
            else{
                $description = $request->description[$k];
            }
            if(is_null($request->title[$k])){
                $title = DefaultMetaTags::where('type','=','filters')->value('title');
                if(is_null($request->title)){
                    $title = '';
                }
            }
            else{
                $title = $request->title[$k];
            }

            $data = new Filters();
            $data->is_view = $is_view;
            $data->name = $request->name[$k];
            $data->text = $request->editor[$k];
            $data->filter_id = $request->number;
            $data->parent_filter = $parent_filter;
            $data->url = $url;
            $data->is_active = 1;
            $data->lang_id = $request->lang_id[$k];
            $data->title = $title;
            $data->type = $type;
            $data->description = $description;
            $data->save();
        }
        return redirect()->back();
    }
    public function delete_filter(Request $request){
        //dd($request);
        Filters::where('filter_id','=',$request->filter_id)->delete();
        Filters::where('parent_filter','=',$request->filter_id)->delete();
        return redirect()->back();
    }
    public function edit_filter_show(Request $request){
        $filters = Filters::where('filter_id','=',$request->filter_id)->get();
        $all_filters = Filters::where('lang_id','=',1)->get();
        foreach($filters as $filter){
            $languages[] = Languages::where('id','=',$filter->lang_id)->get()->toArray();
        }
        $parent_filter = Filters::where('filter_id','=',$filters[0]->parent_filter)->where('lang_id','=',1)->value('name');
        //dd($languages[0][0]['id']);
        return view('edit_filter',[
            'filters' => $filters,
            'languages' => $languages,
            'parent_filter' => $parent_filter,
            'all_filters' => $all_filters,
            'this_filter' => $filters[0]->filter_id
        ]);
    }
    public function edit_filter(Request $request){
        //dd($request);
        if($request->is_view == 'on'){
            $is_view = 1;
        }
        else{
            $is_view = 0;
        }
        switch ($request->filter_type){
            case 'Чекбокс':
                $type = 1;
                break;
            case 'Ползунок':
                $type = 2;
                break;
            case 'Картинка':
                $type = 3;
                break;
            default :
                $type = 1;
        }
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
        if($parent_filter == $request->filter_id){
            return Redirect::back()->withErrors(['Нельзя наследоваться от саммого себя']);
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
            $urls_count = Filters::where('url',$url)->get();
            if(count($urls_count) > 1 && $urls_count[0]->url != $url){
                return Redirect::back()->withErrors(['Такой url уже занят']);
            }

            if(is_null($request->description[$k])){
                $description = DefaultMetaTags::where('type','=','filters')->value('description');
                if(is_null($description)){
                    $description = '';
                }
            }
            else{
                $description = $request->description[$k];
            }
            if(is_null($request->title[$k])){
                $title = DefaultMetaTags::where('type','=','filters')->value('title');
                if(is_null($request->title)){
                    $title = '';
                }
            }
            else{
                $title = $request->title[$k];
            }
            Filters::where('filter_id','=',$request->filter_id)
                ->where('lang_id','=',$request->lang_id[$k])
                ->update([
                    'name' => $request->name[$k],
                    'text' =>$request->editor[$k],
                    'parent_filter' =>$parent_filter,
                    'url' =>$url,
                    'is_view' => $is_view,
                    'type' => $type,
                    'title' =>$title,
                    'description' => $description
                ]);
        }

        return redirect()->back();
    }
    public function search_filter(Request $request){
       // dd($request);
        $filters = Filters::where('lang_id','=',1)->where('name','LIKE',$request->filter_name.'%')->get();
        return view('filter_list',[
            'filters' => $filters
        ]);
    }

}
