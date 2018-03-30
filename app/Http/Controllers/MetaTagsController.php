<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DefaultMetaTags;

class MetaTagsController extends Controller
{
    public function default_meta_tags(Request $request){
        if(count(DefaultMetaTags::where('type','=',$request->type)->get()) != 0){
            DefaultMetaTags::where('type','=',$request->type)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
        }
        else{
            $data = new DefaultMetaTags();
            $data->title = $request->title;
            $data->description = $request->description;
            $data->type = $request->type;
            $data->save();
        }
        return redirect()->back();
    }
}
