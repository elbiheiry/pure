<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\WhyRequest;
use App\Why;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WhyController extends Controller
{
    //

    public function getIndex()
    {
        $whies = Why::orderBy('id' , 'DESC')->get();

        return view('admin.pages.why.index' ,compact('whies'));
    }

    public function getInfo($id)
    {
        $why = Why::find($id);

        return view('admin.pages.why.templates.edit' ,compact('why'));
    }


    public function postIndex(WhyRequest $request , $id)
    {
        $request->edit($id);

        $whies = Why::orderBy('id' , 'DESC')->get();
        return['status' => 'success' ,'html' => view('admin.pages.why.templates.table' ,compact('whies'))->render()];
    }
}
