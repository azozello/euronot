<?php

namespace App\Http\Controllers;

use App\ArrivingInfo;
use App\ArrivingOrders;
use App\Cart;
use App\Helpers\Facades\AppliedMethods;
use App\OrderProducts;
use App\Orders;
use App\Products;
use DB;
use Event;
use LisDev\Delivery\NovaPoshtaApi2;
use GuzzleHttp;
use App\Events\eventTrigger;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add_to_cart(Request $request){
        $this->set_session_id();
        $data = new Cart;
        $data->user_id = session('id');
        $data->cart_product_id = $request->product_id;
        $data->cart_quantity = $request->quantity ;
        $data->save();
        return redirect()->route('cart_show');
    }
    public function delete_from_cart(Request $request){
        Cart::where('user_id',$request->user_id)->where('cart_product_id',$request->cart_product_id)->delete();
        return redirect()->back();
    }
    public function quantity_change(Request $request){
        Cart::where('user_id',$request->user_id)->where('cart_product_id',$request->cart_product_id)->update(['cart_quantity'=>$request->quantity]);
        return redirect()->back();
    }
    public function issue_order(Request $request){
        $this->set_session_id();
        $np = new NovaPoshtaApi2('cf496ae039d75b1131a2923f9eb2641a');

        //$city = $np->getCity('Киев', 'Киевская');
       // $result = $np->getWarehouses('640');
        $warehouses_type = $np->getWarehouseTypes();
        //dd($warehouses_type);
        $warehouses = array();
        foreach ($warehouses_type['data'] as $types){
            switch ($types['Description']){
                case 'Parcel Shop':
                    $warehouses['Parcel Shop'] = $types['Ref'];
                    break;
                case 'Поштове відділення':
                    $warehouses['Поштове відділення'] = $types['Ref'];
                    break;
                case 'Вантажне відділення':
                    $warehouses['Вантажне відділення'] = $types['Ref'];
                    break;
            }
        }
        //dd($warehouses);
        $cites = $np->getCities();
        //dd($cites);
        $result = $np->getWarehouses($cites['data'][10]["Ref"]);
       // dd($result);
        $array_of_warehouses = array();
        foreach($result['data'] as $warehouse){
            if($warehouse['TypeOfWarehouse'] == $warehouses['Parcel Shop'] ||
                $warehouse['TypeOfWarehouse'] == $warehouses['Поштове відділення'] ||
                $warehouse['TypeOfWarehouse'] == $warehouses['Вантажне відділення']){
                   $array_of_warehouses[] = $warehouse;
            }
        }
        //dd($cites['data']);
        //$result = $np->getWarehouses($city);
        //dd($result);
        return view('site.order-checkout',[
            'products' => json_decode($request->product_list),
            'cities' => $cites['data'],
            'sum' => 0
        ]);
    }
    public function add_order(Request $request){
        //event(new eventTrigger());
        //dd($request);
        $this->set_session_id();
        $cart_products = DB::table('cart')
            ->where('cart.user_id',session('id'))
            ->join('products','products.product_id','=','cart.cart_product_id')
            ->where(['products.lang_id' => 1])
            ->get();
        $sum = 0;
        $order_number = AppliedMethods::set_number_model('Orders','order_number');
        foreach($cart_products as $cart_product){
            if($cart_product->quantity - $cart_product->reserved_quantity >= $cart_product->cart_quantity){
                $condition = 'Готов к отгрузке';
            }
            else{
                $condition = 'Не готов к отгрузке';
            }
            $sum += $cart_product->cart_quantity * $cart_product->price;
        }

        $data = new Orders;
        $data->condition = $condition;
        $data->order_number = $order_number;
        $data->creating_order_date = date("Y.m.d");
        $data->creating_order_time = date("H:i:s");
        $data->user_id = session('id');
        $data->user_name = $request->user_name;
        $data->user_phone_number = $request->user_phone_number;
        $data->selling_sum = $sum;
        $data->transportation_type = 'Курьер';    //а будущем добавить позможность выбирать с корзины
        $data->payment_type = 'Предоплата';    //а будущем добавить позможность выбирать с корзины
        $data->transportation_address = $request->city;
        $data->preferred_transportation_date = $request->transportation_date;
        $data->overdue_order = 'Нет';
        $data->save();
        foreach($cart_products as $cart_product){
            $product = Products::where('product_id',$cart_product->cart_product_id)->where('lang_id',1)->get();
            $data = new OrderProducts();
            $data->order_products_id = $product[0]->product_id;
            $data->products_order_number = $order_number;
            $data->products_article = $product[0]->article;
            $data->products_name = $product[0]->name;
            $data->products_price = $product[0]->price;
            $data->products_quantity = $cart_product->cart_quantity;
            $data->products_price_with_quantity = $product[0]->price * $cart_product->cart_quantity;
            $data->save();
/*
            if($product[0]->quantity < $product[0]->reserved_quantity + $cart_product->cart_quantity){
                $reserved_quantity = $product[0]->quantity;
            }
            else{
                $reserved_quantity = $product[0]->reserved_quantity + $cart_product->cart_quantity;
            }
*/          $reserved_quantity = $product[0]->reserved_quantity + $cart_product->cart_quantity;
            Products::where('product_id',$cart_product->cart_product_id)->update([
                'arriving_quantity' => $product[0]->arriving_quantity + $cart_product->cart_quantity,
                'reserved_quantity' => $reserved_quantity
            ]);
        }

        if($condition == 'Готов к отгрузке'){
            $arriving_date = date("Y.m.d");
            if(count(ArrivingOrders::where('arriving_plan_date','=',date("Y.m.d"))->
            where('arriving_type','=','Курьер')->get()) == 0){   //а будущем добавить позможность выбирать с корзины
                $arriving_order_number = AppliedMethods::set_number_model('ArrivingOrders','arriving_order_number');
                $data = new ArrivingOrders();
                $data->arriving_order_number = $arriving_order_number;
                $data->arriving_condition = 'Формується';
                $data->arriving_number = $arriving_order_number;
                $data->arriving_plan_date = date("Y.m.d");
                $data->arriving_type = 'Курьер';  //а будущем добавить позможность выбирать с корзины
                $data->save();
            }
            if(ArrivingOrders::where('arriving_plan_date','=',date("Y.m.d"))->
            where('arriving_type','=','Курьер')->value('arriving_condition') != 'Формується'){
                $d = strtotime("+1 day");
                $arriving_order_number = AppliedMethods::set_number_model('ArrivingOrders','arriving_order_number');
                $data = new ArrivingOrders();
                $data->arriving_order_number = $arriving_order_number;
                $data->arriving_condition = 'Формується';
                $data->arriving_number = $arriving_order_number;
                $data->arriving_plan_date = date("Y.m.d",$d);
                $data->arriving_type = 'Курьер';  //а будущем добавить позможность выбирать с корзины
                $data->save();

                $arriving_date = date("Y.m.d",$d);;
            }
            $arriving_plan = ArrivingOrders::where('arriving_plan_date','=',$arriving_date)->
            where('arriving_type','=','Курьер')->
            where('arriving_condition','Формується')->get();
            $data = new ArrivingInfo();
            $data->arriving_info_order_number = $arriving_plan[0]->arriving_order_number;
            $data->arriving_info_order_condition = 'Готов';
            $data->arriving_info_number = $order_number;
            $data->arriving_info_order_date = $arriving_date;
            $data->arriving_info_user_name = $request->user_name;
            $data->arriving_info_sum = $sum;
            $data->arriving_info_address = $request->city;
            $data->arriving_info_preferred_date = $request->transportation_date;
            $data->save();
        }
        Cart::where('user_id',session('id'))->delete();
        Event::fire(new eventTrigger());
        return redirect()->route('show_site_index');
    }
    public function choose_warehouse(Request $request){
        return $request;
    }
    private function set_session_id(){
        if(session('id') == null) {
            $id = rand(100000,1000000);
            session()->put('id', $id);
        }
    }
}
