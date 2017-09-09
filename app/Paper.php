<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $fillable = ['user_id', 'name', 'description', 'percentag', 'percentag1', 'percentag2', 'limit_time', 'generate_type', 'status', 'created_at','updated_at'];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
