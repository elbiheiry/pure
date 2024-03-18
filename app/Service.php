<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    public function details()
    {
        return $this->hasMany('App\ServiceTrans' ,'service_id');
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
}
