<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Requests\Admin\AboutRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    //
    public function getIndex()
    {
        $abouts = About::orderBy('id' , 'DESC')->get();

        return view('admin.pages.about.index' ,compact('abouts'));
    }

    public function getInfo($id)
    {
        $about = About::find($id);

        return view('admin.pages.about.templates.edit' ,compact('about'));
    }


    public function postIndex(AboutRequest $request , $id)
    {
        $request->edit($id);

        $abouts = About::orderBy('id' , 'DESC')->get();
        return['status' => 'success' ,'html' => view('admin.pages.about.templates.table' ,compact('abouts'))->render()];
    }
}
