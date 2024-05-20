<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function dashboard()
    {
        if(auth()->check())
        {
            return view('dashboard');
        }
            return redirect()->route('login.index'); 
        
        
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ],[
            'email.required' => 'This e-mail field is mandatory',
            'email.email' => 'This field must contain a valid email address',
            'password.required' => 'The password field is mandatory',
            'password.min' => 'This field must be at least 6 characters long'

        ]);

        $credentials = $request->only('email', 'password');
        $authenticated = Auth::attempt($credentials);

        if (!$authenticated){
            return redirect()->route('login.index')->withErrors(['error' => 'email or password invalid' ]);
        }

        return redirect()->route('login.dashboard')->with('success', 'logged in');
    }

    public function destroy()
    {
       Auth::logout();  

       return redirect()->route('login.index');
    }
}
