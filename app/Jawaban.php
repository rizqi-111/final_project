<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    //
    protected $table = 'jawaban';

    public function komentar_jawabans(){
        return $this->hasMany('App\Komentar_jawaban');
    }

    public function pertanyaan(){
        return $this->belongsTo('App\Pertanyaan','pertanyaan_id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function vote_jawabans(){
        return $this->hasMany('App\Vote_jawaban');
    }
}
