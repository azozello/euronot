<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CacheModel;
use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    public function cache_on(){
        //dd(count(CacheModel::get()));
        if(count(CacheModel::get()) != 0){
            CacheModel::where('id','=',1)->update(['condition' => 1]);
        }
        else{
            $data = new CacheModel();
            $data->condition = 1;
            $data->save();
        }
        return redirect()->back();
    }
    public function cache_off(){
        if(count(CacheModel::get()) != 0){
            CacheModel::where('id','=',1)->update(['condition' => 0]);
        }
        else{
            $data = new CacheModel();
            $data->condition = 0;
            $data->save();
        }
        return redirect()->back();
    }
    public function cache_clean(){
        Cache::flush();
        return redirect()->back();
    }
}
