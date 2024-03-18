<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(Request $request)
    {
        if (!empty($request->cookie('lang'))) {
//            dd(unserialize($request->cookie('lang')));
            $session_lang = decrypt($request->cookie('lang'));
        }
        if (!empty($session_lang) && in_array($session_lang, ['ar', 'en'])) {
            App::setLocale($session_lang);
        } else {
            App::setLocale('ar');
        }
    }
}
