<?php

namespace App\Http\Controllers\OrderBooks;

use App\Helpers\Facades\AppliedMethods;
use App\OrderProducts;
use App\Products;
use App\SellerOrders;
use App\ArrivingOrders;
use App\ArrivingInfo;
use App\SellerProducts;
use App\Orders;
use App\ProductsBatch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SellerOrdersController extends Controller
{
    public function show_seller_products(Request $request){
        //dd(SellerProducts::where('seller_products_order_number','=',$request->order_number)->get());
        return view('order_books.seller_product_make',[
            'orders' => SellerProducts::where('seller_products_order_number','=',$request->order_number)->get(),
            'order_number' => $request->order_number,
            'trader' => $request->trader
        ]);
    }
    public function show_seller_product_make(Request $request){
        $seller_order_number = AppliedMethods::set_number_model('SellerOrders','seller_order_number');
        $data = new SellerOrders();
        $data->seller_order_condition = 'Формується';
        $data->seller_order_number = $seller_order_number;
        $data->seller_creating_order_time = date("H:i:s");
        $data->seller_creating_order_date = date("Y.m.d");
        $data->seller_overdue_order = 0;
        $data->seller_supplier_name = $request->trader;
        $data->save();
        return view('order_books.seller_product_make',[
            'orders' => SellerProducts::where('seller_products_order_number','=',$seller_order_number)->get(),
            'order_number' => $seller_order_number,
            'trader' => $request->trader
        ]);
        //вывести поставщиков
    }
    public function seller_products_autogenerate(Request $request){
        SellerProducts::where('seller_products_order_number','=',$request->order_number)->delete();
        $order_products = DB::table('products')->
        where('products.lang_id',1)->
        join('order_products','products.product_id','=','order_products.order_products_id')->
        where('order_products.products_order_condition',NULL)->
        rightJoin('traders','products.product_provider','=','traders.traders_name')->
     //   groupBy('order_products.order_products_id')->
        get();
        $order_sum = 0;
        $all_quantity = 0;
        foreach ($order_products as $order_product){
            $all_quantity+=$order_product->products_quantity;
            if($all_quantity < $order_product->quantity){
                continue;
            }
            $needed_quantity = $order_product->arriving_quantity - ($order_product->quantity + $order_product->booked_quantity);
            if($needed_quantity > 0 && $order_product->product_provider == $request->trader){
                $data = new SellerProducts();
                $data->seller_products_id = $order_product->product_id;
                $data->seller_products_order_number = $request->order_number;
                $data->seller_products_article = $order_product->article;
                $data->seller_products_name = $order_product->name;
                $data->seller_products_price = $order_product->supplier_price;
                $data->seller_products_quantity = $needed_quantity;
                $data->seller_products_sum = $needed_quantity * $order_product->supplier_price;
                $data->save();

                $order_sum += $needed_quantity * $order_product->supplier_price;

                OrderProducts::where('products_order_number','=',$order_product->products_order_number)->
                where('order_products_id','=',$order_product->product_id)->
                update([
                    'products_seller_first_order_number' => $request->order_number
                ]);
            }
        }
        SellerOrders::where('seller_order_number','=',$request->order_number)->update(['seller_order_sum' => $order_sum]);
        return redirect()->route('show_seller_products',['order_number' => $request->order_number,'trader' => $request->trader]);
    }
    public function seller_products_save(Request $request){
        if (isset($_POST['save'])) {
            $sum = 0;
            SellerProducts::where('seller_products_order_number','=',$request->order_number)->delete();
            foreach($request->id as $k=>$id){
                $data = new SellerProducts();
                $data->seller_products_id = $request->seller_products_id[$k];
                $data->seller_products_order_number = $request->order_number;
                $data->seller_products_article = $request->article[$k];
                $data->seller_products_name = $request->name[$k];
                $data->seller_products_price = $request->price[$k];
                $data->seller_products_quantity = $request->quantity[$k];
                $data->seller_products_sum = $request->sum[$k];
                $data->save();

                $sum+=$request->sum[$k];
            }

            OrderProducts::where('products_seller_first_order_number','=',$request->order_number)->update([
                'products_order_condition' => 'Формується'
            ]);
            SellerOrders::where('seller_order_number','=',$request->order_number)->update([
                'seller_order_sum' => $sum
            ]);
            $orders = DB::table('orders')->
            join('order_products','orders.order_number','=','order_products.products_order_number')->
            get();
            foreach ($orders as $order){
                if($order->products_order_condition == 'Формується'){
                    Orders::where('order_number','=',$order->products_order_number)->update([
                        'condition' => 'Формується'
                    ]);
                }
            }
            return redirect()->route('show_supplier_book');
        }
        if (isset($_POST['make_order'])) {

            SellerOrders::where('seller_order_number','=',$request->order_number)->update([
                'seller_order_condition' => 'Очікується'
            ]);
            foreach ($request->article as $k=>$article) {
                $booked_quantity = Products::where('article', '=', $article)->value('booked_quantity');
                Products::where('article', '=', $article)->update([
                    'booked_quantity' => $booked_quantity + $request->quantity[$k]
                ]);
            }

            OrderProducts::where('products_seller_first_order_number','=',$request->order_number)->update([
                'products_order_condition' => 'Забезпечується',
                'products_seller_order_number' => $request->order_number
            ]);
            $orders = DB::table('orders')->
            join('order_products','orders.order_number','=','order_products.products_order_number')->
            get();

            foreach ($orders as $order){
                if($order->products_order_condition == 'Забезпечується'){
                    Orders::where('order_number','=',$order->products_order_number)->update([
                        'condition' => 'Забезпечується'
                    ]);
                }
            }

            return redirect()->route('show_supplier_book');
        }
        foreach($request->id as $k=>$id) {
            if (isset($_POST['delete'.$id])) {
                $order_number = SellerProducts::where('id','=',$id)->get();
                OrderProducts::where('order_products_id','=',$order_number[0]->seller_products_id)->
                where('products_seller_first_order_number','=',$order_number[0]->seller_products_order_number)->update([
                    'products_seller_first_order_number' => NULL
                ]);
                SellerProducts::where('id','=',$id)->delete();
                return redirect()->back();
            }
        }

    }
    public function seller_products_add_field(Request $request){
        for($i=0;$i<$request->count;$i++){
            $data = new SellerProducts();
            $data->seller_products_order_number = $request->order_number;
            $data->save();
        }
        return redirect()->route('show_seller_products',[
            'order_number' => $request->order_number
        ]);
    }
    public function seller_order_get(Request $request){
        $seller_products = SellerProducts::where('seller_products_order_number','=',$request->order_number)->get();
        foreach ($seller_products as $seller_product){
            $product = Products::where('article','=',$seller_product->seller_products_article)->where('lang_id','=',1)->get();
            Products::where('article','=',$seller_product->seller_products_article)->
            update([
                'quantity' => $seller_product->seller_products_quantity + $product[0]->quantity,
                'booked_quantity' => $product[0]->booked_quantity - $seller_product->seller_products_quantity
                ]);
            $data = new ProductsBatch();
            $data->batch_products_id = $product[0]->product_id;
            $data->batch_number = AppliedMethods::set_number_model('ProductsBatch','batch_number');
            $data->batch_price = $seller_product->seller_products_price;
            $data->batch_quantity = $seller_product->seller_products_quantity;
            $data->batch_sum = $seller_product->seller_products_sum;
            $data->batch_order_number = $seller_product->seller_products_order_number;
            $data->batch_date = date("Y.m.d");
            $data->batch_time = date("H:i:s");
            $data->save();
        }
        SellerOrders::where('seller_order_number','=',$request->order_number)->update(['seller_order_condition' => 'Надійшов']);

        $product_counter = 0;    //блок смены состояния в заказе клиента
        $order_products_list = Orders::get();
        foreach($order_products_list as $order_products){
            $order_product = DB::table('order_products')->
            where('products_order_number', $order_products->order_number)->
            join('products', 'products.product_id', '=', 'order_products.order_products_id')->
            where('products.lang_id', 1)->
            //   groupBy('products.product_id')->
            get();
            foreach($order_product as $product){
                if($product->products_quantity <= $product->quantity){     // >=
                    $product_counter++;
                }
            }
            if(count($order_product) == $product_counter) {
                Orders::where('order_number', '=', $order_products->order_number)->update([
                    'condition' => 'Готов к отгрузке'
                ]);
                OrderProducts::where('products_order_number', '=', $order_products->order_number)->update([
                    'products_order_condition' => 'Готов к отгрузке'
                ]);
                $arriving_date = date("Y.m.d");
                if (count(ArrivingInfo::where('arriving_info_number', '=', $order_products->order_number)->
                    get()) == 0) {
                    if (count(ArrivingOrders::where('arriving_plan_date', '=', date("Y.m.d"))->
                        where('arriving_type', '=', 'Курьер')->get()) == 0) {   //а будущем добавить позможность выбирать с корзины
                        $arriving_order_number = AppliedMethods::set_number_model('ArrivingOrders', 'arriving_order_number');
                        $data = new ArrivingOrders();
                        $data->arriving_order_number = $arriving_order_number;
                        $data->arriving_condition = 'Формується';
                        $data->arriving_number = $arriving_order_number;
                        $data->arriving_plan_date = date("Y.m.d");
                        $data->arriving_type = 'Курьер';  //а будущем добавить позможность выбирать с корзины
                        $data->save();
                    }
                    if (ArrivingOrders::where('arriving_plan_date', '=', date("Y.m.d"))->
                        where('arriving_type', '=', 'Курьер')->value('arriving_condition') != 'Формується') {
                        $d = strtotime("+1 day");
                        $arriving_order_number = AppliedMethods::set_number_model('ArrivingOrders', 'arriving_order_number');
                        $data = new ArrivingOrders();
                        $data->arriving_order_number = $arriving_order_number;
                        $data->arriving_condition = 'Формується';
                        $data->arriving_number = $arriving_order_number;
                        $data->arriving_plan_date = date("Y.m.d", $d);
                        $data->arriving_type = 'Курьер';  //а будущем добавить позможность выбирать с корзины
                        $data->save();

                        $arriving_date = date("Y.m.d", $d);;
                    }
                    $arriving_plan = ArrivingOrders::where('arriving_plan_date', '=', $arriving_date)->
                    where('arriving_type', '=', 'Курьер')->
                    where('arriving_condition', 'Формується')->get();
                    $data = new ArrivingInfo();
                    $data->arriving_info_order_number = $arriving_plan[0]->arriving_order_number;
                    $data->arriving_info_order_condition = 'Готов';
                    $data->arriving_info_number = $order_products->order_number;
                    $data->arriving_info_order_date = $arriving_date;
                    $data->arriving_info_user_name = $order_products->user_name;
                    $data->arriving_info_sum = $order_products->selling_sum;;
                    $data->arriving_info_address = $order_products->transportation_address;
                    $data->arriving_info_preferred_date = $order_products->preferred_transportation_date;
                    $data->save();
                }
                /*
                  if (count(ArrivingInfo::where('arriving_info_number', '=', $order_products->order_number)->
                        get()) == 0) {
                    if (count(ArrivingOrders::where('arriving_plan_date', '=', date("Y.m.d"))->
                        where('arriving_type', '=', 'Курьер')->get()) == 0) {   //а будущем добавить позможность выбирать с корзины
                        $arriving_order_number = AppliedMethods::set_number_model('ArrivingOrders', 'arriving_order_number');
                        $data = new ArrivingOrders();
                        $data->arriving_order_number = $arriving_order_number;
                        $data->arriving_condition = 'Формується';
                        $data->arriving_number = $arriving_order_number;
                        $data->arriving_plan_date = date("Y.m.d");
                        $data->arriving_type = 'Курьер';  //а будущем добавить позможность выбирать с корзины
                        $data->save();
                    }
                    $arriving_plan = ArrivingOrders::where('arriving_plan_date', '=', date("Y.m.d"))->
                    where('arriving_type', '=', 'Курьер')->get();
                    $data = new ArrivingInfo();
                    $data->arriving_info_order_number = $arriving_plan[0]->arriving_order_number;
                    $data->arriving_info_order_condition = 'Готов';
                    $data->arriving_info_number = $order_products->order_number;
                    $data->arriving_info_order_date = date("Y.m.d");
                    $data->arriving_info_user_name = $order_products->user_name;
                    $data->arriving_info_sum = $order_products->selling_sum;
                    $data->arriving_info_address = $order_products->transportation_address;
                    $data->arriving_info_preferred_date = $order_products->preferred_transportation_date;
                    $data->save();
                }
                */
            }
            $product_counter = 0;
        }

        return redirect()->route('show_supplier_book');
    }
}
