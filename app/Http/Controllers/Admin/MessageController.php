<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    //
    public function getIndex()
    {
        $messages = Contact::all();

        return view('admin.pages.contact.index' ,compact('messages'));
    }

    public function getDelete($id)
    {
        $message = Contact::find($id);

        $message->delete();

        return redirect()->back();
    }
}
