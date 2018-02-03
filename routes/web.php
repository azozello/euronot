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
use App\Events\eventTrigger;

Route::group(['prefix' => App\Http\Middleware\LocaleMiddleware::getLocale()], function() {
    Route::get('/news_page/{url}', 'PagesController@news_page_show');
    Route::get('/article/{url}', 'PagesController@article_show');

Route::get('/coffee/{url?}',['uses'=>'PagesController@show_site_index','as'=>'show_site_index']);
Route::get('/refresh_page',['uses'=>'PagesController@refresh_page','as'=>'refresh_page']);
Route::get('/cart',['uses'=>'PagesController@cart_show','as'=>'cart_show']);
Route::post('/add_to_cart',['uses'=>'CartController@add_to_cart','as'=>'add_to_cart']);
    Route::post('/delete_from_cart',['uses'=>'CartController@delete_from_cart','as'=>'delete_from_cart']);
    Route::post('/quantity_change',['uses'=>'CartController@quantity_change','as'=>'quantity_change']);
    Route::post('/issue_order',['uses'=>'CartController@issue_order','as'=>'issue_order']);
    Route::post('/add_order',['uses'=>'CartController@add_order','as'=>'add_order']);
});
Route::get('/choose_warehouse',['uses'=>'CartController@choose_warehouse','as'=>'choose_warehouse']);


Route::get('/alertBox',function(){
    return view('eventListener');
});
Route::get('/fireEvent',function(){
    event(new eventTrigger());
});

