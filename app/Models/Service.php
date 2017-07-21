<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $fillable = [
        'category_id',
        'province_id',
        'name',
        'description',
        'address',
        'opentime',
        'expected_price',
    ];
}
