<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SongResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'category' => $this->category,
            'song_title' => $this->song_title,
            'song_description' => json_decode($this->song_description, true),
            // 'song_description' =>$this->song_description,

            'song_audio' => $this->song_audio,
            // 'api_url' => $this->api_url,
        ];
    }
}