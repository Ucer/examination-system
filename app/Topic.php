<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['name','type','user_id','value','level','answer','description','created_at','updated_at'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
