<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar_jawaban extends Model
{
    //
    protected $table = 'komentar_jawabans';
    const CREATED_AT = 'created_at';

    public function jawaban(){
        return $this->belongsTo('App\Jawaban','jawaban_id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
