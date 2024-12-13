<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\MyList;
use Illuminate\Support\Facades\Auth;

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
        $watchlists = MyList::where('userId', Auth::id())
            ->whereNull('deleted_at')->get();

        return view('auth.watchlist', compact('watchlists'));
    }
}
