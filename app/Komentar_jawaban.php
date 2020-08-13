<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar_jawaban extends Model
{
    //
    const CREATED_AT = 'created_at';

    public function jawaban(){
        return $this->belongsTo('App\Jawaban');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
