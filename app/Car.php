<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    public function details()
    {
        return $this->hasMany('App\CarTrans' ,'car_id');
    }

    public function translated()
    {
        return $this->details()->where('lang' , app()->getLocale())->first();
    }

    public function arabic()
    {
        return $this->details()->where('lang' , 'ar')->first();
    }

    public function english()
    {
        return $this->details()->where('lang' , 'en')->first();
    }

    public function types()
    {
        return $this->hasMany('App\Type' ,'car_id');
    }
}
