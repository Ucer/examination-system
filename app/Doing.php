<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doing extends Model
{
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['user_id', 'paper_id', 'status', 'oprated_at','surplus_time'];
}
