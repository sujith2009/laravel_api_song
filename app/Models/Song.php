<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Song extends Model
{
    protected $table = "song";

    protected $fillable = [
        'category',
        'song_title',
        'song_description',
        'song_audio',
        // 'api_url'
    ];
}
