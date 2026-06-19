<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agendas';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'location',
        'event_date',
        'start_time',
        'end_time',
        'image',
        'status',
    ];

    protected $casts = [
        'event_date' => 'date',
        'status' => 'boolean',
    ];
}
