<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;

class Delete extends Component
{
    public $userId;
    public $name;

    public function mount($userId, $name)
    {
        $this->userId = $userId;
        $this->name = $name;
    }

    public function delete()
    {
        $user = User::findOrFail($this->userId); 
        $user->delete(); 
        $this->dispatch('user-deleted', 'user-deleted');
    }
    public function render()
    {
        return view('livewire.users.delete');
    }
}
