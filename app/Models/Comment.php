<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'user_id',
        'service_id',
        'content',
        'rate_point',
    ];
}
