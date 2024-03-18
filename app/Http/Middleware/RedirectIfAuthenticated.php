<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;

class RedirectIfAuthenticated {

//    protected function redirectPath(){
//        if (Request::route()->getName() == 'site.confirm'){
//            return redirect()->route('site.register');
//        }else{
//            return redirect()
//        }
//    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null) {
        if (session()->has('lang')) {
            App::setLocale(session('lang'));
        }else{
            App::setLocale('ar');
        }
        if (Auth::guard('site')->check()) {
            return redirect('/profile');
        }

        return $next($request);
    }

}
