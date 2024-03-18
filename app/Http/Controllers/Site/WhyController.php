<?php

namespace App\Http\Controllers\Site;

use App\Why;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WhyController extends Controller
{
    //
    public function getIndex()
    {
        $whies = Why::all();

        return view('site.pages.why.index' ,compact('whies'));
    }
}
