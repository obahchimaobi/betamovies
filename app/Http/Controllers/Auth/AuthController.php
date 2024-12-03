<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function register_page()
    {
        return view('auth.register');
    }
    
    public function login_page()
    {
        return view('auth.login');
    }

    public function forgot_password_page()
    {
        return view('auth.forgot-password');
    }
}
