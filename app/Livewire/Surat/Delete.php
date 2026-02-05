<?php

namespace App\Livewire\Surat;

use App\Models\Surat;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Delete extends Component
{
    public $surat_id;
    public $nomor_surat;

    public function mount($id, $nomor_surat)
    {
        $this->surat_id = $id;
        $this->nomor_surat = $nomor_surat;
    }

    public function delete()
    {
        $surat = Surat::findOrFail($this->surat_id);

        if ($surat->file && Storage::disk('public')->exists($surat->file)) {
            Storage::disk('public')->delete($surat->file);
        }

        $surat->delete();

        $this->dispatch('surat-deleted', 'surat-deleted');
    }

    public function render()
    {
        return view('livewire.surat.delete');
    }
}
