<?php

namespace App\Http\Controllers\Admin;

use App\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    //
    public function getIndex()
    {
        $notifications = Notification::orderBy('id','DESC')->get();

        return view('admin.pages.notifications.index' ,compact('notifications'));
    }

    public function getDelete($id)
    {
        $notification = Notification::find($id);

        $notification->delete();

        return redirect()->back();
    }

    public function postUpdate(Request $request ,$id)
    {
        $notification = Notification::find($id);

        $notification->seen = 1;

        if ($notification->save()){
            return ['status' => 'success'];
        }
    }
}
