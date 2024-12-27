<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class VerifyForm extends Component
{
    public $otp1;

    public $otp2;

    public $otp3;

    public $otp4;

    public $otp5;

    public $otp6;

    public function verify()
    {
        $validate = $this->validate([
            'otp1' => 'required|numeric',
            'otp2' => 'required|numeric',
            'otp3' => 'required|numeric',
            'otp4' => 'required|numeric',
            'otp5' => 'required|numeric',
            'otp6' => 'required|numeric',
        ]);

        $otp = $validate['otp1'].$validate['otp2'].$validate['otp3'].$validate['otp4'].$validate['otp5'].$validate['otp6'];

        // get the otp and id
        $getUser = User::where('otp', $otp)->first();

        if (! $getUser) {
            // code...
            session()->flash('error', 'Incorrect OTP Code');

            return redirect()->route('email.verify');
        }

        $id = $getUser->id;

        $getUser->email_verified_at = now();
        $getUser->otp = rand(100000, 999999);
        $getUser->save();

        $this->reset();

        session()->flash('success', 'Your email has been successfully verified!');

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.verify-form');
    }
}
