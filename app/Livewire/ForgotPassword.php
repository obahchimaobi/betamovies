<?php

namespace App\Livewire;

use App\Mail\ResetMail;
use Livewire\Component;
use Mail;
use Str;

class ForgotPassword extends Component
{
    public $email;
    
    public function reset_password()
    {
        $validatedData = $this->validate([
            'email' => 'required|email',
        ]);

        $new_password = Str::random('10');
        $email = $validatedData['email'];

        session()->flash('success', 'We have sent a new password to ' . $validatedData['email']);

        Mail::to($validatedData['email'])->send(new ResetMail($email, $new_password));
        
        $this->redirectRoute('login', navigate: true);
    }
    public function render()
    {
        return view('livewire.forgot-password');
    }
}
