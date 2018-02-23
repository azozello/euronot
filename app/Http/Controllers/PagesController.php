<?php

namespace App\Http\Controllers;

use App\ArrivingOrders;
use App\Cart;
use App\Cities;
use App\Helpers\Facades\AppliedMethods;
use App\NonStandartPagesMain;
use App\NonStandartPagesText;
use App\Orders;
use App\Regions;
use App\SellerOrders;
use App\Suppliers;
use App\Traders;
use App\UsersPhoneNumbers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\AboutCompany;
use App\AboutUsMenu;
use App\Analytics;
use App\Users;
use App\Category;
use App\Contacts;
use App\ImagesProperties;
use App\ObjectImages;
use App\Objects;
use App\ProductAttributes;
use App\Promotions;
use App\SubscriptionTemplate;
use App\PagesNews;
use App\News;
use App\Photos;
use App\Review;
use App\Organization;
use App\Post;
use App\Slider;
use App\Feedback;
use App\CacheModel;
use App\SiteMap;
use App\Robots;
use App\Redirects;
use App\Subscription;
use App\DefaultMetaTags;
use App\Filters;
use App\ProductsCategoriesConnection;
use App\Products;
use App\Languages;
use App;
use Lang;
use DB;
use URL;
use View;
use Request as RequestFacade;
use File;
use Redirect;
use SessionVariables;
use GraphGenerate;
use SiteMap as SiteMapFacade;



class PagesController extends Controller
{
    public function show_site_index(){
            return view('site.index');
    }
    public function show_cart(){
        return view('site.cart');
    }
    public function show_contact(){
        return view('site.contact');
    }
    public function show_delivery(){
        return view('site.delivery');
    }
    public function show_site_news(Request $request){
        return view('site.news',[
            'all_news' => News::where('name','!=',NULL)->where('page_lang','=',1)->paginate(30)->appends($request->all())
        ]);
    }

    public function show_one_news($url) {
        return view('site.news-inner',[
            'page_array' => News::where('url',$url)->get()[0]->attributesToArray()
        ]);
    }
    public function show_warranty(){
        return view('site.warranty');
    }
    public function show_products(){
        return view('site.products-263');
    }
    public function show_about(){
        $about_text = AboutCompany::get()[0]->attributesToArray()['about_company_text'];
        return view('site.about', [
            'text' => $about_text
        ]);
    }
    ////////////////////////////////////////////////////////////////////////////
    public function page_main(){
        $connection_count = GraphGenerate::generate_connection_count_graph('month');
        $orders_date = GraphGenerate::generate_order_graph('month');
        if(isset($_GET['month'])){
            $orders_date = GraphGenerate::generate_order_graph('month');
        }
        if(isset($_GET['3_months'])){
            $orders_date = GraphGenerate::generate_order_graph('3 months');
        }
        if(isset($_GET['6_months'])){
            $orders_date = GraphGenerate::generate_order_graph('6 months');
        }
        if(isset($_GET['year'])){
            $orders_date = GraphGenerate::generate_order_graph('year');
        }
        if(isset($_GET['connection_month'])){
            $connection_count = GraphGenerate::generate_connection_count_graph('month');
        }
        if(isset($_GET['connection_3_months'])){
            $connection_count = GraphGenerate::generate_connection_count_graph('3 months');
        }
        if(isset($_GET['connection_6_months'])){
            $connection_count = GraphGenerate::generate_connection_count_graph('6 months');
        }
        if(isset($_GET['connection_year'])){
            $connection_count = GraphGenerate::generate_connection_count_graph('year');
        }
        $orders = Orders::orderBy('id', 'desc')->take(10)->get();
        return view('page_main',[
            'dates' => $orders_date['date'],
            'count' => $orders_date['count'],
            'connection_dates' => $connection_count['date'],
            'connection_count' => $connection_count['count'],
            'orders' => $orders
        ]);
    }

    public function non_standart_pages_show(){
        return view('non_standart_pages');
    }

    public function object_editor_vent(){

        SessionVariables::set_session_variable('floder','promotion_images');

        return view('object_editor_vent',[
            'promotions' => Promotions::get()
        ]);
    }

