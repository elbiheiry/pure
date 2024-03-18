<?php

namespace App\Http\Controllers\Site\Auth;

use App\Car;
use App\Company;
use App\Mail\ActivtionMail;
use App\Mail\ResetPasswordMail;
use App\Member;
use App\Http\Controllers\Controller;
use App\Notification;
use App\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Mail;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:site', ['except' => ['logout']]);
    }

    public function postRegister(Request $request)
    {
        $v = validator($request->all(), [
            'email' => 'required|unique:members,email',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'password' => 'required|min:6',
            're_password' => 'same:password',
            'car_id' => 'not_in:0',
            'type_id' => 'not_in:0',
            'code' => 'required',
            'color' => 'required',
            'plate_number' => 'required',
            'park' => 'required'
        ], [
                'email.required' => 'برجاء ادخال البريد الالكتروني',
                'email.unique' => 'البريد الالكتروني مستخدم بالفعل',
                'email.email' => 'البريد الالكتروني غير صحيح',
                'password.required' => 'برجاء ادخال الرقم السري',
                'password.min' => 'الرقم السري يجب الا يقل عن 6 ارقام',
                're_password.same' => 'الرقم السري غير متطابق',
                'first_name.required' => 'برجاء ادخال الاسم الاول',
                'last_name.required' => 'برجاء ادخال الاسم الاخير',
                'phone.required' => 'برجاء ادخال رقم الهاتف',
                'car_id.not_in' => 'برجاء اختيار نوع السياره',
                'type_id.not_in' => 'برجاء اختيار موديل السياره',
                'color.required' => 'برجاء ادخال لون السياره',
                'plate_number.required' => 'برجاء ادخال رقم السياره',
                'code.required' => 'برجاء ادخال كود الشركه',
                'park.required' => 'برجاء ادخال رقم الموقف الخاص بك',
            ]
        );
        if ($v->fails()) {
            return ['status' => 'error', 'data' => $v->errors()->all()];
        }

        $company = Company::where('code', $request->code)->first();

        if (!$company) {
            return ['status' => 'error', 'data' => ['لا توجد شركه تستخدم هذا الكود']];
        }

        $member = new  Member();
        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->email = $request->email;
        $member->phone = $request->phone;
        $member->password = bcrypt($request->password);
        $member->type_id = $request->type_id;
        $member->car_id = $request->car_id;
        $member->color = $request->color;
        $member->year = $request->year;
        $member->plate_number = $request->plate_number;
        $member->code = $request->code;
        $member->park = $request->park;
        $member->token = str_random(60);

        if ($member->save()) {
            $notification = new Notification();

            $notification->member_id = $member->id;
            $notification->message = 'مستخدم جديد';
            $notification->type = 'member';

            $notification->save();

            Mail::to($member->email)->send(new ActivtionMail($member->token));

//            Auth::guard('site')->login($member);

            return ['status' => 'error',
                'data' => ['تم ارسال رساله التفعيل لبريدك الالكتروني']];
        }
        return ['status' => 'error', 'data' => ['خطا ! برجاء المحاوله لاحقا']];
    }

    public function getActivate(Request $request , $token)
    {
        $member = Member::where('token' , $token)->first();

        $member->active = 1;
        $member->token = null;
        
        $member->save();

        Auth::guard('site')->login($member, $request->remember);

        return redirect()->route('site.profile');
    }
    public function getLogin()
    {
        return view('site.auth.login');
    }

    public function getRegister()
    {
        $cars = Car::all();

        return view('site.auth.register', compact('cars'));
    }


    public function postLogin(Request $request)
    {
        $v = validator($request->all(), [
            'email' => 'required',
            'password' => 'required|min:6',
        ],
            [
                'email.required' => 'برجاء ادخال البريد الالكتروني',
                'password.required' => 'برجاء ادخال الرقم السري',
                'password.min' => 'الرقم السري يجب الا يقل عن 6 خانات'
            ]
        );

        if ($v->fails()) {
            return ['status' => 'error', 'data' => $v->errors()->all()];
        }

        $email = $request->email;
        $password = $request->password;

        if ($user = Member::where('email', $email)->first()) {
            if (Hash::check($password, $user->password)) {
                if ($user->active == 0){
                    $user->token = str_random(60);
                    $user->save();
                    Mail::to($user->email)->send(new ActivtionMail($user->token));

//            Auth::guard('site')->login($member);

            return ['status' => 'error',
                'data' => ['تم ارسال رساله التفعيل لبريدك الالكتروني']];
                }else{
                    Auth::guard('site')->login($user, $request->remember);
                }

                return ['status' => 'success', 'data' => ['تم تسجيل الدخول بنجاح'], 'url' => route('site.profile')];
            } else {
                return ['status' => 'error', 'data' => ['الرقم السري او البريد الالكتروني غير صحيح']];
            }
        }
        return ['status' => 'error', 'data' => ['لا يوجد مستخدم بهذا البريد الالكتروني']];
    }

    public function logout()
    {
        auth()->guard('site')->logout();
        return redirect('/login');
    }

    public function getModel(Request $request)
    {
        $models = Type::where('car_id', $request->id)->get();

        return view('site.templates.types', compact('models'))->render();
    }
