<?php

namespace App\Livewire\Users;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;

class Index extends Component
{
    use WithPagination;

    public string $search = '';

    #[Computed]
    public function users()
    {
        return \App\Models\User::query()
            ->when($this->search, fn ($q) =>
                $q->where('name', 'like', "%{$this->search}%")
                  ->orWhere('username', 'like', "%{$this->search}%")
            )
            ->latest()
            ->paginate(5);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    #[On('user-created')]
    public function refreshIndex()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.users.index', [
            'users' => $this->users,
        ]);
    }
}

