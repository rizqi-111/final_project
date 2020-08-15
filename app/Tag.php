<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $table = 'tags';
    protected $guarded = [];
    public $timestamps = false;
    public function pertanyaans(){
        return $this->belongsToMany('App\Pertanyaan','pertanyaan_tag','pertanyaan_id','tag_id');
    }
}
