<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    //
    use Notifiable;

    /**
     * The attributes that must be filled up
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function company()
    {
        $company = Company::where('code' , $this->code)->first();

        return $company;
    }

    public function car()
    {
        return $this->belongsTo('App\Car' , 'car_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Type' , 'type_id');
    }

    public function wishlists()
    {
        return $this->hasMany('App\Wishlist' , 'member_id');
    }

    public function memberNotifications()
    {
        return $this->hasMany('App\Notification' , 'member_id');
    }
}
