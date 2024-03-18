<?php

namespace App\Http\Controllers\Site;

use App\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    //
    public function getIndex()
    {
        $abouts = About::all();

        return view('site.pages.about.index' ,compact('abouts'));
    }
}
