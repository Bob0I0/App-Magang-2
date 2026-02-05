<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\JenisSurat;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination; 

    public function render()
    {
        $jenisSurats = JenisSurat::paginate(8);

        return view('livewire.dashboard', compact('jenisSurats'));
}
}