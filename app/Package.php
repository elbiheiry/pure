<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //
    public function details()
    {
        return $this->hasMany('App\PackageTrans' ,'package_id');
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

    public function prices()
    {
        return $this->hasMany('App\PackagePrice' ,'package_id');
    }

}