    public function object_list(){

        SessionVariables::set_session_variable('floder','images');

        $objects = Objects::paginate(20);

        foreach ($objects as $object){
            $images[] = ObjectImages::where('object_id','=',$object->object_id)->value('images_name');
        }
        return view('object_list',[
            'images' => AppliedMethods::null_if_not_isset($images),
            'objects' => $objects,
            'num' => 0
        ]);
    }
    public function pages_list(Request $request){
        SessionVariables::set_session_variable('floder','pages_images');
        return view('pages_list',[
            'pages' => PagesNews::where('page_name','!=',NULL)->where('page_lang','=',1)->paginate(30)->appends($request->all()),
            'num' => 0
        ]);
    }
    public function search_page(Request $request){
        return view('pages_list',[
            'pages' => PagesNews::where('page_name', 'like', $request->name.'%')->paginate(30)->appends($request->all()),
            'num' => 0
        ]);
    }
    public function search_news(Request $request){
        return view('news_list',[
            'news_arr' => News::where('name', 'like', $request->name.'%')->paginate(30)->appends($request->all()),
            'num' => 0
        ]);
    }
    public function search_objects(Request $request){
        return view('object_list',[
            'objects' => Objects::where('name', 'like', $request->name.'%')->paginate(30)->appends($request->all()),
            'num' => 0
        ]);
    }
    public function show_news(Request $request){

        SessionVariables::set_session_variable('floder','news_images');

        return view('news_list',[
            'news_arr' => News::where('name','!=',NULL)->where('page_lang','=',1)->paginate(30)->appends($request->all()),
            'num' => 0
        ]);
    }

