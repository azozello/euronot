<?php

namespace App\Http\Controllers;

use App\Category;
use App\ProductAttributes;
use App\ProductImages;
use App\Products;
use App\DefaultMetaTags;
use App\ProductsCategoriesConnection;
use App\Languages;
use App\Filters;
use App\Traders;
use App\ProductsTexts;
use Image;
use App\ProductConfiguration;
use DB;
use File;
use Translit;
use App\Suppliers;
use AppliedMethods;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class ProductCardController extends Controller
{

    public function product_card_add(Request $request){
        //dd($request);
        //подключение изображений
        $timer_days = $request->timer_days;
        $timer_hours = $request->timer_hours;
        $timer_minutes = $request->timer_minutes;
        $timer_seconds = $request->timer_seconds;
        if(is_null($timer_days)){
            $timer_days = 0;
        }
        if(is_null($timer_hours)){
            $timer_hours = 0;
        }
        if(is_null($timer_minutes)){
            $timer_minutes = 0;
        }
        if(is_null($timer_seconds)){
            $timer_seconds = 0;
        }
        $next_time = time() + (($timer_days * 24 * 60 * 60) + ($timer_hours * 60 * 60) + ($timer_minutes * 60) +$timer_seconds);

        foreach ($request->name as $k => $name) {
            if (is_null($request->name[$k])) {
                return Redirect::back()->withErrors(['Введите название страницы']);
            }
            $url = $request->url[$k];
            $url = Translit::translit_lower_with_underlining($url);
            if (empty($url)) {
                $url = Translit::translit_lower_with_underlining($request->name[$k]);
            }
            if (!count(Products::where('url', $url)->get()) > 1) {
                return Redirect::back()->withErrors(['Такой url уже занят']);
            }
        }
        $product_id = AppliedMethods::set_number_model('Products','product_id');
        //dd($product_id);
        if(!is_null($request->file('pic')[0])) {
            $files[] = $request->file('pic')[0];
        }
        if($request->file('files') !== null ) {
            foreach ($request->file('files') as $file) {
                $files[] = $file;
            }
        }
        if(isset($files)) {
            foreach ($request->file() as $file) {
                foreach ($file as $f) {
                    if ($f->move(public_path('product_images'), $f->getClientOriginalName())) {
                        $data = new ProductImages();
                        $data->image = $f->getClientOriginalName();
                        $data->images_product_id = $product_id;
                        $data->save();
                    } else {
                        return 'Ошибка загрузки';
                    }
                }
            }
        }
        //подключение фильтров
        if(!is_null($request->attribute)) {
            $attribute_id_array = array();
            $a = $request->attribute;
            while ($attribute_name = current($a)) {
                $attribute_id_array[] = key($a);
                next($a);
            }
            $attribute_string = '';
            foreach ($attribute_id_array as $attribute_id) {
                $attribute_string .= $attribute_id . ' ';
            }
        }
        else{
            $attribute_string = NULL;
        }
       //подключение категорий
        if(!is_null($request->category)) {
            $categories_id_array = array();
            $c = $request->category;
            while ($categories_name = current($c)) {
                $categories_id_array[] = key($c);
                next($c);
            }
            foreach ($categories_id_array as $categories_id) {
                //забиваем таблицу для отображения всех категорий продукта
                $category_name = Category::where('category_id', '=', $categories_id)->value('name');
                $data = new ProductsCategoriesConnection();
                $data->product_id_connection = $product_id;
                $data->category_name_connection = $category_name;
                $data->save();
                //для отображения всех продуктов в категории
                $categories_products = Category::where('category_id', '=', $categories_id)->value('products_id');
                $categories_products .= $product_id . ' ';
                Category::where('category_id', '=', $categories_id)->update(['products_id' => $categories_products]);
            }
        }
        //запись продукта
        foreach ($request->name as $k => $name) {

            if(is_null($request->description[$k])){
                $description = DefaultMetaTags::where('type','=','product')->value('description');
                if(is_null($description)){
                    $description = '';
                }
            }
            else{
                $description = $request->description[$k];
            }
            if(is_null($request->title[$k])){
                $title = DefaultMetaTags::where('type','=','product')->value('title');
                if(is_null($request->title)){
                    $title = '';
                }
            }
            else{
                $title = $request->title[$k];
            }
            for($i=0;$i<10;$i++) {
                $data = new ProductConfiguration();
                $data->product_id_connection = $product_id;
                $data->configuration = $request->proc_conf[$i];
                $data->configuration_price = $request->proc_conf_price[$i];
                $data->configuration_type = 'proc';
                $data->save();
            }
            for($i=0;$i<10;$i++) {
                $data = new ProductConfiguration();
                $data->product_id_connection = $product_id;
                $data->configuration = $request->op_memory[$i];
                $data->configuration_price = $request->op_memory_price[$i];
                $data->configuration_type = 'op_memory';
                $data->save();
            }
            for($i=0;$i<10;$i++) {
                $data = new ProductConfiguration();
                $data->product_id_connection = $product_id;
                $data->configuration = $request->hard[$i];
                $data->configuration_price = $request->hard_price[$i];
                $data->configuration_type = 'hard';
                $data->save();
            }
            $data = new Products();
            $data->name = $request->name[$k];
            $data->article = $request->article[$k];
            $data->text = $request->editor[$k];
            $data->attributes_id  = $attribute_string;
            $data->product_id  = $product_id;
            $data->price = $request->price;
            $data->quantity = $request->quantity;
            $data->url = $url;
            $data->is_active = 1;
            $data->lang_id = $request->language_id[$k];
            $data->product_status  = $request->product_status ;
            $data->product_isset = $request->product_isset;
            $data->product_garanty  = $request->product_garanty ;
            $data->product_stars  = $request->product_stars ;
            $data->product_gift  = $request->product_gift ;
            $data->short_description  = $request->short_description ;
            $data->timer_current_time  = time() ;
            $data->timer_time  = $next_time ;
            $data->proc  = $request->proc ;
            $data->op_memory  = $request->op_memory_p ;
            $data->type_memory  = $request->type_memory ;
            $data->hard_memory  = $request->hard_memory ;
            $data->op_system  = $request->op_system ;
            $data->skidka  = $request->skidka ;
            $data->op_system_description  = $request->op_system_description ;
            $data->product_gift = $request->product_gift;
            $data->product_gift_text = $request->present_product_text;
            $data->title = $title;
            $data->description = $description;
            $data->save();

            for($i=0;$i<15;$i++){
                $data = new ProductsTexts();
                $data->product_id_connection = $product_id;
                $data->first_text = $request->editor1[$i];
                $data->second_text = $request->editor2[$i];
                $data->save();
            }
        }
        return redirect()->back();
    }
    public function delete_product(Request $request){
        //dd($request);
        $objects = ProductImages::where('images_product_id','=',$request->product_id)->get();
        foreach ($objects as $object) {
            //dd(public_path('objects').'/'.$object->name);
            File::delete(public_path('product_images') . '/' . $object->image);
        }
        $categories = Category::get();
        foreach($categories as $category){
            $products_id = $category->products_id;
            $products_id = str_replace($request->product_id,"",$products_id);
            Category::where('id','=',$category->id)->update([
                'products_id' => $products_id
            ]);
        }
        ProductsCategoriesConnection::where('product_id_connection','=',$request->product_id)->delete();
        Products::where('product_id','=',$request->product_id)->delete();
        ProductsTexts::where('product_id_connection','=',$request->product_id)->delete();
        ProductConfiguration::where('product_id_connection','=',$request->product_id)->delete();
        return redirect()->back();
    }
    public function search_product(Request $request){

    }
    public function edit_product_show(Request $request){
        $product = Products::where('product_id','=',$request->product_id)->get();
        $product_configurations = ProductConfiguration::where('product_id_connection',$product[0]->product_id)->get();
        $product_text = ProductsTexts::where('product_id_connection','=',$request->product_id)->get();
        $product_pictures = ProductImages::where('images_product_id','=',$request->product_id)->get();
        $product_attributes = explode(' ',$product[0]->attributes_id);
        array_pop($product_attributes);
        $products_categories_connection_list = ProductsCategoriesConnection::get();
        $categories_list = array();
        foreach ($products_categories_connection_list as $list){
            if($list->product_id_connection == $request->product_id) {
                $categories_list[] = $list->category_name_connection;
            }
        }

        $languages = Languages::where('active','=',1)->get();
        $categories = Category::where('is_active','=',1)->where('lang_id','=',1)->get();
        $filers = Filters::where('is_active','=',1)->where('lang_id','=',1)->get();
        $attributes = ProductAttributes::where('attributes_lang_id','=',1)->get();
        //dd($product);
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
        //dd($product_configurations);
        return view('edit_product_card',[
            'product_pictures' => $product_pictures,
            'product_attributes' => $product_attributes,
            'product' => $product,
            'product_text' => $product_text,
            'categories_list' => $categories_list,
            'languages' => $languages,
            'categories' => $categories,
            'filters' => $filers,
            'attributes' => $attributes,
            'suppliers' => Traders::get(),
            'timer_days' => $timer_days,
            'timer_hours' => $timer_hours,
            'timer_minutes' => $timer_minutes,
            'timer_seconds' => $timer_seconds,
            'products_configurations' => $product_configurations,
            'present_products' => Products::get(),
            'current_present_product' => Products::where('product_id','=',$product[0]->product_gift )->get()
        ]);
    }
    public function edit_product(Request $request){
     //dd($request);
        $timer_days = $request->timer_days;
        $timer_hours = $request->timer_hours;
        $timer_minutes = $request->timer_minutes;
        $timer_seconds = $request->timer_seconds;
        if(is_null($timer_days)){
            $timer_days = 0;
        }
        if(is_null($timer_hours)){
            $timer_hours = 0;
        }
        if(is_null($timer_minutes)){
            $timer_minutes = 0;
        }
        if(is_null($timer_seconds)){
            $timer_seconds = 0;
        }
        $next_time = time() + (($timer_days * 24 * 60 * 60) + ($timer_hours * 60 * 60) + ($timer_minutes * 60) +$timer_seconds);

        $product_id = $request->product_id;
        ProductsCategoriesConnection::where('product_id_connection','=',$product_id)->delete();
        foreach ($request->name as $k => $name) {
            if (is_null($request->name[$k])) {
                return Redirect::back()->withErrors(['Введите название страницы']);
            }
            $url = $request->url[$k];
            $url = Translit::translit_lower_with_underlining($url);
            if (empty($url)) {
                $url = Translit::translit_lower_with_underlining($request->name[$k]);
            }
            if (!count(Products::where('url', $url)->get()) > 2) {
                return Redirect::back()->withErrors(['Такой url уже занят']);
            }
        }
        //подключение фильтров
        if(!is_null($request->attribute)) {
            $attribute_id_array = array();
            $a = $request->attribute;
            while ($attribute_name = current($a)) {
                $attribute_id_array[] = key($a);
                next($a);
            }
            $attribute_string = '';
            foreach ($attribute_id_array as $attribute_id) {
                $attribute_string .= $attribute_id . ' ';
            }
        }
        else{
            $attribute_string = NULL;
        }
        //подключение категорий
        if(!is_null($request->category)) {
            $categories_id_array = array();
            $c = $request->category;
            while ($categories_name = current($c)) {
                $categories_id_array[] = key($c);
                next($c);
            }
            //удаление категорий
            $all_categories = Category::get();
            foreach ($all_categories as $all_category){
                $id_s = explode(' ',$all_category->products_id);
                array_pop($id_s);
                foreach($id_s as $k=>$id){
                    if($id == $request->product_id){
                        unset($id_s[$k]);
                    }
                }
                $id_string = '';
                foreach ($id_s as $i){
                    $id_string .= $i.' ';
                }
                Category::where('id','=',$all_category->id)->update(['products_id' => $id_string]);
            }
            foreach ($categories_id_array as $categories_id) {
                //забиваем таблицу для отображения всех категорий продукта
                $category_name = Category::where('category_id', '=', $categories_id)->value('name');
                $data = new ProductsCategoriesConnection();
                $data->product_id_connection = $product_id;
                $data->category_name_connection = $category_name;
                $data->save();
                //для отображения всех продуктов в категории
                $categories_products = Category::where('category_id', '=', $categories_id)->value('products_id');
                $categories_products .= $product_id . ' ';
                Category::where('category_id', '=', $categories_id)->update(['products_id' => $categories_products]);
            }
        }
        //запись продукта
        foreach ($request->name as $k => $name) {

            if(is_null($request->description[$k])){
                $description = DefaultMetaTags::where('type','=','product')->value('description');
                if(is_null($description)){
                    $description = '';
                }
            }
            else{
                $description = $request->description[$k];
            }
            if(is_null($request->title[$k])){
                $title = DefaultMetaTags::where('type','=','product')->value('title');
                if(is_null($request->title)){
                    $title = '';
                }
            }
            else{
                $title = $request->title[$k];
            }
            ProductConfiguration::where('product_id_connection','=',$product_id)->delete();
            for($i=0;$i<10;$i++) {
                $data = new ProductConfiguration();
                $data->product_id_connection = $product_id;
                $data->configuration = $request->proc_conf[$i];
                $data->configuration_price = $request->proc_conf_price[$i];
                $data->configuration_type = 'proc';
                $data->save();
            }
            for($i=0;$i<10;$i++) {
                $data = new ProductConfiguration();
                $data->product_id_connection = $product_id;
                $data->configuration = $request->op_memory[$i];
                $data->configuration_price = $request->op_memory_price[$i];
                $data->configuration_type = 'op_memory';
                $data->save();
            }
            for($i=0;$i<10;$i++) {
                $data = new ProductConfiguration();
                $data->product_id_connection = $product_id;
                $data->configuration = $request->hard[$i];
                $data->configuration_price = $request->hard_price[$i];
                $data->configuration_type = 'hard';
                $data->save();
            }
            Products::where('product_id','=',$product_id)->where('lang_id','=',$request->language_id[$k])->update([
                'name' => $request->name[$k],
                'article' => $request->article[$k],
                'text' => $request->editor[$k],
                'attributes_id' => $attribute_string,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'url' => $url,
                'product_status' => $request->product_status,
                'product_isset' => $request->product_isset,
                'product_garanty' => $request->product_garanty,
                'product_stars' => $request->product_stars,
                'timer_current_time' => time(),
                'timer_time' => $next_time,
                'title' => $title,
                'op_memory' => $request->op_memory_p,
                'hard_memory' => $request->hard_memory,
                'proc' => $request->proc,
                'skidka' => $request->skidka,
                'type_memory' => $request->type_memory,
                'op_system' => $request->op_system,
                'op_system_description' => $request->op_system_description,
                'product_gift' => $request->product_gift,
                'product_gift_text' => $request->present_product_text,
                'description' => $description,
                'short_description' => $request->short_description
            ]);
            ProductsTexts::where('product_id_connection','=',$product_id)->delete();
            for($i=0;$i<15;$i++){
                $data = new ProductsTexts();
                $data->product_id_connection = $product_id;
                $data->first_text = $request->editor1[$i];
                $data->second_text = $request->editor2[$i];
                $data->save();
            }
        }
        if(!is_null($request->file('pic')[0])) {
            $files[] = $request->file('pic')[0];
        }
        if($request->file('files') !== null ) {
            foreach ($request->file('files') as $file) {
                $files[] = $file;
            }
        }
        if(isset($files)) {
            ProductImages::where('images_product_id','=',$product_id)->delete();
            foreach ($request->file() as $file) {
                foreach ($file as $f) {
                    if ($f->move(public_path('product_images'), $f->getClientOriginalName())) {
                        $data = new ProductImages();
                        $data->image = $f->getClientOriginalName();
                        $data->images_product_id = $product_id;
                        $data->save();
                    } else {
                        return 'Ошибка загрузки';
                    }
                }
            }
        }
        return redirect()->back();
    }
    public function search_by_article(Request $request){
        $products = DB::table('products')->
        where('lang_id', 1)->
        where('article','like', $request->article.'%')->
        leftJoin('product_images', 'products.product_id', '=', 'product_images.images_product_id')->
        groupBy('product_images.images_product_id')->
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
    public function search_by_name(Request $request){
        $products = DB::table('products')->
        where('lang_id', 1)->
        where('name','like', $request->name.'%')->
        leftJoin('product_images', 'products.product_id', '=', 'product_images.images_product_id')->
        groupBy('product_images.images_product_id')->
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
    public function search_by_category(Request $request){
        if($request->category == 'Все'){
            return redirect()->route('product_list');
        }
        else {
            $products_id = ProductsCategoriesConnection::where('category_name_connection', '=', $request->category)->get();
        }
        $products_all = DB::table('products')->
        where('lang_id', 1)->
        leftJoin('product_images', 'products.product_id', '=', 'product_images.images_product_id')->
        groupBy('products.product_id')->
        get();
        $products = array();
        foreach($products_id as $prod_id){
            foreach($products_all as $prod){
                if($prod_id->product_id_connection == $prod->product_id){
                    $products[] = $prod;
                }
            }
        }

        $categories = Category::where('lang_id','=',1)->get();
        $products_categories_connection_list = ProductsCategoriesConnection::get();
        $categories_list = array();
        foreach ($products_categories_connection_list as $list){
            $categories_list[$list->product_id_connection][] = $list->category_name_connection;
        }
        //dd($categories);
        return view('product_list',[
            'products' => $products,
            'categories' => $categories,
            'categories_list' => $categories_list
        ]);
    }
    public function change_price(Request $request){
        Products::where('product_id','=',$request->product_id)->update(['price'=>$request->price]);
        return redirect()->back();
    }
    public function change_product_active(Request $request){
        $keys = AppliedMethods::get_key_array($request->product_id);
        foreach ($request->all_product_id as $product_id){
            Products::where('product_id','=',$product_id)->update(['is_active' => 0]);
        }
        foreach ($keys as $key){
            Products::where('product_id','=',$key)->update(['is_active' => 1]);
        }
        return redirect()->back();
    }
}
