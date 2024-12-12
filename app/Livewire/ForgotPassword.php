<?php

namespace App\Livewire;

use Str;
use Mail;
use App\Models\User;
use App\Mail\ResetMail;
use Livewire\Component;

class ForgotPassword extends Component
{
    public $email;

    public function reset_password()
    {
        $validatedData = $this->validate([
            'email' => 'required|email',
        ]);

        // check email if it exists or belong to an admin
        $check_email = User::where('email', $validatedData['email'])->first();

        if ($check_email && $check_email->is_admin == true) {
            session()->flash('error', 'Email does not exist.');
            $this->redirectRoute('forgot.password', navigate: true);
        } elseif (!$check_email) {
            session()->flash('error', 'Email does not exist. Consider registering');
            $this->redirectRoute('forgot.password', navigate: true);
        } elseif ($check_email && !is_null($check_email->google_id)) {
            session()->flash('error', 'This is a google account. Login using google');
            $this->redirectRoute('forgot.password', navigate: true);
        } else {

            $name = $check_email->name;
            $new_password = Str::random('10');
            $email = $validatedData['email'];

            Mail::to($validatedData['email'])->send(new ResetMail($email, $new_password, $name));

            $check_email->password = $new_password;
            $check_email->save();

            session()->flash('success', 'We have sent a new password to ' . $validatedData['email']);

            $this->redirectRoute('login', navigate: true);
        }
    }
    public function render()
    {
        return view('livewire.forgot-password');
    }
}
