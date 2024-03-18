<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageTrans extends Model
{
    //
    protected $fillable = [
        'name' , 'description' , 'lang'
    ];
}
