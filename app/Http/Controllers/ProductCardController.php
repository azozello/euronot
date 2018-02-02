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
use Image;
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
        //подключение изображений
        //dd($request);
        foreach ($request->editor as $k => $editor) {
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
            foreach ($files as $f) {
                //dd($f);
                if (Image::make($f)
                    ->save(public_path('product_images') . '/' . $f->getClientOriginalName())) {
                    $data = new ProductImages();
                    $data->image = $f->getClientOriginalName();
                    $data->images_product_id = $product_id;
                    $data->save();
                } else {
                    return 'Ошибка загрузки';
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
        foreach ($request->editor as $k => $editor) {

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
            $data->product_type = $request->coffee_type;
            $data->lang_id = $request->language_id[$k];
            $data->product_delay_in_delivery  = $request->product_delay_in_delivery ;
            $data->product_deadline_to_arrive = $request->product_deadline_to_arrive;
            $data->product_optimal_quantity  = $request->product_optimal_quantity ;
            $data->product_availability  = $request->product_availability ;
            $data->product_provider  = $request->product_provider ;
            $data->title = $title;
            $data->description = $description;
            $data->save();
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
        ProductsCategoriesConnection::where('product_id_connection','=',$request->product_id)->delete();
        Products::where('product_id','=',$request->product_id)->delete();
        return redirect()->back();
    }
    public function search_product(Request $request){

    }
    public function edit_product_show(Request $request){
        $product = Products::where('product_id','=',$request->product_id)->get();
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
       // dd($categories_list);
        return view('edit_product_card',[
            'product_pictures' => $product_pictures,
            'product_attributes' => $product_attributes,
            'product' => $product,
            'categories_list' => $categories_list,
            'languages' => $languages,
            'categories' => $categories,
            'filters' => $filers,
            'attributes' => $attributes,
            'suppliers' => Traders::get()
        ]);
    }
    public function edit_product(Request $request){
     //dd($request);
        $product_id = $request->product_id;
        ProductsCategoriesConnection::where('product_id_connection','=',$product_id)->delete();
        foreach ($request->editor as $k => $editor) {
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
        foreach ($request->editor as $k => $editor) {

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
//dd($request);
            Products::where('product_id','=',$product_id)->where('lang_id','=',$request->language_id[$k])->update([
                'name' => $request->name[$k],
                'article' => $request->article[$k],
                'text' => $request->editor[$k],
                'attributes_id' => $attribute_string,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'url' => $url,
                'product_provider' => $request->product_provider ,
                'product_delay_in_delivery' => $request->product_delay_in_delivery,
                'product_deadline_to_arrive' => $request->product_deadline_to_arrive,
                'product_optimal_quantity' => $request->product_optimal_quantity,
                'product_availability' => $request->product_availability,
                'product_type' => $request->coffee_type,
                'title' => $title,
                'description' => $description
            ]);
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
