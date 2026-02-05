<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\JenisSurat;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public $years = [];
    public $selectedYear;

    public function mount()
    {
        $this->years = \App\Models\Surat::selectRaw('YEAR(tanggal) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->toArray();

        $this->selectedYear = $this->years[0] ?? date('Y');
    }

    public function updatedSelectedYear()
    {
        $this->resetPage();
    }

    public function render()
    {
        $jenisSurats = JenisSurat::withCount(['surats' => function ($query) {
            $query->whereYear('tanggal', $this->selectedYear);
        }])->paginate(8);

        return view('livewire.dashboard', compact('jenisSurats'));
    }
}