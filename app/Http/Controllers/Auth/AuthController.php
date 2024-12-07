<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

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

    public function verify_email_page()
    {
        return view('auth.verify-email');
    }

    public function profile_page()
    {
        return view('auth.profile');
    }

    public function watchlist_page()
    {
        return view('auth.watchlist');
    }
}
