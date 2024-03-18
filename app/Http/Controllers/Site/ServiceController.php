<?php

namespace App\Http\Controllers\Site;

use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    //
    public function getIndex()
    {
        $services = Service::all();

        return view('site.pages.services.index' ,compact('services'));
    }
}
