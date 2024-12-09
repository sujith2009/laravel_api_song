<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
      */
    // public function toArray(Request $request): array
    // {
    //     return parent::toArray($request);
    // }
     use HasApiTokens, Notifiable;

    // protected $fillable = [
    //     'email',
    //     'phonenumber',
    //     'password',
    // ];

    // protected $hidden = [
    //     'password',
    // ];

    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
