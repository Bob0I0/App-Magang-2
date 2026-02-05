<?php

namespace App\Livewire\Surat;

use Livewire\Component;
use App\Models\JenisSurat;
use Livewire\WithPagination;

class Modul extends Component
{
    use WithPagination;    
    
    public function render()
    {
        $jenisSurats = JenisSurat::paginate(8);
        
        return view('livewire.surat.modul', compact('jenisSurats'));
    }
}
