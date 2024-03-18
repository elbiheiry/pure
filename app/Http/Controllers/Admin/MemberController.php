<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Mail\AcceptMail;
use App\Mail\RejectMail;
use App\Mail\MoneyMail;
use App\Member;
use App\Type;
use App\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class MemberController extends Controller
{
    //
    public function getIndex($id)
    {
        $company = Company::find($id);
        $members = Member::where('code' , $company->code)->orderBy('id' ,'DESC')->get();

        return view('admin.pages.members.index' ,compact('members'));
    }

    public function getDelete($id)
    {
        $member = Member::find($id);

        $member->memberNotifications()->delete();
        foreach ($member->wishlists as $wishlist) {
            $wishlist->washes()->delete();
            $wishlist->delete();
        }

        $member->delete();

        $member->delete();

        return redirect()->back();
    }

    public function getOrder($id)
    {
        $wishlists = Wishlist::where('member_id' , $id)->where('payment' , '!=' ,null)->orderBy('id' ,'DESC')->get();
        $size = Type::find(Member::find($id)->value('type_id'))->value('size');

        return view('admin.pages.members.orders' ,compact('wishlists' ,'size'));
    }

    public function postUpdate(Request $request ,$id)
    {
        $wishlist = Wishlist::find($id);

        $wishlist->status = $request->status;

        if ($wishlist->save()){

            if ($wishlist->status == 'تم الموافقه'){
                Mail::to(Member::where('id' , $wishlist->member_id)->first()->value('email'))->send(new AcceptMail());
            }elseif ($wishlist->status == 'تم الرفض'){
                Mail::to(Member::where('id' , $wishlist->member_id)->first()->value('email'))->send(new RejectMail());
            }elseif ($wishlist->status == 'بانتظار التحويل'){
                Mail::to(Member::where('id' , $wishlist->member_id)->first()->value('email'))->send(new MoneyMail());
            }
            
            return ['status' => 'success'];
        }
    }

    public function getDeleteOrder($id)
    {
        $wishlist = Wishlist::find($id);

        $wishlist->washes()->delete();

        $wishlist->delete();

        return redirect()->back();
    }

}
