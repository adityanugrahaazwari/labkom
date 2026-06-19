<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    protected $table = 'laboratories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'head_of_lab',
        'location',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
