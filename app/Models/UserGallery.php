<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserGallery extends Model
{
    protected $table = 'user_gallerys';
    protected $fillable = [
        'user_id',
        'filename',
        'location',
        'description',
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
