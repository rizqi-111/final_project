<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Pertanyaan;

class PertanyaanController extends Controller
{
    //
    //untuk mendapatkan nama pemberi pertanyaan
    //$pertanyaan->user->username;
        
    //untuk mendapatkan jumlah upvote/like
    //$upvote = $pertanyaan->vote_pertanyaans()->where('up_or_down',1)->count();

    //prosedur peemberian upvote pertanyaan
    //public function upvote_pertanyaan($pertanyaan_id){
        //$user = Auth::user()
        //$pertanyaan = Pertanyaan::find($pertanyaan_id)
        //$upvote = Vote_pertanyaan::create(['up_or_down',1])
        //$user->vote_pertanyaans->save($upvote)
        //$pertanyaan->vote_pertanyaans->save($upvote)

        //perubahan poin
        //$user_id_pertanyaan = $pertanyaan->user_id
        //$user_pertanyaan = User::find($user_id_pertanyaan)
        //$current_poin = (int)$user_pertanyaan->poin
        //$user_pertanyaan->update(['poin',$current_poin+10])
        //$user_pertanyaan->save()
    //}

    //untuk mendaptakan jumlah downvote/dislike
    //$upvote = $pertanyaan->vote_pertanyaans()->where('up_or_down',0)->count();

    //prosedur pemberian downvote
    //public function upvote_pertanyaan($pertanyaan_id){
        //$user = Auth::user()
        //$pertanyaan = Pertanyaan::find($pertanyaan_id)
        //$upvote = Vote_pertanyaan::create(['up_or_down',0])
        //$user->vote_pertanyaans->save($upvote)
        //$pertanyaan->vote_pertanyaans->save($upvote)

        //perubahan poin
        //$user_id_pertanyaan = $pertanyaan->user_id
        //$user_pertanyaan = User::find($user_id_pertanyaan)
        //$current_poin = (int)$user_pertanyaan->poin
        //$user_pertanyaan->update(['poin',$current_poin-1])
        //$user_pertanyaan->save()
    //}

    //untuk mendapatkan tag
    //

    //prosedur pemberian tag

    //untuk mendapatkan komentar_pertanyaan
    //$komentar = $pertanyaan->komentar_pertanyaans;
    //untuk dapet username pemberi komentar
    //$nama = $komentar->user->username;

    //untuk memberikan jawaban_tepat
    //$pertanyaan = Pertanyaan::find($pertanyaan_id)
    //$update = $pertanyaan->update(['jawaban_tepat_id',$jawaban_id])
    //$pertanyaan->jawaban_tepat()->associate($update)
    //$pertanyaan->save()
    //perubahan poin
        //$user_id_jawaban = Jawaban::find($jawaban_id)
        //$user_jawaban = User::find($user_id_jawaban)
        //$current_poin = (int)$user_jawaban->poin
        //$user_jawaban->update(['poin',$current_poin+15])
        //$user_jawaban->save()

    //untuk mendapatkan pertanyaan dari user yg sedang login
    //$user = Auth::user()
    //$pertanyaan = $user->pertanyaans;

    public function index(){
        $pertanyaan = Pertanyaan::all();
        return view('pertanyaan.show', compact('pertanyaan'));
    }

    public function create(){
        return view('pertanyaan.show');
    }

    public function store(Request $request){
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tag' => 'required'
        ]);

        $judul = $request->input('judul');
        $isi = $request->input('isi');
        $tag = $request->input('tag');

        $pertanyaan = Pertanyaan::create([
            'judul' => $judul,
            'isi' => $isi,
            'tag_id' => $tag
        ]);

        $user = Auth::user();
        $user->pertanyaans->save($pertanyaan);

        return direct('/pertanyaan')->with('success','Pertanyaan Berhasil Ditambahkan');
    }

    public function show($id){
        $pertanyaan = Pertanyaan::find($id);
        return view('pertanyaan.detail',compact('pertanyaan'));
    }

    public function edit($id){
        $pertanyaan = Pertanyaan::find($id);
        return view('pertanyaan.edit',compact('pertanyaan'));
    }

    public function update($id){
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tag' => 'required'
        ]);

        $judul = $request->input('judul');
        $isi = $request->input('isi');
        $tag = $request->input('tag');

        $update = Pertanyaan::where('id',$id)->update([
            'judul' => $judul,
            'isi' => $isi,
            'tag_id' => $tag
        ]);

        return direct('/pertanyaan')->with('success','Pertanyaan Berhasil Diubah');
    }

    public function destroy($id){
        Pertanyaan::destroy($id);
        return direct('/pertanyaan')->with('success','Pertanyaan Berhasil Dihapus');
    }
}
