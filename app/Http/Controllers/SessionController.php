<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
     function index()
    {
        return view('auth.login');
    }

     function login(Request $request) {
        $this->validate($request, [
            'email'=>'required',
            'password'=>'required'
        ],
        [
            'email.required'=>'Email Wajib Diisi',
            'password.required'=>'Password Wajib Diisi'
        ]
        );

        $login=Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ]);

        if($login){
            if(Auth::user()->role == 'admin'){
                return redirect()->route('dashboard');
            }elseif (Auth::user()->role == 'guru') {
                return redirect('/presteacher');
            }
        }else{
            return redirect()->back()->with('error', 'Email Atau Password Anda Salah');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
