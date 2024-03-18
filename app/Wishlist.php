<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    //
    public function package()
    {
        return $this->belongsTo('App\Package' , 'package_id');
    }

    public function washes()
    {
        return $this->hasMany('App\Wash' , 'wishlist_id');
    }
    
    public function wahsesDone(){
        return $this->washes()->where('status','!=','تم الانتهاء')->get();
    }

    public function member()
    {
        return $this->belongsTo('App\Member','member_id');
    }

    public function price()
    {
        return $this->belongsTo('App\PackagePrice' , 'price_id');
    }
}
