<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Danswer extends Model
{
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['doing_id', 'topic_id', 'your_answer', 'true_answer', 'get_value', 'status', 'topic_type', 'value', 'unchecked', 'created_at', 'updated_at'];
}
