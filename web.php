<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => App\Http\Middleware\LocaleMiddleware::getLocale()], function() {
    Route::get('/news_page/{url}', 'PagesController@news_page_show');
    Route::get('/article/{url}', 'PagesController@article_show');
});

Route::group(['prefix'=>'admin','middleware'=>['auth']],function(){
    Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
    // Доступ разрешён только аутентифицированным пользователям...
Route::post('/download',['uses'=>'imgController@download','as'=>'download']);
Route::get('/editor1',['uses'=>'EditorController@show','as'=>'editor']);
Route::post('/add_text',['uses'=>'EditorController@add_text','as'=>'add_text']);

Route::get('/texts',['uses'=>'EditorController@texts','as'=>'texts']);
Route::get('/texts/{url}','EditorController@choosen_texts');

Route::get('/editor',['uses'=>'EditorController@show_editor','as'=>'show_editor']);  //редактор
Route::post('/add_page',['uses'=>'EditorController@add_page','as'=>'add_page']);

Route::get('/',['uses'=>'PagesController@pages_list','as'=>'pages_list']);//панель страниц
Route::get('/search_page',['uses'=>'PagesController@search_page','as'=>'search_page']);
Route::get('/edit_page_show',['uses'=>'EditorController@edit_page_show','as'=>'edit_page_show']);
Route::post('/edit_page',['uses'=>'EditorController@edit_page','as'=>'edit_page']);
Route::post('/delete_page',['uses'=>'EditorController@delete_page','as'=>'delete_page']);


Route::get('/news_editor',['uses'=>'PagesController@news_editor','as'=>'news_editor']);//новости
Route::get('/news',['uses'=>'PagesController@show_news','as'=>'show_news']);
    Route::get('/edit_news_show',['uses'=>'EditorController@edit_news_show','as'=>'edit_news_show']);
    Route::post('/edit_news',['uses'=>'EditorController@edit_news','as'=>'edit_news']);
Route::post('/add_news',['uses'=>'EditorController@add_news','as'=>'add_news']);
Route::post('/delete_news',['uses'=>'EditorController@delete_news','as'=>'delete_news']);


Route::get('/photos',['uses'=>'PagesController@photos','as'=>'photos']); //галерея
Route::post('/add_new_photos',['uses'=>'PhotosController@add_new_photos','as'=>'add_new_photos']);
Route::post('/delete_gallery_images',['uses'=>'PhotosController@delete_gallery_images','as'=>'delete_gallery_images']);
Route::get('/config',['uses'=>'imgController@config','as'=>'config']);

Route::post('/upload_meta_tags',['uses'=>'PhotosController@upload_meta_tags','as'=>'upload_meta_tags']); //мета-теги

Route::get('/reviews',['uses'=>'PagesController@reviews','as'=>'reviews']);//отзывы
Route::get('/make_new',['uses'=>'ReviewController@make_new','as'=>'make_new']);
Route::post('/reviews_update',['uses'=>'ReviewController@reviews_update','as'=>'reviews_update']);
Route::post('/reviews_delete',['uses'=>'ReviewController@reviews_delete','as'=>'reviews_delete']);

Route::get('/organization',['uses'=>'PagesController@organization','as'=>'organization']);
Route::post('/upload_organization',['uses'=>'EditorController@upload_organization','as'=>'upload_organization']);//про организацию

Route::get('/sliders',['uses'=>'PagesController@sliders','as'=>'sliders']); //слайдер
Route::get('/add_slider',['uses'=>'PhotosController@add_slider','as'=>'add_slider']);
Route::post('/slider_update',['uses'=>'PhotosController@slider_update','as'=>'slider_update']);
Route::post('/delete_slider',['uses'=>'PhotosController@delete_slider','as'=>'delete_slider']);

Route::get('/feedback',['uses'=>'PagesController@feedback','as'=>'feedback']);//форма обратной связи
Route::post('/feedback_name',['uses'=>'PostController@feedback_name','as'=>'feedback_name']);
Route::post('/feedback_mail',['uses'=>'PostController@feedback_mail','as'=>'feedback_mail']);

Route::get('/languages',['uses'=>'PagesController@languages','as'=>'languages']); //языки
Route::get('/languages_set_condition',['uses'=>'LanguagesController@languages_set_condition','as'=>'languages_set_condition']);
Route::get('/languages_edit',['uses'=>'LanguagesController@languages_edit','as'=>'languages_edit']);
Route::post('/languages_edit_make',['uses'=>'LanguagesController@languages_edit_make','as'=>'languages_edit_make']);

Route::post('/mail',['uses'=>'PostController@mail','as'=>'mail']); //почта
Route::get('/post',['uses'=>'PagesController@post','as'=>'post']);

Route::get('/subscription',['uses'=>'PagesController@subscription','as'=>'subscription']); //подписки
Route::post('/subscription_template',['uses'=>'PostController@subscription_template','as'=>'subscription_template']);
Route::post('/subscription_send',['uses'=>'PostController@subscription_send','as'=>'subscription_send']);

Route::get('/text_blocks',['uses'=>'PagesController@text_blocks','as'=>'text_blocks']); //text_blocks
Route::post('/text_blocks_update',['uses'=>'EditorController@text_blocks_update','as'=>'text_blocks_update']);

Route::get('/site_map',['uses'=>'PagesController@site_map','as'=>'site_map']); //sitemap
Route::post('/site_map_generate',['uses'=>'PagesController@site_map_generate','as'=>'site_map_generate']);
Route::get('/site_map_pages',['uses'=>'PagesController@site_map_pages','as'=>'site_map_pages']);
Route::get('/site_map_news',['uses'=>'PagesController@site_map_news','as'=>'site_map_news']);

Route::get('/robots',['uses'=>'PagesController@robots','as'=>'robots']); //robots.txt
Route::post('/robots_update',['uses'=>'PagesController@robots_update','as'=>'robots_update']);

Route::get('/images_zip',['uses'=>'PagesController@images_zip','as'=>'images_zip']); //сжатие картинок
Route::post('/images_zip',['uses'=>'imgController@images_zip','as'=>'images_zip']);

Route::get('/redirect',['uses'=>'PagesController@redirect','as'=>'redirect']); //перенаправление
Route::get('/new_redirect',['uses'=>'PathController@new_redirect','as'=>'new_redirect']);
Route::post('/update_redirect',['uses'=>'PathController@update_redirect','as'=>'update_redirect']);

Route::get('/cache',['uses'=>'PagesController@cache','as'=>'cache']); //кэщ
Route::post('/cache_on',['uses'=>'CacheController@cache_on','as'=>'cache_on']);
Route::post('/cache_off',['uses'=>'CacheController@cache_off','as'=>'cache_off']);
Route::post('/cache_clean',['uses'=>'CacheController@cache_clean','as'=>'cache_clean']);

Route::get('/meta_tags',['uses'=>'PagesController@meta_tags','as'=>'meta_tags']); //настрйока мета тегов
Route::post('/default_meta_tags',['uses'=>'MetaTagsController@default_meta_tags','as'=>'default_meta_tags']);

Route::get('/product_list',['uses'=>'PagesController@product_list','as'=>'product_list']);

Route::get('/product_categories',['uses'=>'PagesController@product_categories','as'=>'product_categories']);

Route::get('/filter_editor',['uses'=>'PagesController@filter_editor','as'=>'filter_editor']);

Route::get('/product_card',['uses'=>'PagesController@product_card','as'=>'product_card']);
});
Auth::routes();

Route::get('setlocale/{lang}','LanguagesController@setlocale')->name('setlocale');


Route::get('/home', 'HomeController@index')->name('home');
