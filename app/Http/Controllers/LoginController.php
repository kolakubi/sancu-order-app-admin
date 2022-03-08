<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    
    public static function index(){
        // jika sdh login
        if(session('login')){
            return redirect('/');
        }

        return view('login');
    }

    public static function login(Request $request){
        $this_ = new self;
        // validasi
        $this_->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!auth()->attempt($request->only('email', 'password'))){
            return back()->with('message', 'email atau password salah');
        }
        else{
            //cek jika role = admin
            $cek_admin = User::where([
                'email'=>$request->email, 
                'role' => 'admin'
                ])->get();

            if(count($cek_admin) > 0){
                session(['login' => true]);
                return redirect('/');
            }
            else{
                return back()->with('message', 'email atau password salah');
            }
        }
        
        return redirect('/')->with('message', 'email atau password salah');
    }

    public static function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }
}
