<?php

namespace App\Livewire;

use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
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
            'password' => 'required|min:4',
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

        session()->flash('success', 'Registration successful! A confirmation email has been sent to '.$validatedData['email'].'. Click the verification link sent to your email to complete the verification process');

        Mail::to($validatedData['email'])->send(new RegisterMail($user, $otp, $email, $hash, $verificationUrl));

        // return redirect()->route('login');
        $this->redirectRoute('login', navigate: true);
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
