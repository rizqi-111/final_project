<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar_pertanyaan extends Model
{
    //
    const CREATED_AT = 'created_at';

    public function pertanyaan(){
        return $this->belongsTo('App\Pertanyaan');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
