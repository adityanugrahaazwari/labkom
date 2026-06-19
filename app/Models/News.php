<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsActivity;

class News extends Model
{
    use LogsActivity;

    protected $table = 'news';

    protected $fillable = [
        'news_category_id',
        'user_id',
        'title',
        'slug',
        'content',
        'image',
        'is_published',
        'views',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
