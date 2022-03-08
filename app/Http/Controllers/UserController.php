<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function show(){
        $users = User::all();

        return view('user', [
            'title' => 'User',
            'users' => $users
        ]);
    }

    public function add_user_show(){
        return view('user_add', [
            'title' => 'Add User'
        ]);
    }

    public function add_user_create(Request $request){
        $this->validate($request, [
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'nama' => 'required|max:255',
            'telepon' => 'required|max:20',
            'role' => 'required',
            'password' => 'required|confirmed',
        ]);

        // cek apakah username sdh dipakai
        $get_username = User::where('username', $request->username)->get();
        if(count($get_username) > 0){
            return redirect('/user/add')->with('username_ada', 'Username sudah dipakai');
        }

        // cek apakah email sudah dipakai
        $get_email = User::where('email', $request->email)->get();
        if(count($get_email) > 0){
            return redirect('/user/add')->with('email_ada', 'Email sudah dipakai');
        }

        // simpan data
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'name' => $request->nama,
            'telepon' => $request->telepon,
            'role' => $request->role,
            'password' => Hash::make($request->password)
        ]);
        return redirect('/user')->with('add_berhasil', 'Data User berhasil ditambah');
    }

    public function edit_user_show($id){

        // ambil data user berdasarkan id
        $user = User::where(['id' => $id])->get();

        return view('user_edit', [
            'title' => 'Edit user',
            'user' => $user[0]
        ]);
    }

    public function edit_user_update(Request $request){
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'nama' => 'required|max:255',
            'telepon' => 'required|max:20',
            'role' => 'required',
            'password' => 'confirmed',
        ]);

        // cek apakah email sudah dipakai
        $get_email = User::where('email', $request->email)->get();
        if(count($get_email) > 0){
            if($get_email[0]->username != $request->username){
                return redirect('/user/edit/'.$request->id)->with('email_ada', 'Email sudah dipakai');
            }

            // jika email tidak berubah
            if($request->email != $get_email[0]->email){
                return redirect('/user/edit'.$request->id)->with('email_ada', 'Email sudah dipakai');
            }
        }

        // jika ganti password
        if($request->password){
            // simpan data
            User::where('username', $request->username)
                ->update([
                    'email' => $request->email,
                    'name' => $request->nama,
                    'telepon' => $request->telepon,
                    'role' => $request->role,
                    'password' => Hash::make($request->password)
            ]);
        }
        else{
            // simpan data
            User::where('username', $request->username)
                ->update([
                    'email' => $request->email,
                    'name' => $request->nama,
                    'telepon' => $request->telepon,
                    'role' => $request->role
            ]);
        }
        
        return redirect('/user')->with('add_berhasil', 'Data User berhasil diupdate');
    }
}
