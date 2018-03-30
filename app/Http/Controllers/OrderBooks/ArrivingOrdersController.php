<?php

namespace App\Http\Controllers\OrderBooks;

use App\ArrivingInfo;
use App\ArrivingOrders;
use App\OrderProducts;
use App\Products;
use App\ProductsBatch;
use App\SellerOrders;
use App\SellerProducts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use AppliedMethods;
use App\Orders;
use DB;

class ArrivingOrdersController extends Controller
{
    public function dropDB(){
        OrderProducts::truncate();
        Orders::truncate();
        ArrivingOrders::truncate();
        ArrivingInfo::truncate();
        SellerOrders::truncate();
        SellerProducts::truncate();
        Products::where('id','!=',0)->update([
            'quantity' => 10,
            'reserved_quantity' => 0,
            'arriving_quantity' => 0,
            'booked_quantity' => 0
        ]);
    }
    public function arriving_order_ship_break(Request $request){
        ArrivingOrders::where('arriving_order_number','=',$request->order_number)->update([
            'arriving_condition' => 'Скасован'
        ]);
    }
    public function arriving_order_ship_success(Request $request){
        ArrivingOrders::where('arriving_order_number','=',$request->order_number)->update([
            'arriving_condition' => 'Виконан'
        ]);
        ArrivingInfo::where('arriving_info_order_number','=',$request->order_number)->update([
            'arriving_info_order_condition' => 'Виконан'
        ]);
        $arriving_orders = ArrivingInfo::where('arriving_info_order_number','=',$request->order_number)->get();
        foreach($arriving_orders as $orders){
            Orders::where('order_number','=',$orders->arriving_info_order_number)->update([
                'condition' => 'Виконан'
            ]);
            OrderProducts::where('products_order_number','=',$orders->arriving_info_order_number)->update([
                'products_order_condition' => 'Виконан'
            ]);
        }
        return redirect()->back();
    }
    public function show_arriving_info(Request $request){
        return view('order_books.arriving_info',[
            'orders' => ArrivingInfo::where('arriving_info_order_number','=',$request->arriving_order_number)->get(),
            'order_number' => $request->arriving_order_number
        ]);
    }
    public function arriving_order_make_new(Request $request){
        $data = new ArrivingOrders();
        $arriving_order_number = AppliedMethods::set_number_model('ArrivingOrders', 'arriving_order_number');
        $data->arriving_order_number = $arriving_order_number;
        $data->arriving_condition = 'Формируеться';
        $data->arriving_number = $arriving_order_number;
        $data->arriving_plan_date = $request->date;
        $data->arriving_type = $request->type;  //а будущем добавить позможность выбирать с корзины
        $data->save();
        return redirect()->back();
    }
    public function arriving_change_order_show(Request $request){
        $type = ArrivingOrders::where('arriving_order_number','=',$request->order_number)->value('arriving_type');
        $orders = DB::table('arriving_orders')->
        where('arriving_condition', 'Формується')->
        where('arriving_type', $type)->
        join('arriving_info', 'arriving_orders.arriving_order_number', '=', 'arriving_info.arriving_info_order_number')->
        //   groupBy('products.product_id')->
        get();
        return view('order_books.arriving_change_order',[
            'orders' => $orders,
            'new_order_number' => $request->order_number
        ]);
    }
    public function arriving_change_order(Request $request){
        $arriving_id = AppliedMethods::get_key_array($request->checkbox);
        foreach ($arriving_id as $id){
            ArrivingInfo::where('id','=',$id)->update(['arriving_info_order_number' => $request->new_order_number]);
        }
        return redirect()->route('show_shipment_book');
    }
    public function arriving_order_ship(Request $request){
        $array_of_arriving_products = array();
        $products_sum = 0;
        $arr_products = ArrivingInfo::where('arriving_info_order_number','=',$request->order_number)->get();
        foreach ($arr_products as $arr_product){
            $array_of_arriving_products[] = OrderProducts::where('products_order_number','=',$arr_product->arriving_info_number)->get();
        }
        foreach ($array_of_arriving_products as $array_of_arriving_product){
            foreach ($array_of_arriving_product as $arriving_product){
                $product_quantity = $arriving_product->products_quantity;
                $all_product_quantity = $product_quantity;
             //   $product_rest_quantity = 0;
                $product_batches = ProductsBatch::where('batch_products_id','=',$arriving_product->order_products_id)->get();
                if(count($product_batches) == 0){
                    continue;
                }
                else{
                    foreach ($product_batches as $batch){
                        if($batch->batch_quantity < $product_quantity){
                            $product_quantity = $product_quantity - $batch->batch_quantity;
                            $products_sum += $batch->batch_quantity * $batch->batch_price;
                            ProductsBatch::where('id','=',$batch->id)->update([
                                'batch_quantity' => 0,
                                'batch_sum' => 0
                            ]);
                        }
                        else{
                            $products_sum += $product_quantity * $batch->batch_price;
                            ProductsBatch::where('id','=',$batch->id)->update([
                                'batch_quantity' => $batch->batch_quantity - $product_quantity,
                                'batch_sum' => ($batch->batch_quantity - $product_quantity) * $batch->batch_price
                            ]);
                            break 1;
                        }
                    }
                }
                $product_table = Products::where('product_id','=',$arriving_product->order_products_id)->
                where('lang_id','=',1)->get();
                Products::where('product_id','=',$arriving_product->order_products_id)->update([
                    'quantity' => $product_table[0]->quantity - $all_product_quantity,
                    'reserved_quantity' => $product_table[0]->reserved_quantity - $all_product_quantity,
                    'arriving_quantity' => $product_table[0]->arriving_quantity - $all_product_quantity,
       //             'booked_quantity' => $product_table[0]->booked_quantity - $all_product_quantity,
                ]);
            }
            if(count($array_of_arriving_product) != 0) {
                Orders::where('order_number', '=', $array_of_arriving_product[0]->products_order_number)->update([
                    'buying_sum' => $products_sum
                ]);
            }
            $products_sum = 0;
        }
        ArrivingOrders::where('arriving_order_number','=',$request->order_number)->update([
            'arriving_condition' => 'Прийнят до виконання',
            'arriving_time' => date("H:i:s"),
            'arriving_date' => date("Y.m.d")
        ]);
        $arriving_products = ArrivingInfo::where('arriving_info_order_number','=',$request->order_number)->get();
        foreach ($arriving_products as $product){
            Orders::where('order_number','=',$product->arriving_info_number)->update([
                'condition' => 'Виконується'
            ]);
        }
        ArrivingInfo::where('arriving_info_order_number','=',$request->order_number)->update([
            'arriving_info_order_condition' => 'Виконується'
        ]);

        return redirect()->route('show_shipment_book');
    }
}
