<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photos;
use File;
use App\Slider;
use App\ImagesProperties;
use Image;
class PhotosController extends Controller
{
    public function add_new_photos(Request $request){
        $width = ImagesProperties::where('id','=',1)->value('width');
        $hight = ImagesProperties::where('id','=',1)->value('hight');
        if($width != 0 && $hight != 0) {
            foreach ($request->file() as $file) {
                foreach ($file as $f) {
                    if (Image::make($f)
                        ->resize($width, $hight)
                        ->save(public_path('gallery') . '/' . $f->getClientOriginalName())) {
                        $data = new Photos();
                        $data->name = $f->getClientOriginalName();
                        $data->save();
                    } else {
                        return 'Ошибка загрузки';
                    }
                }
            }
            return redirect()->back();
        }
        else {
            foreach ($request->file() as $file) {
                foreach ($file as $f) {
                    if ($f->move(public_path('gallery'), $f->getClientOriginalName())) {
                        $data = new Photos();
                        $data->name = $f->getClientOriginalName();
                        $data->save();
                    } else {
                        return 'Ошибка загрузки';
                    }
                }
            }
            return redirect()->back();
        }
    }
    public function delete_gallery_images(Request $request){
        File::delete(public_path('gallery').'/'.$request->name);
        Photos::where('name',$request->name)->delete();
        return redirect()->back();
    }
    public function add_slider(){
        $data = new Slider();
        $data->title = '';
        $data->text = '';
        $data->image = '';
        $data->save();
        return redirect()->back();
    }
    public function slider_update(Request $request){
        foreach ($request->file() as $f) {
            if ($f->move(public_path('slider'), $f->getClientOriginalName())) {
                Slider::where('id','=',$request->id)->update([
                    'image' =>  $f->getClientOriginalName(),
                    'text' => $request->text
                ]);
                return redirect()->back();
            }
            else
            {
                return 'Ошибка загрузки';
            }
        }
    }
    public function delete_slider(Request $request){
        File::delete(public_path('slider').'/'.$request->name);
        Slider::where('id','=',$request->id)->delete();
        return redirect()->back();
    }
}
