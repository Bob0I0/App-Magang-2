<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class Edit extends Component
{
    public $userId, $user, $name, $username, $password, $password_confirmation;

    public function mount($userId) 
    {
        $this->userId = $userId;
        $this->user = User::findOrFail($this->userId);

        $this->name = $this->user->name;
        $this->username = $this->user->username;
    }

    
    public function updateacc()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'username')->ignore($this->userId),
            ],
            'password' => ['nullable', 'string', 'confirmed', Password::defaults()],
        ]);

        $this->user->name = $this->name;
        $this->user->username = $this->username;
        
        if (!empty($this->password)) {
            $this->user->password = Hash::make($this->password);
        }
        
        $this->user->save();
        $this->dispatch('user-updated', 'user-updated');
    }

    public function resetForm()
    {
        // Reset to original values from database
        $this->name = $this->user->name;
        $this->username = $this->user->username;
        $this->password = null;
        $this->password_confirmation = null;

        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.users.edit');
    }
}
