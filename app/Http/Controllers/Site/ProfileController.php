<?php

namespace App\Http\Controllers\Site;

use App\Company;
use App\Mail\SubscribeMail;
use App\Member;
use App\Message;
use App\Note;
use App\Notification;
use App\Package;
use App\Type;
use App\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Carbon\Carbon;

class ProfileController extends Controller
{
    //
    public function getIndex()
    {
        $member = Member::find(auth()->guard('site')->user()->id);
        $company = Company::where('code' , $member->code)->first();
//        dd($company);

//        dd($member);
        return view('site.pages.profile.index' ,compact('member' ,'company'));
    }

    public function getPackage()
    {
        $member = Wishlist::where('member_id' , auth()->guard('site')->user()->id)->orderBy('id' , 'DESC')->first();
        if ($member){
            if($member->payment == null){
                $member->delete();
            }   
        }
        
        $size = Type::find(auth()->guard('site')->user()->type_id)->value('size');
        $member = Member::find(auth()->guard('site')->user()->id);
        $company = Company::where('code' , $member->code)->first();
        $packages = Package::where('company_id' , $company->id)->get();

        return view('site.pages.packages.index' ,compact('packages' ,'size','company'));
    }

    public function postWishlist(Request $request)
    {
        $member = Wishlist::where('member_id' , auth()->guard('site')->user()->id)->orderBy('id' , 'DESC')->first();

        if ($member){
            if (Carbon::parse(now())->between(Carbon::parse($member->created_at) , Carbon::parse($member->created_at)->addMonths(\App\PackagePrice::find($request->price_id)->value('duration'))) && sizeof($member->wahsesDone()) == 0){
                return ['status' => 'error' ,'data' => ['انت مشترك في باقه بالفعل']];
            }
        }

        $wishlist = new Wishlist();

        $wishlist->member_id = auth()->guard('site')->user()->id;
        $wishlist->package_id = $request->package_id;
        $wishlist->price_id = $request->price_id;

        $wishlist->save();

        $notification = new Notification();

//        $notification->wash_id = $request->wash_id;
        $notification->member_id = auth()->guard('site')->user()->id;
        $notification->message = 'تم الاشتراك في باقه جديده';
        $notification->type = 'package';

        $notification->save();

        return ['status'=>'success' ,'data' => ['برجاء اختيار طريقه الدفع'] , 'url' => route('site.checkout' ,['id' => $wishlist->id])];
    }

    public function getOrder()
    {
        $wishlists = Wishlist::where('member_id' , auth()->guard('site')->user()->id)->with('price')->get();
        $size = Type::find(auth()->guard('site')->user()->type_id)->value('size');
        $member = Member::find(auth()->guard('site')->user()->id);
        $company = Company::where('code' , $member->code)->first();

        return view('site.pages.orders.index' ,compact('wishlists' ,'size','company'));
    }

    public function getSubscribtion()
    {
        $wishlist = Wishlist::where('member_id' , auth()->guard('site')->user()->id)->with('price')->orderBy('id' ,'DESC')->first();
        $member = Member::find(auth()->guard('site')->user()->id);
        $company = Company::where('code' , $member->code)->first();

        return view('site.pages.subscribtions.index',compact('wishlist','company'));
    }

    public function postEditWishlist(Request $request , $id)
    {
        $wishlist = Wishlist::find($id);

        $wishlist->payment = $request->payment;

        $wishlist->save();

        Mail::to(auth()->guard('site')->user()->email)->send(new SubscribeMail());

        return ['status' => 'success' ,'data' => ['تم الاشتراك في الباقه بنجاح'],'url' => route('site.orders')];
    }

    public function postNote(Request $request)
    {
        $note = new Note();

        $note->wash_id = $request->wash_id;
        $note->date = $request->date;
        $note->comments = $request->comments;
        $note->status = $request->slaughtered_live;

        $note->save();

        $notification = new Notification();

        $notification->wash_id = $request->wash_id;
        $notification->member_id = auth()->guard('site')->user()->id;
        $notification->message = 'تم ارسال تعديل جديد علي الموعد';
        $notification->type = 'note';

        $notification->save();

        return ['status' => 'success' ,'data' => ['شكرا لك سيتم التواصل معك لاحقا']];
    }

    public function postContact(Request $request)
    {
        $message = new Message();

        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->wash_id = $request->wash_id;

        $message->save();

        $notification = new Notification();

        $notification->wash_id = $request->wash_id;
        $notification->member_id = auth()->guard('site')->user()->id;
        $notification->message = 'تم ارسال رساله جديده';
        $notification->type = 'contact';

        $notification->save();

        return ['status' => 'success' ,'data' => ['شكرا لك سيتم التواصل معك لاحقا']];
    }

    public function getCheckout($id)
    {
        $wishlist = Wishlist::with('price')->find($id);
        $size = Type::find(auth()->guard('site')->user()->type_id)->value('size');
        $member = Member::find(auth()->guard('site')->user()->id);
        $company = Company::where('code' , $member->code)->first();

        return view('site.pages.checkout.index' ,compact('wishlist' ,'size' ,'id','company'));
    }

    public function postEditProfile(Request $request)
    {
        $v = validator($request->all() , [
            'phone' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'plate_number' => 'required',
            'park' => 'required'
        ] ,[
            'first_name.required' => 'برجاء ادخال الاسم الاول',
            'last_name.required' => 'برجاء ادخال الاسم الاخير',
            'phone.required' => 'برجاء ادخال رقم الهاتف',
            'plate_number.required' => 'برجاء ادخال رقم السياره',
            'park.required' => 'برجاء ادخال رقم الموقف الخاص بك'
        ]);

        if ($v->fails())
        {
            return ['status'=>'error','data' => $v->errors()->all()];
        }

        $member = Member::find(auth()->guard('site')->user()->id);
        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->phone = $request->phone;
        if ($request->password){
            $member->password = bcrypt($request->password);
        }
        $member->plate_number = $request->plate_number;
        $member->park = $request->park;

        if ($member->save()) {
            return ['status' => 'success', 'data' => ['تم تعديل البيانات بنجاح']];
        }
        return ['status' => 'error', 'data' => ['خطا ! برجاء المحاوله لاحقا']];
    }
}