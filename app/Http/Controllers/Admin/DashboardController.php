<?php

namespace App\Http\Controllers\Admin;

use App\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function getIndex()
    {
        $home = Home::first();
        return view('admin.pages.index' ,compact('home'));
    }
}
