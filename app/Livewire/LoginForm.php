<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class LoginForm extends Component
{
    public $email;

    public $password;

    public function login()
    {
        $validate = $this->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Check if the user exists in the database
        $user = User::where('email', $validate['email'])->first();

        if ($user) {
            // If the email is associated with a Google account (i.e., google_id is not null)
            if ($user->google_id) {
                // Set a session message informing the user to log in with Google
                Toaster::error('This email is associated with a Google account. Please log in using Google.');
            }

            // Check if the password matches
            if (Hash::check($validate['password'], $user->password)) {
                if (! is_null($user->email_verified_at)) {
                    // code...
                    Auth::login($user);
                    $this->redirectRoute('home', navigate: true);
                } else {
                    Toaster::error('Your email address is not verified');
                }
            } else {
                // If password does not match, show the password error
                Toaster::error('Invalid credentials. Please try again.');
            }
        } else {
            // If no user is found with that email, show the generic error message
            Toaster::error('No account found with this email.');
            $this->reset(['password', 'email']);
        }
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
