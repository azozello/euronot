<?php

namespace App\Http\Controllers;

use App\Helpers\Facades\AppliedMethods;
use Validator;
use Illuminate\Http\Request;
use DB;
use Image;
use App\ImagesProperties;
use File;
use Illuminate\Support\Facades\Storage;
use Input;
use Illuminate\Support\Facades\Redirect;
class imgController extends Controller
{
    public function config(Request $request){
        $width = AppliedMethods::zero_if_null($request->width);
        $hight = AppliedMethods::zero_if_null($request->hight);
        if(count(ImagesProperties::where('id','=',1)->get())==0){
            ImagesProperties::insert([
                'width'=>$width ,
                'hight'=>$hight]);
        }
        else{
            ImagesProperties::where('id','=',1)->update(['width'=>($width) ,'hight'=>$hight]);
        }
        return redirect()->back();
    }

    public function download(){
        $width = DB::table('image_properties')->where('id','=',1)->value('width');
        $hight = DB::table('image_properties')->where('id','=',1)->value('hight');

        $file = Input::file('file');
        Image::make($file)
            ->resize($width, $hight)
            ->save(storage_path('images').'/image2.jpg', $file->getClientOriginalName());

    }
    public function images_zip(Request $request){
        if($request->width < 1 || $request->hight < 1 || $request->width > 2000 || $request->hight >2000){
            return Redirect::back()->withErrors(['Некорректные входные данные']);
        }
        $files = Storage::disk('images')->files('/'.$request->name.'/image');
        $mime_types = array('image/gif','image/jpeg','image/png','image/svg+xml');
        foreach ($files as $file){
            if(in_array(File::mimeType($file),$mime_types)) {
                Image::make(public_path() . '/' . $file)
                    ->resize($request->width, $request->hight)
                    ->save(public_path() . '/' . $file);
            }
        }
        return \redirect()->back();
    }
}
