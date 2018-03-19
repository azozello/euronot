<?php

namespace App\Http\Controllers;

use App\ProductConfiguration;
use App\MenuList;
use App\OpenHours;
use App\MainPage;
use App\Warranty;
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
use App\ProductComment;
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
use App\ProductsTexts;
use App\Languages;
use App\ProductImages;
use App;
use Illuminate\Support\Facades\Session;
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

    public function get_configuration_price(Request $request){
        return ProductConfiguration::where('product_id_connection', $request->product_id)->get();
    }

    public function main_page_edit_show(){
        return view('main_page_editor',[
            'languages' => Languages::where('active','=',1)->get(),
            'main_page' => MainPage::where('id','=',1)->get()
        ]);
    }
    public function main_page_edit(Request $request){
        $img0 = MainPage::where('id','=',1)->value('img_0');
        $img1 = MainPage::where('id','=',1)->value('img_1');
        $img2 = MainPage::where('id','=',1)->value('img_2');
        $img3 = MainPage::where('id','=',1)->value('img_3');
        $img4 = MainPage::where('id','=',1)->value('img_4');
        $img5 = MainPage::where('id','=',1)->value('img_5');
        if (isset($request->file()['pic'][0])) {
            File::delete(public_path('images').'/'.$img0);
            if ($request->file()['pic'][0]->move(public_path('images'), $request->file()['pic'][0]->getClientOriginalName())) {
                $img0 = $request->file()['pic'][0]->getClientOriginalName();
            } else {
                return 'Ошибка загрузки';
            }
        }
        if (isset($request->file()['pic'][1])) {
            File::delete(public_path('images').'/'.$img1);
            if ($request->file()['pic'][1]->move(public_path('images'), $request->file()['pic'][1]->getClientOriginalName())) {
                $img1 = $request->file()['pic'][1]->getClientOriginalName();
            } else {
                return 'Ошибка загрузки';
            }
        }
        if (isset($request->file()['pic'][2])) {
            File::delete(public_path('images').'/'.$img2);
            if ($request->file()['pic'][2]->move(public_path('images'), $request->file()['pic'][2]->getClientOriginalName())) {
                $img2 = $request->file()['pic'][2]->getClientOriginalName();
            } else {
                return 'Ошибка загрузки';
            }
        }
        if (isset($request->file()['pic'][3])) {
            File::delete(public_path('images').'/'.$img3);
            if ($request->file()['pic'][3]->move(public_path('images'), $request->file()['pic'][3]->getClientOriginalName())) {
                $img3 = $request->file()['pic'][3]->getClientOriginalName();
            } else {
                return 'Ошибка загрузки';
            }
        }
        if (isset($request->file()['pic'][4])) {
            File::delete(public_path('images').'/'.$img4);
            if ($request->file()['pic'][4]->move(public_path('images'), $request->file()['pic'][4]->getClientOriginalName())) {
                $img4 = $request->file()['pic'][4]->getClientOriginalName();
            } else {
                return 'Ошибка загрузки';
            }
        }
        if (isset($request->file()['pic'][5])) {
            File::delete(public_path('images').'/'.$img5);
            if ($request->file()['pic'][5]->move(public_path('images'), $request->file()['pic'][5]->getClientOriginalName())) {
                $img5 = $request->file()['pic'][5]->getClientOriginalName();
            } else {
                return 'Ошибка загрузки';
            }
        }
        MainPage::where('id','=',1)->update([
            'img_0' => $img0,
            'img_1' => $img1,
            'img_2' => $img2,
            'img_3' => $img3,
            'img_4' => $img4,
            'img_5' => $img5,
            'img_url_0' => $request->url_0,
            'img_url_1' => $request->url_1,
            'img_url_2' => $request->url_2,
            'img_url_3' => $request->url_3,
            'img_url_4' => $request->url_4,
            'img_url_5' => $request->url_5,
            'text_block_0' => $request->editor0,
            'text_block_1' => $request->editor1,
            'text_block_2' => $request->editor2,
            'text_block_3' => $request->editor3,
            'text_block_4' => $request->editor4,
            'text_block_5' => $request->editor5,
            'text_block_6' => $request->editor6,
            'text_block_7' => $request->editor7,
        ]);
        return redirect()->back();
    }
    public function show_site_index(){
        $data = MenuList::get()->toArray();
        for ($x = 0; $x < count($data)-1; $x++) {
            for ($y = $x + 1; $y < count($data); $y++) {
                if ($data[$x]['position'] > $data[$y]['position']) {
                    $temp = $data[$x];
                    $data[$x] = $data[$y];
                    $data[$y] = $temp;
                }
            }
        }
        $products_hit = DB::table('products')->
        where('products.product_status', 'Хит продаж')->
        leftJoin('product_images', 'products.product_id', '=', 'product_images.images_product_id')->
        groupBy('products.product_id')->
        get();
        $products_rec = DB::table('products')->
        where('products.product_status', 'Супер цена')->
        leftJoin('product_images', 'products.product_id', '=', 'product_images.images_product_id')->
        groupBy('products.product_id')->
        get();
        $products_new = DB::table('products')->
        leftJoin('product_images', 'products.product_id', '=', 'product_images.images_product_id')->
        groupBy('products.product_id')->
        get();
        return view('site.index',[
            'organization' => Organization::get()[0],
            'header' => $data,
            'cities' => OpenHours::get(),
            'main_page' => MainPage::where('id','=',1)->get(),
            'products_hit' => $products_hit,
            'products_rec' => $products_rec,
            'products_new' => $products_new
        ]);
    }
    public function show_cart(Request $request){
        $cart = $request->session()->get('cart');
        $data = MenuList::get()->toArray();
        for ($x = 0; $x < count($data)-1; $x++) {
            for ($y = $x + 1; $y < count($data); $y++) {
                if ($data[$x]['position'] > $data[$y]['position']) {
                    $temp = $data[$x];
                    $data[$x] = $data[$y];
                    $data[$y] = $temp;
                }
            }
        }
        return view('site.cart', [
            'organization' =>Organization::get()[0],
            'header' => $data,
            'cities' => OpenHours::get(),
            'cart' => $cart
        ]);
    }

    public function show_contact(){
        $data = MenuList::get()->toArray();
        for ($x = 0; $x < count($data)-1; $x++) {
            for ($y = $x + 1; $y < count($data); $y++) {
                if ($data[$x]['position'] > $data[$y]['position']) {
                    $temp = $data[$x];
                    $data[$x] = $data[$y];
                    $data[$y] = $temp;
                }
            }
        }
        return view('site.contact', [
            'organization' =>Organization::get()[0],
            'header' => $data,
            'cities' => OpenHours::get()
        ]);
    }
    public function show_delivery(){
        $data = MenuList::get()->toArray();
        for ($x = 0; $x < count($data)-1; $x++) {
            for ($y = $x + 1; $y < count($data); $y++) {
                if ($data[$x]['position'] > $data[$y]['position']) {
                    $temp = $data[$x];
                    $data[$x] = $data[$y];
                    $data[$y] = $temp;
                }
            }
        }
        return view('site.delivery', [
            'organization' =>Organization::get()[0],
            'header' => $data,
            'cities' => OpenHours::get()
        ]);
    }
    public function show_site_news(Request $request){
        $data = MenuList::get()->toArray();
        for ($x = 0; $x < count($data)-1; $x++) {
            for ($y = $x + 1; $y < count($data); $y++) {
                if ($data[$x]['position'] > $data[$y]['position']) {
                    $temp = $data[$x];
                    $data[$x] = $data[$y];
                    $data[$y] = $temp;
                }
            }
        }
        return view('site.news',[
            'organization' =>Organization::get()[0],
            'header' => $data,
            'cities' => OpenHours::get(),
            'all_news' => News::where('name','!=',NULL)->where('page_lang','=',1)->paginate(30)->appends($request->all())
        ]);
    }

    public function show_one_news($url) {
        $data = MenuList::get()->toArray();
        for ($x = 0; $x < count($data)-1; $x++) {
            for ($y = $x + 1; $y < count($data); $y++) {
                if ($data[$x]['position'] > $data[$y]['position']) {
                    $temp = $data[$x];
                    $data[$x] = $data[$y];
                    $data[$y] = $temp;
                }
            }
        }
        return view('site.news-inner',[
            'organization' =>Organization::get()[0],
            'header' => $data,
            'cities' => OpenHours::get(),
            'page_array' => News::where('url',$url)->get()[0]->attributesToArray()
        ]);
    }
    public function show_warranty(){
        $data = MenuList::get()->toArray();
        for ($x = 0; $x < count($data)-1; $x++) {
            for ($y = $x + 1; $y < count($data); $y++) {
                if ($data[$x]['position'] > $data[$y]['position']) {
                    $temp = $data[$x];
                    $data[$x] = $data[$y];
                    $data[$y] = $temp;
                }
            }
        }
        return view('site.warranty', [
            'organization' =>Organization::get()[0],
            'header' => $data,
            'cities' => OpenHours::get(),
            'url' => Warranty::get()[0]->attributesToArray()['warranty_url'],
            'text' => Warranty::get()[0]->attributesToArray()['warranty_text'],
            'name' => Warranty::get()[0]->attributesToArray()['warranty_name'],
            'title' => Warranty::get()[0]->attributesToArray()['warranty_title'],
            'description' => Warranty::get()[0]->attributesToArray()['warranty_description']
        ]);
    }

    public function count_items_in_cart(Request $request){
        if ($cart = $request->session()->get('cart')) {
            $items = 0;
            foreach ($cart as $item) $items++;
            return $items;
        }
    }

    public function delete_item_from_cart(Request $request) {
        if ($cart = $request->session()->get('cart')) {
            $request->session()->put('cart', []);
            foreach ($cart as $item) {
                if ($item['item_id'] != $request->item_id) {
                    $request->session()->push('cart', $item);
                }
            }
        }
        return redirect()->back();
    }

    public function add_item_in_cart(Request $request){
        if ($cart = $request->session()->get('cart')) {
            $new_item = array(
                "item_id" => $request->item_id,
                "item_name" => $request->item_name,
                "item_amount" => $request->item_amount,
                "item_price" => $request->item_price,
                "item_value" => $request->item_value
            );
            $request->session()->push('cart', $new_item);
        } else {
            $cart = [];
            $request->session()->put('cart', $cart);
            $new_item = array(
                "item_id" => $request->item_id,
                "item_name" => $request->item_name,
                "item_amount" => $request->item_amount,
                "item_price" => $request->item_price,
                "item_value" => $request->item_value
            );
            $request->session()->push('cart', $new_item);
        }
        return redirect()->back();
    }

    public function show_products($url){
        $product = Products::where('url', '=', $url)->get();
        $images = ProductImages::where('images_product_id', '=', $product[0]->product_id)->get();
        $texts = ProductsTexts::where('product_id_connection', '=', $product[0]->product_id)->get();
        $comments = ProductComment::where('product_id_connection', '=', $product[0]->product_id)->
        where('is_active', '=', 0)->get();
        $product = Products::where('url','=',$url)->get();
        $op_memory = App\ProductConfiguration::where('product_id_connection','=',$product[0]->product_id)->
            where('configuration_type','=','op_memory')->get();
        $proc = App\ProductConfiguration::where('product_id_connection','=',$product[0]->product_id)->
        where('configuration_type','=','proc')->get();
        $hard = App\ProductConfiguration::where('product_id_connection','=',$product[0]->product_id)->
        where('configuration_type','=','hard')->get();
        $images = ProductImages::where('images_product_id','=',$product[0]->product_id)->get();
        $texts = ProductsTexts::where('product_id_connection','=',$product[0]->product_id)->get();
        $comments = ProductComment::where('product_id_connection','=',$product[0]->product_id)->
        where('is_active','=',0)->get();
        $all_products = Products::get();
        $attributes = explode(" ", $product[0]->attributes_id);
        $same_products = array();
        foreach ($all_products as $products) {
            $all_products_attributes = explode(" ", $products->attributes_id);
            if (count(array_uintersect($attributes, $all_products_attributes, "strcasecmp")) > 0) {
                if ($products->id != $product[0]->id) {
                    $same_products[] = DB::table('products')->
                    where('products.id', $products->id)->
                    leftJoin('product_images', 'products.product_id', '=', 'product_images.images_product_id')->
                    groupBy('products.product_id')->
                    get();
                }
            }

            if (count($same_products) == 3) {
                break;
            }
        }
        $data = MenuList::get()->toArray();
        for ($x = 0; $x < count($data)-1; $x++) {
            for ($y = $x + 1; $y < count($data); $y++) {
                if ($data[$x]['position'] > $data[$y]['position']) {
                    $temp = $data[$x];
                    $data[$x] = $data[$y];
                    $data[$y] = $temp;
                }
            }
        }
        //dd($product);
        if(!is_null($product[0]->product_gift)){
            $product_gift = DB::table('products')->
            where('products.product_id', $product[0]->product_gift)->
            leftJoin('product_images', 'products.product_id', '=', 'product_images.images_product_id')->
            groupBy('products.product_id')->
            get();
        }
        else{
            $product_gift = null;
        }
        $time = $product[0]->timer_time - time();
        if($time < 0){
            $timer_days = 0;
            $timer_hours = 0;
            $timer_minutes = 0;
            $timer_seconds = 0;
        }
        else{
            $month = floor( $time / 2592000 );

            $timer_days = ( $time / 86400 ) % 30;

            $timer_hours = ( $time / 3600 ) % 24;

            $timer_minutes = ( $time / 60 ) % 60;

            $timer_seconds = $time % 60;
        }
        //dd($product_gift);
        return view('site.products-263',[
            'organization' => Organization::get()[0],
            'header' => $data,
            'cities' => OpenHours::get(),
            'product' => $product,
            'images' => $images,
            'texts' => $texts,
            'comments' => $comments,
            'comment_count' => count($comments),
            'same_products' => $same_products,
            'hard' => $hard,
            'proc' => $proc,
            'op_memory' => $op_memory,
            'product_gift' => $product_gift,
            'timer_days' => $timer_days,
            'timer_hours' => $timer_hours,
            'timer_minutes' => $timer_minutes,
            'timer_seconds' => $timer_seconds
        ]);
    }

    public function show_about(){
        $data = MenuList::get()->toArray();
        for ($x = 0; $x < count($data)-1; $x++) {
            for ($y = $x + 1; $y < count($data); $y++) {
                if ($data[$x]['position'] > $data[$y]['position']) {
                    $temp = $data[$x];
                    $data[$x] = $data[$y];
                    $data[$y] = $temp;
                }
            }
        }
        return view('site.about', [
            'organization' =>Organization::get()[0],
            'cities' => OpenHours::get(),
            'header' => $data,
            'url' => AboutCompany::get()[0]->attributesToArray()['about_company_url'],
            'text' => AboutCompany::get()[0]->attributesToArray()['about_company_text'],
            'name' => AboutCompany::get()[0]->attributesToArray()['about_company_name'],
            'title' => AboutCompany::get()[0]->attributesToArray()['about_company_title'],
            'description' => AboutCompany::get()[0]->attributesToArray()['about_company_description']
        ]);
    }

    public function show_product_list(Request $request,$category = NULL,$url = NULL){
        //dd(RequestFacade::path());
            $lang_id = 1;
        //dd($url);
        //dd($category);
        if(is_null(session('array'))){
            $pagination_num = 24;
            $sort_type_column = 'id';
            $sort_type_way = 'desc';
        }else{
            switch(session('array')['sort_type']){
                case 0:
                    $sort_type_column = 'id';
                    $sort_type_way = 'desc';
                    break;
                case 1:
                    $sort_type_column = 'price';
                    $sort_type_way = 'asc';
                    break;
                case 2:
                    $sort_type_column = 'price';
                    $sort_type_way = 'desc';
                    break;
                case 3:
                    $sort_type_column = 'name';
                    $sort_type_way = 'asc';
                    break;
                case 4:
                    $sort_type_column = 'name';
                    $sort_type_way = 'desc';
                    break;
                default:
                    $sort_type_column = 'id';
                    $sort_type_way = 'desc';
                    break;
            }
            $pagination_num = session('array')['product_at_page'];
        }
        $products = DB::table('products')->
        where('lang_id', $lang_id)->
        leftJoin('product_images', 'products.product_id', '=', 'product_images.images_product_id')->
        groupBy('products.product_id')->
        orderBy('products.'.$sort_type_column, $sort_type_way)->
        get();
        $category_foot = Category::where('url', $category)->value('down_text');
        $category = Category::where('url','=',$category)->value('products_id');
        $category = explode(" ", $category);
        array_pop($category);

        $where_query = array();
        $chek_products = array();
        foreach ($products as $k=>$prod){
            foreach($category as $cat) {
                if ($prod->product_id == $cat){
                    $chek_products[] = $products[$k];
                }
                }
        }
        $products = $chek_products;
        foreach ($products as $k=>$product){
            unset($products[$k]);
        }
        foreach ($chek_products as $k=>$chek_product){
            $products[$k] = $chek_product;
        }
        //dd($category);
        //dd($url);
        if ($url == NULL) {
            $filters = Filters::where('lang_id', $lang_id)->get();
            $attributes = DB::table('filters')->
            where('lang_id', $lang_id)->
            leftJoin('product_attributes', 'filters.filter_id', '=', 'product_attributes.attributes_parent_filter')->
            where('product_attributes.attributes_lang_id', $lang_id)->
            get();
            $attributes_count = array();
            foreach ($products as $product) {
                $id_array = explode(' ', $product->attributes_id);
                array_pop($id_array);
                foreach ($id_array as $id) {
                    if (empty($attributes_count[$id])) {
                        $attributes_count[$id] = 1;
                    } else {
                        $attributes_count[$id]++;
                    }
                }
            }
            $new_products = $products;
            $all_attributes = $attributes;
            $attributes_id = array();
        } else {
            $attributes_string_array = explode('-', $url);
            //dd($attributes_string_array);
            $all_attributes = ProductAttributes::where('attributes_lang_id', '=', $lang_id)->get();
            $meta_tags = ProductAttributes::where('attributes_url','=',$attributes_string_array[0])->where('attributes_lang_id', '=', $lang_id)->get();
            //dd($meta_tags[0]);
            $attributes_id = array();
            $filter_attributes_id = array();
            foreach ($attributes_string_array as $attributes_string) {      //атрибуты переданные в url
                foreach ($all_attributes as $all_attribute) {
                    if ($all_attribute->attributes_url == $attributes_string) {
                        $attributes_id[] = $all_attribute->attributes_id;
                    }
                }
            }
            foreach ($all_attributes as $all_attribute) {
                $filter_attributes_id[$all_attribute->attributes_id] = $all_attribute->attributes_parent_filter;
            }

            $new_products = array();
            $minus_var = 0;
            $num = 0;
            $filter_array = array();
            foreach($attributes_id as $a_id){                          //от сюда начинается вся грязь
                $filter_array[] = $filter_attributes_id[$a_id];        //заполняем массив фильтрами аттрибутов, переданых через url
            }
            foreach (array_count_values($filter_array) as $array_count){      //считаем повторяющиеся фильтры. Каждый новый - +1 к $minus_var
                $minus_var = $minus_var + ($array_count-1);
            }
            foreach ($products as $product) {
                   //получение продуктов,в которых есть атрибуты переданные в url
                    $id_array = explode(' ', $product->attributes_id);
                    array_pop($id_array);
                    foreach ($id_array as $array) {
                        if (in_array($array, $attributes_id)) {
                            $num++;
                        }
                    }
                    if (count($attributes_id) - $minus_var == $num) {    //есть ли в продекте все аттрибуты из url, кроме повторяющихся оп фильтру (пр. Шоколадный вкус,Банановый вкус)
                        $new_products[] = $product;
                    }
                    $num = 0;

            }
            //dd($attributes_id);
            $attributes_count = array();
            $num = 0;
//dd($attributes_string_array);


            foreach ($all_attributes as $attributes) {      //лагает когда на 1 атегории больше 1 и еще 1 на другой категории
                foreach ($products as $product) {
                    //dd($product->product_type);
                        //проверка на совпадение по цене и %арабики
                        $id_all_product_array = explode(' ', $product->attributes_id);
                        array_pop($id_all_product_array);

                        $local_attributes_id = $attributes_id;


                        while ($value = current($local_attributes_id)) {    //удаляем из локальной переменной если атрибуты с одного фильтра
                            if ($filter_attributes_id[current($local_attributes_id)] == $filter_attributes_id[$attributes->attributes_id] && !in_array($attributes->attributes_id, $local_attributes_id)) {
                                unset($local_attributes_id[key($local_attributes_id)]);
                            }
                            next($local_attributes_id);
                        }

                        foreach ($local_attributes_id as $attrib_id) {     //проверяет сколько совпадений атрибутов url и продукта
                            foreach ($id_all_product_array as $id_all_array) {
                                if ($attrib_id == $id_all_array) {
                                    $num++;

                                }
                            }
                        }

                        if (in_array($attributes->attributes_id, $id_all_product_array)) {
                            $num++;
                        } else {
                            $num--;
                        }

                        if (($num - 1) == (count($local_attributes_id) - $minus_var)) {
                            if (empty($attributes_count[$attributes->attributes_id])) {
                                $attributes_count[$attributes->attributes_id] = 1;
                            } else {
                                $attributes_count[$attributes->attributes_id]++;
                            }
                        }
                        $num = 0;

                }
            }
        }


        //dd($new_products);
        foreach ($new_products as $new_product) {
            //считаем количество атрибутов у продукта
            $new_product_attributes = explode(' ', $new_product->attributes_id);
            array_pop($new_product_attributes);

            $filters_id = array();                                             //получаем новый список id фильтров через атрибуты
            $keys_new_attributes = AppliedMethods::get_key_array($attributes_count);
            foreach ($all_attributes as $all_attribute) {
                foreach ($keys_new_attributes as $keys_new_attribute) {
                    if ($keys_new_attribute == $all_attribute->attributes_id) {
                        $filters_id[] = $all_attribute->attributes_parent_filter;
                    }
                }
            }

            $all_filters = Filters::where('lang_id', '=', $lang_id)->get();
            $filters = array();
            foreach ($filters_id as $filter_id) {
                foreach ($all_filters as $all_filter) {
                    if ($filter_id == $all_filter->filter_id) {
                        $filters[] = $all_filter;
                    }
                }
            }
            $filters = array_unique($filters);
            //dd($filters_id);
            $products = $new_products;
            $attributes = $all_attributes;
            //dd($attributes);
        }
        if(!isset($price)){
            $price = 1000;
        }
        if(!isset($arabica)){
            $arabica = 100;
        }
        if(!isset($meta_tags)){
            $meta_tags = null;
        }
        if(!isset($filters)){
            $filters = null;
        }
        foreach ($products as $k=>$product){
            $where_query[] = $products[$k]->product_id;
        }
        $products = DB::table('products')->
        whereIn('product_id',$where_query)->
        leftJoin('product_images', 'products.product_id', '=', 'product_images.images_product_id')->
        groupBy('products.product_id')->
        orderBy('products.'.$sort_type_column, $sort_type_way)->
        paginate($pagination_num);
        return view('site.products_cat-b_u_noutbuki', [
            'foot' => $category_foot,
            'organization' =>Organization::get()[0],
            'header' => MenuList::get()->toArray(),
            'products' => $products,
            'filters' => $filters,
            'price' => $price,
            'arabica' => $arabica,
            'attributes' => $attributes,
            'attributes_count' => $attributes_count,
            'url_attributes' => $attributes_id,
            'meta_tags' => $meta_tags,
            'cities' => OpenHours::get()
        ]);
    }

    public function refresh_page(Request $request){
        //dd($request);
        $uri = RequestFacade::path(); //получаем URI
        $segmentsURI = explode('/',$uri); //делим на части по разделителю "/"
//dd($request);
        $attributes = ProductAttributes::where('attributes_lang_id','=',1)->get();
        $array_key = AppliedMethods::get_key_array($request->attributes_id);
        //$array_key = array_reverse($array_key);
        $uri_string = '';
        if(!is_null($array_key)) {
            foreach ($array_key as $key) {
                foreach ($attributes as $attribute) {
                    if ($attribute->attributes_id == $key) {
                        $uri_string .= $attribute->attributes_url . '-';
                    }
                }
            }
        }

        $uri_string = substr($uri_string, 0, -1);
        $referer = Redirect::back()->getTargetUrl();
        $segments = explode('/', $referer);
       // dd($segments);
        $url = 'http://'.$segments[2].'/'.$segments[3].'/'.$segments[4].'/'.$uri_string;
        //dd($url);
        return redirect($url)->with('array',[
            'sort_type' => $request->sort_type,
            'product_at_page' => $request->product_at_page,
            'header' => MenuList::get()->toArray()
        ]);
    }
    public function add_comment(Request $request){
        $data = new ProductComment();
        $data->product_id_connection = $request->product_id;
        $data->comment = $request->comment;
        $data->comment_name = $request->name;
        $data->comment_email = $request->email;
        $data->comment_time = date("H:i:s");
        $data->comment_date = date("Y-m-d");
        $data->is_active = 0;
        $data->save();

        return redirect()->back();
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

    public function city_list() {
        return view('city_list', [
            'cities' => OpenHours::get()
        ]);
    }

    public function edit_city($url) {
        $city = OpenHours::where('city_name', $url)->get()[0];
        return view('edit_city', [
            'city' => $city
        ]);
    }

    public function add_city() {
        return view('add_city');
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
    public function organization() {
        $organization = Organization::get();
        $open_hours = OpenHours::get();
        return view('organization',[
            'org' => $organization
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

    public function edit_menu_list(Request $request) {
        return view('menu_list_edit',[
            'page' => MenuList::find($request->menu_id)
        ]);
    }

    public function menu_redirect(Request $request){
        if($request->type == 'top'){
            $pages = MenuList::where('type', $request->type)->get();
            return view('menu',[
                'pages' => $pages
            ]);
        }
        else if($request->type == 'down'){
            $pages = MenuList::where('type', $request->type)->get();
            return view('menu',[
                'pages' => $pages
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function menu_add() {
        return view('menu_list_add');
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
            'categories_1' => Category::where('lang_id','=',1)->get()
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
            'suppliers' => Traders::get(),
            'present_products' => Products::get()
        ]);
    }
    public function contacts_show(){
        return view('contacts_editor',[
            'contacts' => Contacts::get()
        ]);
    }
    public function contacts_edit(Request $request){
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
