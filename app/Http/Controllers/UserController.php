<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    //
    public function index(){
        $user = User::all();
        return view('user.show', compact('user'));
    }

    public function create(){
        return view('user.show');
    }

    public function store(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'password'
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::create([
            'username' => $username,
            'password' => $password
        ]);

        return direct('/user')->with('success','User Berhasil Ditambahkan');
    }

    public function show($id){
        $user = User::find($id);
        return view('user.detail',compact('user'));
    }

    public function edit($id){
        $user = User::find($id);
        return view('user.edit',compact('user'));
    }

    public function update($id){
        $request->validate([
            'username' => 'required',
            'password' => 'password'
        ]);

        $username = $request->input('username');
        $password = $request->input('password');
        $email = $request->input('email');
        $foto = $request->input('foto'); //Menggunakan input file

        $update = User::where('id',$id)->update([
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'foto' => $foto
        ]);

        return direct('/user')->with('success','User Berhasil Diubah');
    }

    public function destroy($id){
        User::destroy($id);
        return direct('/user')->with('success','User Berhasil Dihapus');
    }
}
