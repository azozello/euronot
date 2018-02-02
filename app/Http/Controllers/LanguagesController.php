<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Languages;
use App\PagesNews;
use App\News;
use Redirect;
use App\Http\Middleware\LocaleMiddleware;
use Request as Req;

class LanguagesController extends Controller
{
    public function languages_edit(Request $request){
        $language = Languages::where('id','=',$request->id)->get();
        return view('languages_edit',[
            'language' => $language
        ]);
    }
    public function languages_edit_make(Request $request){
        //dd($request);
        Languages::where('id','=',$request->id)->update(['language_name' => $request->name , 'language_url' => $request->url, 'sort' => $request->sort]);
        foreach ($request->file() as $f) {
                if ($f->move(public_path('images/flags'),$f->getClientOriginalName())) {
                    Languages::where('id','=',$request->id)->update(['icon' => 'images/flags/'.$f->getClientOriginalName()]);
                } else {
                    return 'Ошибка загрузки';
                }
            }
        return redirect()->route('languages');
    }
    public function setlocale($lang){
        //dd($lang);
        $referer = Redirect::back()->getTargetUrl(); //URL предыдущей страницы
        $parse_url = parse_url($referer, PHP_URL_PATH); //URI предыдущей страницы
        //разбиваем на массив по разделителю
        $segments = explode('/', $parse_url);

        //Если URL (где нажали на переключение языка) содержал корректную метку языка
        if (in_array($segments[1], LocaleMiddleware::$languages)) {

            unset($segments[1]); //удаляем метку
        }
//dd($segments);
        //Добавляем метку языка в URL (если выбран не язык по-умолчанию)
      //  if ($lang != LocaleMiddleware::$mainLanguage){
            array_splice($segments, 1, 0, $lang);
      //  }
        //dd($segments);
        $segments = array_reverse($segments);
        //dd($segments);
        $language = Languages::where('language_url','=',$segments[2])->get();
        $lang_id = $language[0]->id;
        //dd($segments);
        if($language[0]->sort == 1){
           unset($segments[2]);
        }
        //dd($segments);
        switch ($segments[0]){
            case 'news_page':
                $current_page = News::where('url','=',$segments[0])->get();
                $same_pages = News::where('page_id','=',$current_page[0]->page_id)->get();
                foreach ($same_pages as $pages){
                    if($pages->page_lang == $lang_id){
                        $new_url = $pages->url;
                    }
                }
                break;
            case 'article':
                $current_page = PagesNews::where('url','=',$segments[0])->get();
                //dd($segments);
                $same_pages = PagesNews::where('page_id','=',$current_page[0]->page_id)->get();
                foreach ($same_pages as $pages){
                    if($pages->page_lang == $lang_id){
                        $new_url = $pages->url;
                    }
                }
                break;
            default :
                $new_url = '';
        }

        //dd($segments);
        $segments = array_reverse($segments);
        //формируем полный URL
        $url = Req::root().implode("/", $segments);
        //dd($url);
        //если были еще GET-параметры - добавляем их
        if(parse_url($referer, PHP_URL_QUERY)){
            $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
        }
        //dd($url);
        return redirect($url); //Перенаправляем назад на ту же страницу
    }
    public function languages_set_condition(Request $request){
     //dd($request);
     for($i=0;$i<20;$i++){
      $checkbox = 'checkbox'.$i;
      if(isset($request->$checkbox)) {
          $condition = 1;
      }
      else{
          $condition = 0;
      }
         Languages::where('id','=',$i+1)->update(['active'=>$condition]);
      }
      return redirect()->back();
    }
}