    public function news_editor(){

        SessionVariables::set_session_variable('floder','news_images');
        $languages = Languages::where('active','=',1)->get();

        return view('news_editor',[
            'number' => AppliedMethods::set_number_model('News','id'),
            'lang_id' => $languages,
            'languages' => $languages,

        ]);
    }
    public function news_page_show($url){

        SessionVariables::set_session_variable('floder','pages_images');

        return view('page',[
            'page' => News::where('url',$url)->get()
        ]);
    }
    public function photos(){

        return view('gallery',[
            'images' => Photos::paginate(20),
            'config' => ImagesProperties::get(),
            'num' => 0
        ]);
    }
    public function reviews(){

        SessionVariables::set_session_variable('floder','images');

        return view('reviews',[
            'blocks' => Review::paginate(6),
            'num' => 0
        ]);
    }
    public function post(){
        return view('post',[
            'mails' => Post::orderBy('id','DESC')->paginate(20)
        ]);
    }
    public function subscription(){

        SessionVariables::set_session_variable('floder','images');

        return view('subscription',[
            'emails' => Subscription::paginate(20),
            'subscription' => SubscriptionTemplate::get()
        ]);
    }
    public function organization(){
        return view('organization',[
            'org' => Organization::get()
        ]);
    }
    public function sliders(){
        return view('slider',[
            'blocks' => Slider::paginate(20),
            'num' => 0
        ]);
    }
    public function feedback(){

        SessionVariables::set_session_variable('floder','images');
        return view('feedback',[
            'feedback' => Feedback::get()
        ]);
    }
    public function site_map(){
        return view('site_map');
    }
    public function site_map_generate(Request $request){

        if(count(SiteMap::where('id','=',1)->get()) == 0){
            $data = new SiteMap();
            $data->update_time = $request->select;
            $data->save();
        }
        else{
            SiteMap::where('id','=',1)->update([
                'update_time' => $request->select
            ]);
        }
        return view('site_map',[
            'select' => $request->select
        ]);
    }
    public function site_map_pages(){
        $file_name = 'sitemap_pages.xml';
        SiteMapFacade::site_map_generate('PagesNews','page_name','http://site/pages/',$file_name);
        return redirect(url('/').'/'.$file_name);
    }
    public function site_map_news(){
        $file_name = 'sitemap_news.xml';
        SiteMapFacade::site_map_generate('News','name','http://site/news/',$file_name);
        return redirect(url('/').'/'.$file_name);
    }
    public function site_map_objects(){
        $file_name = 'sitemap_objects.xml';
        SiteMapFacade::site_map_generate('Objects','name','http://site/objects/',$file_name);
        return redirect(url('/').'/'.$file_name);
    }
    public function text_blocks(){
        return view('text_blocks',[
            'blocks' => DB::table('languages')->join('text_blocks','text_blocks.language','=','languages.id')->get()
        ]);
    }
    public function robots(){
        return view('robots',[
            'robots' => Robots::get()
        ]);
    }
    public function robots_update(Request $request){
        Robots::truncate();
        $data = new Robots();
        $data->robots = $request->robots_text;
        $data->save();

        File::put(base_path().'/robots.txt', $request->robots_text);

        return redirect()->back();
    }
    public function images_zip(){
        return view('images_zip');
    }
    public function redirect(){
        return view('redirects',[
            'blocks' => Redirects::paginate(20),
            'num' => 0
        ]);
    }
    public function cache(){
        return view('cache',[
            'condition' => CacheModel::where('id','=',1)->value('condition')
        ]);
    }
    public function meta_tags(){
        return view('meta_tags',[
            'news' => DefaultMetaTags::where('type','=','news')->get(),
            'pages' => DefaultMetaTags::where('type','=','ur')->get(),
            'main_page' => DefaultMetaTags::where('type','=','main_page')->get(),
            'contacts' => DefaultMetaTags::where('type','=','contacts')->get(),
            'objects' => DefaultMetaTags::where('type','=','buh')->get(),
            'news_list' => DefaultMetaTags::where('type','=','news_list')->get(),
            'object_list' => DefaultMetaTags::where('type','=','object_list')->get(),
            'reviews' => DefaultMetaTags::where('type','=','reviews')->get(),
            'real_news_list' => DefaultMetaTags::where('type','=','real_news_list')->get()
        ]);
    }
    public function languages(){
        return view('languages',[
            'languages' => Languages::get()
        ]);
    }
    public function languages_edit(Request $request){
        return view('languages_edit',[
            'language' => Languages::where('id','=',$request->id)->get()
        ]);
    }
    public function menu($url){
        if($url == 'about_us'){
            $pages = AboutUsMenu::get();
            $menu = 1;
        }
        else if($url == 'pages'){
            $pages = PagesNews::get();
            $menu = 2;
        }
        return view('menu',[
            'pages' => $pages,
            'menu' => $menu
        ]);
    }
    public function menu_edit(Request $request){
        //dd($request);
        if($request->menu == 1){
            $num = AboutUsMenu::orderBy('id','desc')->latest()->value('id');
            for ($i=0;$i<=$num;$i++){
                if(isset($request->check[$i])){
                    AboutUsMenu::where('id','=',$i)->update(['is_active' => 1]);
                }
                else{
                    AboutUsMenu::where('id','=',$i)->update(['is_active' => 0]);
                }
            }
        }
        if($request->menu == 2){
            $num = PagesNews::orderBy('id','desc')->latest()->value('id');
            for ($i=0;$i<=$num;$i++){
                if(isset($request->check[$i])){
                    PagesNews::where('id','=',$i)->update(['is_active' => 1]);
                }
                else{
                    PagesNews::where('id','=',$i)->update(['is_active' => 0]);
                }
            }
        }
        return redirect()->back();
    }
    public function menu_redirect(Request $request){
        if($request->type == 'about_us'){
            $pages = AboutUsMenu::get();
            $menu = 1;
        }
        else if($request->type == 'pages'){
            $pages = PagesNews::get();
            $menu = 2;
        }
        return view('menu',[
            'pages' => $pages,
            'menu' => $menu
        ]);
    }
    public function menu_list(){
        return view('menu_list');
    }
    public function product_list(){
        $products = DB::table('products')->
        //если ошибка с group by - в конфиге датабейс поменять на 'strict' => false,
        where('lang_id', 1)->
        leftJoin('product_images', 'products.product_id', '=', 'product_images.images_product_id')->
        groupBy('products.product_id')->
        get();
        $categories = Category::where('lang_id','=',1)->get();
        $products_categories_connection_list = ProductsCategoriesConnection::get();
        $categories_list = array();
        foreach ($products_categories_connection_list as $list){
            $categories_list[$list->product_id_connection][] = $list->category_name_connection;
        }
        return view('product_list',[
            'products' => $products,
            'categories' => $categories,
            'categories_list' => $categories_list
        ]);
    }
    public function attribute_list(){
        $attributes = DB::table('product_attributes')->
        where('product_attributes.attributes_lang_id',1)->
        join('filters','product_attributes.attributes_parent_filter','=','filters.filter_id')->
        where(['filters.lang_id' => 1])->
        get();
        $filters = Filters::where('lang_id','=',1)->get();
        return view('attribute_list',[
            'attributes' => $attributes,
            'filters' => $filters
        ]);
    }
    public function filter_list(){
        return view('filter_list',[
            'filters' => Filters::where('lang_id','=',1)->get()
        ]);
    }
    public function product_categories(){
        return view('product_categories',[
            'languages' => Languages::where('active','=',1)->get(),
            'categories_1' => Category::where('lang_id','=',1)->get(),
            'categories_2' => Category::where('lang_id','=',2)->get()
        ]);
    }
    public function filter_editor(){
        return view('filter_editor',[
            'languages' => Languages::where('active','=',1)->get(),
            'number' => AppliedMethods::set_number_model('Filters','filter_id'),
            'filters' => Filters::where('lang_id','=',1)->get()
        ]);
    }
    public function attribute_editor(){
        return view('attribute_editor',[
            'languages' => Languages::where('active','=',1)->get(),
            'filters' => Filters::where('lang_id','=',1)->get(),
            'number' => AppliedMethods::set_number_model('ProductAttributes','attributes_id')
        ]);
    }
    public function categories_editor(){
        return view('categories_editor',[
            'languages' => Languages::where('active','=',1)->get(),
            'number' => AppliedMethods::set_number_model('Category','category_id'),
            'categories' => Category::where('lang_id','=',1)->get()
        ]);
    }
    public function product_card(){

        SessionVariables::set_session_variable('floder','products_images');

        return view('product_card',[
            'languages' => Languages::where('active','=',1)->get(),
            'number' => AppliedMethods::set_number_model('Products','id'),
            'categories' => Category::where('is_active','=',1)->where('lang_id','=',1)->get(),
            'array' => Languages::where('active','=',1)->get(),
            'filters' => Filters::where('is_active','=',1)->where('lang_id','=',1)->get(),
            'attributes' => ProductAttributes::where('attributes_lang_id','=',1)->get(),
            'suppliers' => Traders::get()
        ]);
    }
    public function contacts_show(){
        return view('contacts_editor',[
            'contacts' => Contacts::get()
        ]);
    }
    public  function contacts_edit(Request $request){
        Contacts::truncate();
        $data = new Contacts();
        $data->contacts_name = $request->name;
        $data->contacts_url = $request->url;
        $data->contacts_description = $request->description;
        $data->contacts_title = $request->title;
        $data->contact_text = $request->editor1;
        $data->map_text = $request->editor2;
        $data->save();
        return redirect()->back();
    }

    public function error_show(){
        return view('layouts/404');
    }
    public function about_company(){
        return view('about_company',[
            'about_company' => AboutCompany::get()
        ]);
    }
    public function analytics(){
        $data = AppliedMethods::null_if_empty(Analytics::get());
        return view('analytics',[
            'data' => $data[0]
        ]);
    }
    public function analytics_change(Request $request){
        if(count(Analytics::get()) == 0){
            $data = new Analytics();
            $data->save();
        }
        for($i=0;$i<=5;$i++){
            Analytics::where('id','=',1)->update([
                'analytics_text_'.($i+1) => $request->analytics_text[$i]
            ]);
        }
        return redirect()->back();
    }
    public function register_show(){
        Auth::logout();
        return view('auth.register');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('show_index');
    }
    public function admin_list(){
        return view('admin_list',[
            'admins' => Users::get()
        ]);
    }
    public function admin_delete(Request $request){
        Users::where('id','=',$request->id)->delete();
        return redirect()->back();
    }
    public function show_index(){
        return view('pages_list');
    }
    public function supplier_list(){
        return view('supplier_list',[
            'suppliers' => Traders::get()
        ]);
    }
}
