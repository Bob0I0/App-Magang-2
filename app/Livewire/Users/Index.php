<?php

namespace App\Livewire\Users;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $users = \App\Models\User::latest()->paginate(5);
        return view('livewire.users.index', compact('users'));
    }
}
