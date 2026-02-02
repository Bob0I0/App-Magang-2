<?php

namespace App\Livewire\Users;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use App\Helpers\Flash;

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
    #[On('user-updated')]
    #[On('user-deleted')]
    public function refreshIndex(string $event)
    {
        $this->resetPage();

        match ($event) {
            'user-created' => Flash::success('User berhasil ditambahkan'),
            'user-updated' => Flash::success('User berhasil diubah'),
            'user-deleted' => Flash::success('User berhasil dihapus'),
            default => null,
        };
    }
    
    public function render()
    {
        return view('livewire.users.index', [
            'users' => $this->users,
        ]);
    }
}

