<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsActivity;

class Laboratory extends Model
{
    use LogsActivity;

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
