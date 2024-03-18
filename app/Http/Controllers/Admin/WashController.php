<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\WashRequest;
use App\Message;
use App\Note;
use App\Wash;
use App\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WashController extends Controller
{
    //

    public function getIndex($id)
    {
        $wishlist = Wishlist::find($id);

        return view('admin.pages.washes.index' ,compact('wishlist'));
    }

    public function getInfo($id)
    {
        $wash = Wash::find($id);

        $wishlist = Wishlist::find($wash->wishlist_id);

        return view('admin.pages.washes.templates.edit' ,compact('wash','wishlist'));
    }

    public function postIndex(WashRequest $request , $id)
    {
        $request->store($id);

        $wishlist = Wishlist::find($id);

        return['status' => 'success' ,'html' => view('admin.pages.washes.templates.table' ,compact('wishlist'))->render()];
    }

    public function postEdit(WashRequest $request , $id)
    {
        $request->edit($id);

        $wash = Wash::find($id);
        $wishlist = Wishlist::find($wash->wishlist_id);

        return['status' => 'success' ,'html' => view('admin.pages.washes.templates.table' ,compact('wishlist'))->render()];
    }

    public function postDelete(Request $request , $id)
    {
        if ($request->wash_id == null){
            return ['status' => 'error' ,'data' => ['يجب ان تقوم باختيار عنصر واحد علي الاقل']];
        }else{
            foreach ($request->wash_id  as $wash_id) {
                $wash = Wash::find($wash_id);

                foreach ($wash->sizes as $size) {
                    $size->details()->delete();
                    $size->delete();
                }
                $wash->delete();

            }
            $wishlist = Wishlist::find($id);

            return ['status' => 'success' ,'html' => view('admin.pages.washes.templates.table' ,compact('wishlist'))->render()];
        }
    }



    /**
     * notes and messages
     */

    public function getNote($id)
    {
        $notes = Note::where('wash_id' , $id)->get();

        return view('admin.pages.washes.notes' ,compact('notes'));
    }

    public function getMessage($id)
    {
        $messages = Message::where('wash_id' , $id)->get();

        return view('admin.pages.washes.messages' ,compact('messages'));
    }
}
