<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    //
    protected $table = 'pertanyaans';

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function komentar_pertanyaans(){
        return $this->hasMany('App\Komentar_pertanyaan');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag','pertanyaan_tag','pertanyaan_id','tag_id');
    }

    public function vote_pertanyaans(){
        return $this->hasMany('App\Vote_pertanyaan','pertanyaan_id');
    }

    public function jawabans(){
        return $this->hasMany('App\Jawaban');
    }

    public function jawaban_tepat(){
        return $this->hasOne('App\Jawaban','jawaban_tepat_id');
    }
}
