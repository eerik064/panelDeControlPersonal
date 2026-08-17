<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
       
        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $loginInput = $request->input('email');
        $password = $request->input('password');

        $credentialsAsEmail = [
            'email' => $loginInput,
            'password' => $password
        ];


        if (Auth::attempt($credentialsAsEmail)) {
            
            $request->session()->regenerate();
            
            $user = Auth::user(); 
            
            $redirectRoute = match($user->rol) {
                'admin' => '/inicio',
                'user' => '/inicio',
            };

            return redirect()->intended($redirectRoute);
        }
        return back()->withErrors([
            'login' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('login');
    }

/*
    public function registro(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
           
            if (Auth::user()->role === 'admin')
            {
                return redirect()->intended('/admin/dashboard');
            }
            else if (Auth::user()->role === 'user')
            {
                return redirect()->intended('/user/dashboard');
            }
            else
            {
                return redirect()->intended('/guest/dashboard');
            }
        }

        return back()->withErrors(['email' => 'Credenciales inválidas'])->withInput();
    } */


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
