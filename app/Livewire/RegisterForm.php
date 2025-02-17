<?php

namespace App\Livewire;

use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class RegisterForm extends Component
{
    public $name;

    public $email;

    public $password;

    public $checkbox;

    public function submit()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', Password::min(6)->numbers()->letters()->mixedCase()->symbols()->uncompromised(3)],
            'checkbox' => 'accepted',
        ]);

        $otp = rand(100000, 999999);
        $user = new User([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'otp' => $otp,
        ]);

        $user->save();

        $hash = sha1($user->otp);
        $email = $user->email;

        $verificationUrl = URL::temporarySignedRoute(
            'verify.otp',
            now()->addMinutes(10),
            ['email' => $user->email, 'hash' => $hash]
        );

        Mail::to($validatedData['email'])->send(new RegisterMail($user, $otp, $email, $hash, $verificationUrl));

        return Redirect::route('login')->success('A confirmation email has been sent to '.$validatedData['email'].'. Click the verification link sent to your email to complete the verification process');
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
