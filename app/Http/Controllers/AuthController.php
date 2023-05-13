<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth-layout');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password'=> 'required'
        ]);

        if(Auth::attempt($credentials)) {

            $user = Auth::user();
            // dd($user);
            
            if ($user->role_id == 1) {
                // dd('berhasil');
                return redirect()->route('admin.index')->withSuccess('Login Berhasil');
            } elseif ($user->role_id == 2) {
                // dd('koor');
                return redirect()->route('koor.index')->withSuccess('Login Berhasil');
            } elseif ($user->role_id == 3) {
                return redirect()->route('child.index')->withSuccess('Login Berhasil');
            }

        }
        // $request->session()->regenerate();
        // return redirect()->route('admin.index')->withSuccess('Login Berhasil');

        return back()->withErrors([
            'email' => 'Email atau Password salah'
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->withSuccess('Logout Berhasil');
    }
}
