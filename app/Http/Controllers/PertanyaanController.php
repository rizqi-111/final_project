<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Pertanyaan;
use App\Tag;
use App\Jawaban;
use App\Vote_pertanyaan;
use App\Komentar_pertanyaan;
use auth;

class PertanyaanController extends Controller
{
    //
    //untuk mendapatkan nama pemberi pertanyaan
    //$pertanyaan->user->username;
        
    //untuk mendapatkan jumlah upvote/like
    //

    //untuk mendaptakan jumlah downvote/dislike
    //

    //untuk mendapatkan komentar_pertanyaan
    //$komentar = $pertanyaan->komentar_pertanyaans;
    //untuk dapet username pemberi komentar
    //$nama = $komentar->user->username;

    //untuk mendapatkan pertanyaan dari user yg sedang login
    //$user = Auth::user()
    //$pertanyaan = $user->pertanyaans;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $count = Pertanyaan::count();
        $pertanyaan = Pertanyaan::all();
        $user = User::all();
        return view('pertanyaan.show', compact('pertanyaan','count','user'));
    }

    public function create(){
        $pertanyaan = Pertanyaan::all();
        return view('pertanyaan.add', compact('pertanyaan'));
    }

    public function store(Request $request){
        $request->validate([
            'judul' => 'required',
            'isi' => 'required'
        ]);

        // dd($request->input());

        // $judul = $request->input('judul');
        // $isi = $request->input('isi');
        $tags = explode(',',$request->input('tags'));

        $tag_ids = [];
        foreach($tags as $t_name){
            $tag = Tag::firstOrCreate(['nama' => $t_name]);
            $tag_ids[] = $tag->id;
        }

        $pertanyaan = new Pertanyaan;
        $pertanyaan->judul = $request['judul'];
        $pertanyaan->isi = $request['isi'];
        // $pertanyaan->profile_id    = Auth::id();
        $user = Auth::user();
        $user->pertanyaans()->save($pertanyaan);

        $pertanyaan->tags()->sync($tag_ids);

        return redirect('/pertanyaan')->with('success','Pertanyaan Berhasil Ditambahkan');
    }

    public function show($id){
        $pertanyaan = Pertanyaan::find($id);
        // dd($pertanyaan->tags());
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

    //prosedur peemberian upvote pertanyaan
    public function vote_pertanyaan($pertanyaan_id, $vote_value){
        $user = Auth::user();
        $pertanyaan = Pertanyaan::find($pertanyaan_id);

        if($vote_value == 1){ //upvote/like
            $vote = Vote_pertanyaan::create(['up_or_down' => 1]);
        } else { //downvote/dislike
            $vote = Vote_pertanyaan::create(['up_or_down' => 0]);
        }

        $user->vote_pertanyaans()->save($vote);
        $pertanyaan->vote_pertanyaans()->save($vote);

        // perubahan poin
        $user_id_pertanyaan = $pertanyaan->user_id;
        $user_pertanyaan = User::find($user_id_pertanyaan);
        $current_poin = $user_pertanyaan->vote;
        
        if($vote_value == 1){ //upvote/like
            $now =  (int)$current_poin+10;
            $user_pertanyaan->vote = $now;
        } else { //downvote/dislike
            $now =  (int)$current_poin-1;
            $user_pertanyaan->vote = $now;
        }
        $user_pertanyaan->save();

        return redirect('/pertanyaan');
    }

    //untuk memberikan jawaban_tepat
    public function pilih_jawaban($pertanyaan_id,$jawaban_id){
        $pertanyaan = Pertanyaan::find($pertanyaan_id);
        $update = $pertanyaan->update(['jawaban_tepat_id'=>$jawaban_id]);
        $pertanyaan->jawaban_tepat()->associate($update); //kalo error, tinggal dikomen aja
        $pertanyaan->save();
        // perubahan poin
        $user_id_jawaban = Jawaban::find($jawaban_id);
        $user_jawaban = User::find($user_id_jawaban);
        $current_poin = (int)$user_jawaban->poin;
        $user_jawaban->update(['poin' => $current_poin+15]);
        $user_jawaban->save();
    }

    public function komentar_pertanyaan(Request $request,$pertanyaan_id){
        $user = Auth::user();
        $pertanyaan = Pertanyaan::find($pertanyaan_id);

        $komen = Komentar_pertanyaan::create([
            'isi' => $request->input('isi_komentar_pertanyaan')
        ]);

        $pertanyaan->komentar_pertanyaans()->save($komen);
        $user->komentar_pertanyaans()->save($komen);
    }
}