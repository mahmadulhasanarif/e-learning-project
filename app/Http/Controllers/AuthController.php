<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        
        // $data = User::where('email', '=', $request->email)->first();
        
        // if (!$data){
        //     return back()->with('fail', 'we do not recognize your email address');
        // }else{
        //     if (Hash::check($request->password, $data->password)){
        //         // $request->session()->put('loggedUser', $data->id);
        //         return redirect('/admin');
        //     }else{
        //         return back()->with('fail', 'Incurrect password');
        //     }
        // }
        
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
