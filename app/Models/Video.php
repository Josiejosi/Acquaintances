<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'name', 'description', 'category_id', 'video_url', 'user_id', 'is_file_video', 'video_length',
    ];
}