Route::get('/moniki',function(){
    return view('site.moniki');
});
Route::get('/bloki',function(){
    return view('site.bloki');
});
Route::get('/contact',function(){
    return view('site.contact');
});
Route::get('/news',function(){
    return view('site.news');
});
Route::get('/delivery',function(){
    return view('site.delivery');
});
Route::get('/garanty',function(){
    return view('site.garanty');
});
Route::get('/about', function () {
    return view('site.about');
});
Route::get('/no_book', function () {
    return view('site.noubuki');
});
Route::get('/test_main', function () {
    return view('site.test_index');
});
Route::group(['prefix'=>'admin/page','middleware'=>['auth']],function(){
    Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
    // Доступ разрешён только аутентифицированным пользователям...
    Route::get('/show_client_book',['uses'=>'PagesController@show_client_book','as'=>'show_client_book']);
    Route::get('/show_supplier_book',['uses'=>'PagesController@show_supplier_book','as'=>'show_supplier_book']);
    Route::get('/show_shipment_book',['uses'=>'PagesController@show_shipment_book','as'=>'show_shipment_book']);
    Route::get('/show_remainder_book',['uses'=>'PagesController@show_remainder_book','as'=>'show_remainder_book']);

    Route::get('/show_order_products',['uses'=>'OrderBooks\ClientBookController@show_order_products','as'=>'show_order_products']); //дочерняя таблица client_book
    Route::get('/show_arriving_info',['uses'=>'OrderBooks\ArrivingOrdersController@show_arriving_info','as'=>'show_arriving_info']); //дочерняя таблица arriving_orders
    Route::get('/show_seller_products',['uses'=>'OrderBooks\SellerOrdersController@show_seller_products','as'=>'show_seller_products']); //дочерняя таблица seller_order

    Route::get('/show_seller_product_make',['uses'=>'OrderBooks\SellerOrdersController@show_seller_product_make','as'=>'show_seller_product_make']); //создание заказа поставщику
    Route::get('/seller_products_autogenerate',['uses'=>'OrderBooks\SellerOrdersController@seller_products_autogenerate','as'=>'seller_products_autogenerate']);
    Route::post('/seller_products_save',['uses'=>'OrderBooks\SellerOrdersController@seller_products_save','as'=>'seller_products_save']);
    Route::get('/seller_products_add_field',['uses'=>'OrderBooks\SellerOrdersController@seller_products_add_field','as'=>'seller_products_add_field']);
    Route::get('/seller_order_get',['uses'=>'OrderBooks\SellerOrdersController@seller_order_get','as'=>'seller_order_get']);

    Route::get('/arriving_order_make_new',['uses'=>'OrderBooks\ArrivingOrdersController@arriving_order_make_new','as'=>'arriving_order_make_new']);
    Route::get('/arriving_change_order_show',['uses'=>'OrderBooks\ArrivingOrdersController@arriving_change_order_show','as'=>'arriving_change_order_show']);
    Route::get('/arriving_change_order',['uses'=>'OrderBooks\ArrivingOrdersController@arriving_change_order','as'=>'arriving_change_order']);
    Route::get('/arriving_order_ship',['uses'=>'OrderBooks\ArrivingOrdersController@arriving_order_ship','as'=>'arriving_order_ship']);
    Route::get('/arriving_order_ship_success',['uses'=>'OrderBooks\ArrivingOrdersController@arriving_order_ship_success','as'=>'arriving_order_ship_success']);
    Route::get('/arriving_order_ship_break',['uses'=>'OrderBooks\ArrivingOrdersController@arriving_order_ship_break','as'=>'arriving_order_ship_break']);

    Route::get('/dropDB',['uses'=>'OrderBooks\ArrivingOrdersController@dropDB','as'=>'dropDB']);

    Route::get('/show_index',['uses'=>'PagesController@show_index','as'=>'show_index']);

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

    Route::get('/object_editor_vent',['uses'=>'PagesController@object_editor_vent','as'=>'object_editor_vent']);  //обьекты
    Route::post('/object_new',['uses'=>'EditorController@object_new','as'=>'object_new']);
    Route::get('/object_list',['uses'=>'PagesController@object_list','as'=>'object_list']);
    Route::get('/edit_object_show',['uses'=>'EditorController@edit_object_show','as'=>'edit_object_show']);
    Route::post('/edit_object',['uses'=>'EditorController@edit_object','as'=>'edit_object']);
    Route::post('/delete_object',['uses'=>'EditorController@delete_object','as'=>'delete_object']);
    Route::get('/object_image_delete',['uses'=>'EditorController@object_image_delete','as'=>'object_image_delete']);
    Route::get('/search_objects',['uses'=>'PagesController@search_objects','as'=>'search_objects']);


Route::get('/news_editor',['uses'=>'PagesController@news_editor','as'=>'news_editor']);//новости
Route::get('/news',['uses'=>'PagesController@show_news','as'=>'show_news']);
    Route::get('/edit_news_show',['uses'=>'EditorController@edit_news_show','as'=>'edit_news_show']);
    Route::post('/edit_news',['uses'=>'EditorController@edit_news','as'=>'edit_news']);
Route::post('/add_news',['uses'=>'EditorController@add_news','as'=>'add_news']);
Route::post('/delete_news',['uses'=>'EditorController@delete_news','as'=>'delete_news']);
    Route::get('/search_news',['uses'=>'PagesController@search_news','as'=>'search_news']);


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
    Route::get('/site_map_objects',['uses'=>'PagesController@site_map_objects','as'=>'site_map_objects']);

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

    Route::get('/menu/{url?}',['uses'=>'PagesController@menu','as'=>'menu']);
    Route::get('/menu_list',['uses'=>'PagesController@menu_list','as'=>'menu_list']);
    Route::get('/menu_edit',['uses'=>'PagesController@menu_edit','as'=>'menu_edit']);
    Route::get('/menu_redirect',['uses'=>'PagesController@menu_redirect','as'=>'menu_redirect']);

    Route::get('/analytics',['uses'=>'PagesController@analytics','as'=>'analytics']);
    Route::post('/analytics_change',['uses'=>'PagesController@analytics_change','as'=>'analytics_change']);

Route::get('/product_list',['uses'=>'PagesController@product_list','as'=>'product_list']);

Route::get('/attribute_list',['uses'=>'PagesController@attribute_list','as'=>'attribute_list']);

Route::get('/filter_list',['uses'=>'PagesController@filter_list','as'=>'filter_list']);

Route::get('/filter_editor',['uses'=>'PagesController@filter_editor','as'=>'filter_editor']);   //фильтры\
Route::post('/add_filter',['uses'=>'FilterController@add_filter','as'=>'add_filter']);
Route::get('/delete_filter',['uses'=>'FilterController@delete_filter','as'=>'delete_filter']);
Route::get('/search_filter',['uses'=>'FilterController@search_filter','as'=>'search_filter']);
Route::post('/edit_filter',['uses'=>'FilterController@edit_filter','as'=>'edit_filter']);
    Route::get('/edit_filter_show',['uses'=>'FilterController@edit_filter_show','as'=>'edit_filter_show']);

    Route::get('/attribute_editor',['uses'=>'PagesController@attribute_editor','as'=>'attribute_editor']);   //атрибуты
    Route::post('/attributes_make',['uses'=>'AttributesController@attributes_make','as'=>'attributes_make']);
    Route::get('/attributes_delete',['uses'=>'AttributesController@attributes_delete','as'=>'attributes_delete']);
    Route::get('/attributes_search',['uses'=>'AttributesController@attributes_search','as'=>'attributes_search']);
    Route::get('/attributes_search_by_filter',['uses'=>'AttributesController@attributes_search_by_filter','as'=>'attributes_search_by_filter']);
    Route::post('/attributes_show_editor',['uses'=>'AttributesController@attributes_show_editor','as'=>'attributes_show_editor']);
    Route::post('/attributes_edit',['uses'=>'AttributesController@attributes_edit','as'=>'attributes_edit']);

    Route::get('/product_categories',['uses'=>'PagesController@product_categories','as'=>'product_categories']);  //категории
    Route::post('/categories_active',['uses'=>'CategoryController@categories_active','as'=>'categories_active']);
    Route::get('/categories_delete',['uses'=>'CategoryController@categories_delete','as'=>'categories_delete']);
    Route::post('/categories_edit_show',['uses'=>'CategoryController@categories_edit_show','as'=>'categories_edit_show']);
    Route::post('/categories_edit',['uses'=>'CategoryController@categories_edit','as'=>'categories_edit']);
    Route::get('/categories_editor',['uses'=>'PagesController@categories_editor','as'=>'categories_editor']);  //создание категорий
Route::post('/categories_make',['uses'=>'CategoryController@categories_make','as'=>'categories_make']);

    Route::post('/product_card_add',['uses'=>'ProductCardController@product_card_add','as'=>'product_card_add']);
Route::get('/product_card',['uses'=>'PagesController@product_card','as'=>'product_card']);
    Route::get('/delete_product',['uses'=>'ProductCardController@delete_product','as'=>'delete_product']);
    Route::get('/search_product',['uses'=>'ProductCardController@search_product','as'=>'search_product']);
    Route::post('/edit_product',['uses'=>'ProductCardController@edit_product','as'=>'edit_product']);
    Route::get('/edit_product_show',['uses'=>'ProductCardController@edit_product_show','as'=>'edit_product_show']);
    Route::get('/search_by_article',['uses'=>'ProductCardController@search_by_article','as'=>'search_by_article']);
    Route::get('/search_by_name',['uses'=>'ProductCardController@search_by_name','as'=>'search_by_name']);
    Route::get('/search_by_category',['uses'=>'ProductCardController@search_by_category','as'=>'search_by_category']);
    Route::get('/change_price',['uses'=>'ProductCardController@change_price','as'=>'change_price']);
    Route::get('/change_product_active',['uses'=>'ProductCardController@change_product_active','as'=>'change_product_active']);

    Route::get('/supplier_list',['uses'=>'PagesController@supplier_list','as'=>'supplier_list']);  //поставщики
    Route::get('/add_supplier',['uses'=>'SupplierController@add_supplier','as'=>'add_supplier']);
    Route::post('/edit_supplier',['uses'=>'SupplierController@edit_supplier','as'=>'edit_supplier']);
    Route::get('/edit_old_supplier',['uses'=>'SupplierController@edit_old_supplier','as'=>'edit_old_supplier']);


Route::get('/page_editor_vent',['uses'=>'PagesController@page_editor_vent','as'=>'page_editor_vent']);
    Route::get('/admin_list',['uses'=>'PagesController@admin_list','as'=>'admin_list']);
    Route::post('/admin_delete',['uses'=>'PagesController@admin_delete','as'=>'admin_delete']);
    Route::get('/logout_out',['uses'=>'PagesController@logout','as'=>'logout_out']);


    Route::get('register_adm', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register_adm', 'Auth\RegisterController@register');
});
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('/register_show',['uses'=>'PagesController@register_show','as'=>'register_show']);
Route::get('register_adm', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register_adm', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('setlocale/{lang}','LanguagesController@setlocale')->name('setlocale');
Route::get('/error',['uses'=>'PagesController@error_show','as'=>'error_show']);


Route::get('/home', 'HomeController@index')->name('home');
