<?php

namespace App\Http\Controllers;

use App\Suppliers;
use App\Traders;
use Illuminate\Http\Request;
use AppliedMethods;
class SupplierController extends Controller
{
    public function add_supplier(){
        $trader_id = AppliedMethods::set_number_model('Traders','id');
        $data = new Traders();
        $data->save();
        return view('supplier_edit',[
            'supplier' => Traders::where('id','=',$trader_id)->get()
        ]);
    }
    public function edit_supplier(Request $request){
        Traders::where('id','=',$request->id)->update([
            'traders_id' => $request->traders_id,
            'traders_name' => $request->traders_name,
            'traders_main_phone_number' => $request->traders_main_phone_number,
            'traders_second_phone_number' => $request->traders_second_phone_number,
            'traders_email' => $request->traders_email,
            'traders_delay' => $request->traders_delay,
            'traders_deadline_to_order' => $request->traders_deadline_to_order
        ]);
        return redirect()->route('supplier_list');
    }
    public function edit_old_supplier(Request $request){
        return view('supplier_edit',[
            'supplier' => Traders::where('id','=',$request->id)->get()
        ]);
    }
}
