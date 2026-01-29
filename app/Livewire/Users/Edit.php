<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Validate;
class Edit extends Component
{
    #[Validate('required', message: 'Wajib Di Isi')]
    public $name;
    
    #[Validate('required', message: 'Wajib Di Isi')]
    #[Validate('unique:users,username', message: 'Username Sudah Dipakai')]
    public $username;

    public $password;
    public $password_confirmation;

    public function rules(): array
    {
        return [
            'password' => ['required', 'confirmed', Password::defaults()],
        ];
    }

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
        // $this->validate([
        //     'name' => 'required|string|max:255',
        //     'username' => 'required|string|max:255|unique:users,username',
        //     'roles' => 'required',
        //     'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        // ]);
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'username' => $this->username,
            'password' => Hash::make($this->password)
        ]);
        
        // $this->dispatch('userUpdated')->to(\App\Livewire\Kelolauser\Show::class);
    }


    public function resetForm()
    {
        $this->reset();

        $this->resetValidation();
    }
    
    
    public function render()
    {
        
        return view('livewire.users.edit');
    }
}

