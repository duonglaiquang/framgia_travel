<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestedService extends Model
{
    protected $table = 'requested_services';
    protected $fillable = [
        'user_id',
        'category_id',
        'province_id',
        'name',
        'description',
        'address',
        'open_time',
        'expected_price',
        'status',
        'phone',
        'profile_pic',
    ];

    function province()
    {
        return $this->belongsTo(Province::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function category()
    {
        return $this->belongsTo(Category::class);
    }
}
