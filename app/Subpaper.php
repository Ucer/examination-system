<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subpaper extends Model
{
    protected $fillable = ['topic_id', 'paper_id', 'value', 'unchecked', 'created_at','updated_at'];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
