<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsActivity;

class Document extends Model
{
    use LogsActivity;

    protected $table = 'documents';

    protected $fillable = [
        'title',
        'description',
        'file_path',
        'file_size',
        'download_count',
    ];
}
