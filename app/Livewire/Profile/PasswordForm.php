<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class PasswordForm extends Component
{
    public $old_passsword;
    public $new_password;

    public function update_password()
    {
        // get the old password
        $user = auth()->user();
        $userPassword = $user->password;

        $validate = $this->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        if (!Hash::check($validate['new_password'], $userPassword)) {
            # code...
            session()->flash('');
        }
    }
    public function render()
    {
        return view('livewire.profile.password-form');
    }
}
