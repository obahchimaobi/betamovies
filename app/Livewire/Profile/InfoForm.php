<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class InfoForm extends Component
{
    public $name;

    public $email;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function update()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Validate the input
        $validated = $this->validate([
            'name' => 'required|string|max:255', // Add proper validation rules
            'email' => 'required|email|unique:users,email', // Ensure email uniqueness, excluding the current user
        ]);

        // Update the user's information
        $user->email = $validated['email'];
        $user->name = $validated['name'];
        $user->save();

        Toaster::success('Your profile information has been updated successfully.');
    }

    public function render()
    {
        return view('livewire.profile.info-form');
    }
}
