<?php

namespace App\Http\Controllers\Site;

use App\About;
use App\Home;
use App\Service;
use App\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function getIndex()
    {
        $home = Home::first();
        $services = Service::take(3)->get();
        $abouts = About::all();

        return view('site.pages.index' ,compact('services' ,'home' ,'abouts'));
    }

    public function postSubscribe(Request $request)
    {
        $v = validator($request->all() ,[
            'email' => 'required|email|unique:subscribers'
        ] ,[
            'email.required' => app()->getLocale() == 'ar' ? 'برجاء ادخال بريدك الالكتروني' : 'Please enter your email',
            'email.email' => app()->getLocale() == 'ar' ? 'البريد الالكتروني غير صحيح' : 'email is incorrect',
            'email.unique' => app()->getLocale() == 'ar' ? 'هذا البريد الالكتروني مستخدم بالفعل' : 'Email is already in use'
        ]);

        if ($v->fails()){
            return ['status' => 'error' ,'data' => $v->errors()->all()];
        }

        $subscriber = new Subscriber();

        $subscriber->email = $request->email;

        if ($subscriber->save()){
            return ['status' => 'success' ,'data' => [app()->getLocale() == 'ar' ? 'شكرا لك علي اشتراكك معنا في نشرتنا الاخباريه' : 'Thanks for registering in our newsletter' ]];
        }

        return ['status' => 'error' ,'data' => [app()->getLocale() == 'ar' ? 'خطا برجاء المحاوله لاحقا مره اخري' : 'Error pelase try again later']];
    }
}
