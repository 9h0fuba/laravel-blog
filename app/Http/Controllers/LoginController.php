<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
   
        return view('login.index');
    }
    public function authenticate(Request $request, User $user)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required','min:4']
        ]);

        if (Auth::attempt($credentials)) {
           
            $request->session()->regenerate();
            
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login failed!');
        
        
    }


    
}
