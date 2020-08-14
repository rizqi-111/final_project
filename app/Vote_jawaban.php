<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote_jawaban extends Model
{
    //
    protected $table = 'vote_jawabans';

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function jawaban(){
        return $this->belongsTo('App\Jawaban','jawaban_id');
    }
}