//
     public function getResetPassword()
    {
        return view('site.auth.reset-password');
    }
    public function postResetPassword(Request $request)
    {
        $v =  validator($request->all(), [
            'email' => 'required',
        ],[
            'email.required' => 'من فضلك ادخل البريد الالكترونى '
        ]);
        if ($v->fails()){
            return ['status'=>'error','data'=>$v->errors()->all()];
        }

        $member = Member::where('email',$request->email)->first();

        if (!$member)
        {
            return ['status'=>'error','data'=> [' المستخدم غير موجود']];
        }

        $hash = str_random(128);

        $member->recover_hash = json_encode([
            'hash'=>$hash,
            'expiry' => Carbon::now()->addDays(1)->timestamp,
        ]);

        $member->save();

        $recover_url = route('site.change-password', [
            'id' => $member->id,
            'hash' => hash('sha512', $hash),
        ]);

//        //send recovery link
//        $subject = 'recover account ';
//        $message = 'hi mr/mrs<br/><br/>'
//            . '<strong>' . $member->username . '</strong><br/><br/>'
//            . 'Here is your recovery link : '.$recover_url.'<br/>';
//        $from = 'info@bnayat-artboard.com';
//        $headers = '';
//        $headers .= 'From:Bnayat Art Board  <' . $from . '>   ' . "\r\n";
//        $headers .= "Reply-To: " . $from . "\r\n";
//        $headers .= "MIME-Version: 1.0\r\n";
//        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
//        mail($member->email , $subject, $message, $headers);

        Mail::to($member->email)->send(new ResetPasswordMail($recover_url ,$member->username));

        return ['status'=>'success','data' => ['تم الارسال بنجاح']];
    }

    public function getChangePassword($id,$hash)
    {
        $member = Member::find($id);
        if (!$member)
        {
            return redirect()->back();
        }
        $member->recover_hash = json_decode($member->recover_hash);
        if(!$member->recover_hash){
            return redirect(route('site.profile'));
        }
        if(Carbon::now()->gt(Carbon::createFromTimestamp($member->recover_hash->expiry))) {
            return ['status' => 'error' ,'data' => ['لقد انتهت مده اللينك اطلب لينك اخر']];
        }
        if(!hash_equals($hash,hash('sha512',$member->recover_hash->hash))){
            return ['status' => 'error' ,'data' => ['رمز التفعيل خطأ . اطلب رمز غيره']];
        }

        return  view('site.auth.change-password', compact('member' , 'hash'));

    }
    public function postChangePassword(Request $request,$id,$hash)
    {
        $member = Member::find($id);
        if (!$member)
        {
            return redirect()->back();
        }
        $member->recover_hash = json_decode($member->recover_hash);
        if(!$member->recover_hash){
            return redirect(route('site.index'));
        }
        if(!hash_equals($hash,hash('sha512',$member->recover_hash->hash))){
            return ['status' => 'error' ,'data' => ['رمز التفعيل خطأ . اطلب رمز غيره']];
        }

        $v = validator($request->all() ,[
            'password'=>'required|min:6',
            'password_confirmation' => 'same:password'
        ] ,[
            'password.required' => 'برجاء ادخال الرقم السري',
            'password.min' => 'الرقم السري يجب الا يقل عن 6 ارقام',
            'password_confirmation.same' =>  'لم يتم تاكيد الرقم السري'
        ]);

        if ($v->fails())
        {
            return ['status' => 'error' ,'data' => $v->errors()->all()];
        }

        $member->password = bcrypt($request->input('password'));
        $member->recover_hash = null;

        if ($member->save()){
            auth()->guard('site')->login($member);
            return ['status'=>'success'
                , 'data'=>  ['تم تحديث كلمه المرور بنجاح']
                ,'url' => route('site.profile')];
        }
    }
}