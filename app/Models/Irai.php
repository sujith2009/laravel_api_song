<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Irai extends Model
{
    protected $table = 'song';
     public $timestamps = false;
    protected $fillable = ['category', 'song_title', 'song_description', 'song_audio'];
}
