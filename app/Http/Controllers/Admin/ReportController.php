<?php

namespace App\Http\Controllers\Admin;

use App\Wash;
use App\Wishlist;
use App\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    //
    public function getIndex(Request $request)
    {
        if ($request->date != null){
            $washes = Wash::where('date' , $request->date)->get();
        }else{
            $washes = Wash::where('date' , Carbon::today()->format('Y-m-d'))->get();
        }

        return view('admin.pages.reports.index',compact('washes'));
    }
}