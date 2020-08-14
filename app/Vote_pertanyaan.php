<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote_pertanyaan extends Model
{
    //
    protected $table = 'vote_pertanyaans';

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function pertanyaan(){
        return $this->belongsTo('App\Pertanyaan','pertanyaan_id');
    }
}
