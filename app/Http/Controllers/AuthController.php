<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_form()
    
    {
        return view('Auth.login');
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'email'=> 'required|email',
            'password'=>'required'
        ]);
        $data = $request->only('email', 'password');
        
        if (Auth::attempt($data)) {
            return redirect()->intended('admin');
        }
    }
    
    public function logout()
    {
        Auth::logout();
        
        return redirect()->to('/login');
    }
}
