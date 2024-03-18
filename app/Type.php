<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function details()
    {
        return $this->hasMany('App\TypeTrans' ,'type_id');
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

    public function car()
    {
        return $this->belongsTo('App\Car' , 'car_id');
    }

    public function sizes()
    {
        return $this->hasMany('App\Size' ,'type_id');
    }
}
