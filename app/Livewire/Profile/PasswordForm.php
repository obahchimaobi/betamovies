<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class PasswordForm extends Component
{
    public $old_password;

    public $new_password;

    public $new_password_confirmation;

    public function update_password()
    {
        // get the old password
        $user = auth()->user();
        $userPassword = $user->password;

        $validate = $this->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
            'new_password_confirmation' => 'required',
        ]);

        if (! Hash::check($validate['old_password'], $userPassword)) {
            // code...
            session()->flash('error', 'The old password you entered is incorrect. Please try again.');
            $this->redirectRoute('user.profile', navigate: true);
        } else {
            // code...
            $user->password = Hash::make($validate['new_password']);
            $user->save();

            session()->flash('success', 'Your profile information has been saved');
            $this->redirectRoute('user.profile', navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.profile.password-form');
    }
}
