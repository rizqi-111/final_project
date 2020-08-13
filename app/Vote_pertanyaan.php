<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote_pertanyaan extends Model
{
    //

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function pertanyaan(){
        return $this->belongsTo('App\Pertanyaan');
    }
}
