<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function login()
    {
      return view('login');
    }
    public function register()
    {
      return view('register');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            $redirectPath = (Auth::user()->as == "admin") ? '/admin' : '/main';
            return redirect($redirectPath);
        }
    
        return redirect('/login')->withErrors(['error' => 'Username atau Password salah.'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/'); 
      
    }
}
