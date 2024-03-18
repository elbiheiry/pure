<?php

namespace App\Http\Controllers\Site;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    //
    public function getIndex()
    {
        return view('site.pages.contact.index');
    }

    public function postIndex(Request $request)
    {
        $v = validator($request->all() ,[
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ] ,[
            'name.required' => app()->getLocale() == 'en' ? 'Please enter your name' : 'برجاء ادخال اسمك بالكامل',
            'phone.required' => app()->getLocale() == 'en' ? 'Please enter your phone' : 'برجاء ادخال رقم الهاتف',
            'email.required' => app()->getLocale() == 'en' ? 'Please enter your email' : 'برجاء ادخال البريد الالكتروني',
            'subject.required' => app()->getLocale() == 'en' ? 'Please enter your subject' : 'برجاء ادخال عنوان رسالتك',
            'message.required' => app()->getLocale() == 'en' ? 'Please enter your message' : 'برجاء ادخال رسالتك',
        ]);

        if ($v->fails()){
            return ['status' => 'error' ,'data' => $v->errors()->all()];
        }

        $message = new Contact();

        $message->name = $request->name;
        $message->phone = $request->phone;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;

        if ($message->save()){
            return ['status' => 'success' ,'data' => [app()->getLocale() == 'en' ? 'congratulations , your message has been sent successfully' : 'مبروك ! تم ارسال رسالتك بنجاح']];
        }else{
            return ['status' => 'error' ,'data' => [app()->getLocale() == 'en' ? 'Error please try again later' : 'لقد حدق خطا , برجاء المحاوله لاحقا']];
        }
    }
}
