<?php

namespace App\Http\Livewire\Users;


use Livewire\Component;
use App\Models\User;

class UsersShow extends Component
{
    public $user;
    public function mount($id)
    {
        $this->user = User::find($id);
    }
    public function render()
    {
        return view('livewire.users.users-show',['user' => $this->user]);
    }
}
