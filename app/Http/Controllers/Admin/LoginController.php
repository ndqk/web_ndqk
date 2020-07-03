<?php

namespace App\Http\Controllers\Admin;

use App\Entity\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(){
        if(Auth::check()){
            return redirect()->route('admin.home');
        }
        return view('admin.login.login');
    }

    public function login(LoginRequest $request){
        $user = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        if(Auth::attempt($user)){
            return redirect()->route('admin.home');
        }
        else{
            return redirect()->back()->with('status', 'Email hoặc mật khẩu không chính xác.');
        }
        
    }

    public function logout(){
        if(!Auth::check())
            return redirect()->route('admin.login');
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
