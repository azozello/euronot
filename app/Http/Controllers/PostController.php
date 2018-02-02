<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;
use Illuminate\Support\Facades\Mail;
use App\Post;
use App\Subscription;
use App\SubscriptionTemplate;
use File;
use AppliedMethods;
use StringAction;
use Validator;
use Redirect;

class PostController extends Controller
{
    public function feedback_name(Request $request){
        if(count(Feedback::get()) == 0){
            $data = new Feedback();
            $data->name_form = $request->name;
            $data->phone_form = $request->phone_number;
            $data->email_form = $request->email;
            $data->comment_form =  $request->comment;
            $data->save();
        }
        else{
            Feedback::where('id','=',1)->update([
                'name_form' => $request->name,
                'phone_form' => $request->phone_number,
                'email_form' => $request->email,
                'comment_form' => $request->comment
            ]);
        }
        return redirect()->back();
    }
    public function feedback_mail(Request $request){
        if(count(Feedback::get()) == 0){
            $data = new Feedback();
            $data->title = $request->title;
            $data->text = $request->text;
            $data->email = $request->email;
            $data->save();
        }
        else{
            Feedback::where('id','=',1)->update([
                'title' => $request->title,
                'text' => $request->text,
                'email' => $request->email,
            ]);
        }
        return redirect()->back();
    }
    public function mail(Request $request){
        try {
            $data = Feedback::get();

            $html_page = StringAction::html_img_to_php_tag($data[0]->text);
            $mailData = [
                "name" => $request->name,
                "second_name" => $request->second_name,
                "phone_number" => $request->phone_number,
                "form_title" => $data[0]->title,
                "form_email" => $data[0]->email,
                "email" => $request->email,
                "comment" => $request->comment
            ];
            AppliedMethods::value_if_null($mailData['email'],'express@gmail.com');
            $v = Validator::make($mailData,[
                'email' => 'email'
            ]);
            if($v->fails()){
                return Redirect::back()->withErrors(['Указан некорректный email или номер телефона']);
            }
            $mailData['form_title'] = AppliedMethods::space_if_null($mailData['form_title']);
            $mailData['name'] = AppliedMethods::space_if_null($mailData['name']);
            $mailData['second_name'] = AppliedMethods::space_if_null($mailData['second_name']);
            $mailData['comment'] = AppliedMethods::space_if_null($mailData['comment']);
            $mailData['your_email'] = $data[0]->email;

            File::put(resource_path('views/layouts/mail.blade.php'), $html_page);

            Mail::send('layouts.mail', $mailData, function (\Illuminate\Mail\Message $mail) use ($mailData) {
                $mail->subject($mailData['form_title']);
                $mail->from('info@climat-ukraine.com', 'test');
                $mail->to($mailData['your_email']);
            });
        } catch (\Throwable $t){
            return Redirect::back()->withErrors(['Ошибка отправики сообщения']);
        }

        $data = new Post();
        $data->name = $request->second_name.' '. $request->name;
        $data->phone_number = $request->phone_number;
        $data->email = $request->email;
        $data->comment = $request->comment;
        $data->date = date("y.m.d");
        $data->save();

        return redirect()->back();
    }
    public function subscription_template(Request $request){
        if(count(SubscriptionTemplate::get()) != 0){
            SubscriptionTemplate::where('id','=',1)->update(['title' => $request->title , 'text' => $request->text]);
        }
        else{

            $data = new SubscriptionTemplate();
            $data->title = $request->title;
            $data->text = $request->text;
            $data->save();
        }
        return redirect()->back();
    }
    public function subscription_send(){
        $data = SubscriptionTemplate::get();
        $emails = Subscription::get();
        $html_page = StringAction::html_img_to_php_tag($data[0]->text);

        $mailData = [
            "title" => $data[0]->title,
            "text" => $html_page
        ];
        File::put(resource_path('views/layouts/subscription_mail.blade.php'), $html_page);
        foreach ($emails as $email) {
            Mail::send('layouts.subscription_mail', $mailData, function (\Illuminate\Mail\Message $mail) use ($mailData,$email) {
                $mail->subject($mailData['title']);
                $mail->from('test@itfoxy.com', 'test');
                $mail->to($email->email);
            });
        }
        return redirect()->back();
    }
}
