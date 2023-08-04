<?php

namespace App\Http\Livewire;
use App\Models\User;

use Livewire\Component;

class Users extends Component
{
    public function render()
    {
        $users = user::all();
        return view('livewire.users.users', ['users'=> $users]);
    }
}
