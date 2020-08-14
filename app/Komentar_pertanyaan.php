<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar_pertanyaan extends Model
{
    //
    protected $table = 'komentar_pertanyaans';
    
    const CREATED_AT = 'created_at';

    public function pertanyaan(){
        return $this->belongsTo('App\Pertanyaan','pertanyaan_id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
