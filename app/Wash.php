<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wash extends Model
{
    //
    public function wishlist()
    {
        return $this->belongsTo('App\Wishlist' ,'wishlist_id');
    }
}
