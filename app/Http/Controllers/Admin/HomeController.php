<?php

namespace App\Http\Controllers\Admin;

use App\Home;
use App\Http\Requests\Admin\HomeRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //

    public function postIndex(HomeRequest $request)
    {
        $request->edit();

        return ['status' => 'success'];
    }
}
