<?php

namespace App\Http\Controllers\OrderBooks;

use App\OrderProducts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientBookController extends Controller
{
    public function show_order_products(Request $request){
        $products = OrderProducts::where('products_order_number','=',$request->order_number)->get();
        return view('order_books.order_books',[
            'products' => $products
        ]);
    }
}
