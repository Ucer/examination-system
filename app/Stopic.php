<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stopic extends Model
{
    protected $fillable = ['topic_id', 'name', 'description'];
    protected $dates = [
        'deleted_at'
    ];
}
