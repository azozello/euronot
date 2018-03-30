<?php

namespace App\Http\Controllers;

use App\Redirects;
use Illuminate\Http\Request;

class PathController extends Controller
{
    public function new_redirect(){
        $data = new Redirects();
        $data->old_url = '';
        $data->new_url = '';
        $data->save();
        return redirect()->back();
    }
    public function update_redirect(Request $request){
        Redirects::where('id','=',$request->id)->update([
            'old_url' => $request->old_url,
            'new_url' => $request->new_url
        ]);
        return redirect()->back();
    }
}
