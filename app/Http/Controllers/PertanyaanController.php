<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Pertanyaan;

class PertanyaanController extends Controller
{
    //
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
