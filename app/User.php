<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public $timestamps = false;
    
    protected $hidden = [
        'password'
    ];

    protected $attributes = [
        'foto' => null,
        'vote' => 0
    ];

    public function pertanyaans(){
        return $this->hasMany('App\Pertanyaan');
    }

    public function jawabans(){
        return $this->hasMany('App\Jawaban');
    }

    public function komentar_jawabans(){
        return $this->hasMany('App\Komentar_jawaban');
    }

    public function komentar_pertanyaans(){
        return $this->hasMany('App\Komentar_pertanyaan');
    }

    public function vote_jawabans(){
        return $this->hasMany('App\Vote_jawaban');
    }

    public function vote_pertanyaans(){
        return $this->hasMany('App\Vote_pertanyaan');
    }
}
