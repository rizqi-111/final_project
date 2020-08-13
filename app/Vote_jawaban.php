<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote_jawaban extends Model
{
    //

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function jawaban(){
        return $this->belongsTo('App\Jawaban');
    }
}
