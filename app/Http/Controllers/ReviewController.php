<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use FileAction;
use File;
class ReviewController extends Controller
{
    public function make_new(){
            $data = new Review();
            $data->title = '';
            $data->text = '';
            $data->image = '';
            $data->save();
        return redirect()->back();
    }
    public function reviews_update(Request $request){

        $this->validate($request,[
            'title' => 'required',
            'text' => 'required'
        ]);
        Review::where('id','=',$request->id)->update([
            'title' => $request->title,
            'image' => FileAction::upload_one_file($request->file(),'reviews_images'),
            'text' => $request->text
        ]);
        return redirect()->back();
    }
    public function reviews_delete(Request $request){
        File::delete(public_path('reviews_images') . '/' . Review::where('id','=',$request->id)->value('image'));
        Review::where('id','=',$request->id)->delete();
        return redirect()->back();
    }
}
