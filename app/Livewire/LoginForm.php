<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

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
                session()->flash('error', 'This email is associated with a Google account. Please log in using Google.');

                return redirect()->route('login');
            }

            // Check if the password matches
            if (Hash::check($validate['password'], $user->password)) {
                if (! is_null($user->email_verified_at)) {
                    // code...
                    Auth::login($user);
                    $this->redirectRoute('home', navigate: true);
                } else {
                    session()->flash('error', 'Your email address is not verified');
                    $this->redirectRoute('login', navigate: true);
                }
            } else {
                // If password does not match, show the password error
                session()->flash('error', 'Invalid credentials. Please try again.');
                $this->redirectRoute('login', navigate: true);
            }
        } else {
            // If no user is found with that email, show the generic error message
            session()->flash('error', 'No account found with this email.');

            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
