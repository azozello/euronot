<?php

namespace App\Http\Controllers;

use App\Helpers\Facades\AppliedMethods;
use App\ProductComment;
use Illuminate\Http\Request;
use App\Review;
use FileAction;
use File;
class ReviewController extends Controller
{
    public function make_new(Request $request){
            $keys = AppliedMethods::get_key_array($request->is_active);
            foreach ($keys as $key) {
                ProductComment::where('product_comment_id', '=',$key)->update([
                    'is_active' => $request->is_active[$key]
                ]);
                }
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
