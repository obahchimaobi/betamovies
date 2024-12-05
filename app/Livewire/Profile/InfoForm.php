<?php

namespace App\Livewire\Profile;

use Livewire\Component;

class InfoForm extends Component
{
    public $name;
    public $password;

    public function update_information()
    {
        $validate = $this->validate([
            'name' => 'required_if:anotherfield,value'
        ]);
    }
    public function render()
    {
        return view('livewire.profile.info-form');
    }
}
