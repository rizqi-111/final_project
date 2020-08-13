<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public $fillable = ['username','password'];

    public $timestamps = false;
    
    protected $hidden = [
        'password'
    ];

    protected $attributes = [
        'foto' => null,
        'vote' => 0
    ];
}
