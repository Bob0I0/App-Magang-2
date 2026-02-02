<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Validate;

class Create extends Component
{
    #[Validate('required', message: 'Wajib Di Isi')]
    public $name;
    
    #[Validate('required', message: 'Wajib Di Isi')]
    #[Validate('unique:users,username', message: 'Username Sudah Dipakai')]
    public $username;

    #[Validate('required', message: 'Wajib di Isi')]
    #[Validate('min:8', message: 'Wajib di Isi')]
    public $password;

    public $password_confirmation;

    public function messages(): array
    {
        return [
            'password.required'   => 'Password wajib diisi',
            'password.confirmed'  => 'Konfirmasi password tidak cocok',
            'password.min:8'      => 'Password minimal harus 8 karakter',
            'password.letters'    => 'Password harus mengandung huruf',
            'password.mixed'      => 'Password harus mengandung huruf besar dan kecil',
            'password.numbers'    => 'Password harus mengandung angka',
            'password.symbols'    => 'Password harus mengandung simbol',
        ];
    }

    public function createuser()
    {
        $this->validate(['password' => ['confirmed', Password::defaults()],
        ]);

        User::create([
            'name' => $this->name,
            'username' => $this->username,
            'password' => Hash::make($this->password)
        ]);

        $this->reset();
        $this->resetValidation();
        $this->dispatch('user-created', 'user-created');
    }


    public function resetForm()
    {
        $this->reset();

        $this->resetValidation();
    }
    
    public function render()
    {
        return view('livewire.users.create');
    }
}
