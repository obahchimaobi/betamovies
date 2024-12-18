<?php

namespace App\Http\Controllers\Google;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    //
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('google')->user();

        // check if the user already exists in the database
        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser && $existingUser->is_admin == true) {

            session()->flash('error', 'Email already exists');

            return redirect()->route('login');

        } elseif ($existingUser) {
            Auth::login($existingUser);

            if (! $existingUser->email_verified_at) {
                $existingUser->email_verified_at = now();
                $existingUser->save();
            }

            return redirect()->route('home');
        } else {
            $newUser = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'email_verified_at' => now(),
                'google_id' => $user->getId(),
                'password' => bcrypt(Str::random(16)),
                'avatar' => $user->getAvatar(),
            ]);

            Auth::login($newUser);

            return redirect()->route('home');
        }
    }
}
