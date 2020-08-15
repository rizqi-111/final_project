<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jawaban;
use App\Pertanyaan;
use App\User;
use App\Komentar_jawaban;
use App\Vote_jawaban;

class JawabanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //kirim jawaban
    public function store(Request $request,$pertanyaan_id){

        $jawaban = Pertanyaan::create([
            'isi' => $request->input('isi_jawaban')
        ]);

        $user = Auth::user();
        $user->jawabans->save($jawaban);

        $pertanyaan = Pertanyaan::find($pertanyaan_id);
        $pertanyaan->jawabans->save($jawaban);
        
        return direct('/pertanyaan')->with('success','Pertanyaan Berhasil Ditambahkan');
    }

    //prosedur peemberian upvote jawaban
    public function vote_jawaban($jawaban_id, $vote_value){
        $user = Auth::user();
        $jawaban = Pertanyaan::find($jawaban_id);

        //vote_value == 1 -> like ; vote_value == 0 ->dislike
        $vote = Vote_jawaban::create(['up_or_down',$vote_value]);
        
        $user->vote_jawabans->save($vote);
        $pertanyaan->vote_jawabans->save($vote);

        // perubahan poin
        $user_id_jawaban = $jawaban->user_id;
        $user_jawaban = User::find($user_id_jawaban);
        $current_poin = (int)$user_jawaban->poin;

        if($vote_value == 1){ //upvote/like
            $user_jawaban->update(['poin',$current_poin+10]);
        } else { //downvote/dislike
            $user_jawaban->update(['poin',$current_poin-1]);
        }

        $user_jawaban->save();
    }

    public function komentar_jawaban(Request $request,$jawaban_id){
        $user = Auth::user();
        $jawaban = Jawaban::find($jawaban_id);

        $komen = Komentar_jawaban::create([
            'isi' => $request->input('isi_komentar_jawaban')
        ]);

        $jawaban->komentar_jawabans->save($komen);
        $user->komentar_jawabans->save($komen);
    }
}
