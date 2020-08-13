<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    //

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function komentar_pertanyaans(){
        return $this->hasMany('App\Komentar_pertanyaan');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function vote_pertanyaans(){
        return $this->hasMany('App\Vote_pertanyaan');
    }
}
