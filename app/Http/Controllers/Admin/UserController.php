<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\Admin\UserRequest;

class UserController extends Controller
{
    //
    public function getIndex()
    {
        $users = User::orderBy('id' , 'DESC')->get();

        return view('admin.pages.users.index' ,compact('users'));
    }

    public function getInfo($id)
    {
        $user = User::find($id);

        return view('admin.pages.users.templates.edit' ,compact('user'));
    }

    public function postIndex(UserRequest $request)
    {
        $request->store();

        $users = User::orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.users.templates.table' ,compact('users'))->render()];
    }

    public function postEdit(UserRequest $request , $id)
    {
        $request->edit($id);

        $users = User::orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.users.templates.table' ,compact('users'))->render()];
    }

    public function postDelete(Request $request)
    {
        if ($request->user_id == null){
            return ['status' => 'error' ,'data' => ['يجب ان تقوم باختيار سياره واحده علي الاقل']];
        }else{
            foreach ($request->user_id  as $id) {
                $user = User::find($id);

                $user->delete();

            }
            $users = User::orderBy('id' , 'DESC')->get();

            return ['status' => 'success' ,'html' => view('admin.pages.users.templates.table' ,compact('users'))->render()];
        }

    }
}
