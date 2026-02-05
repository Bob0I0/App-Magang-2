<?php

namespace App\Livewire\Surat;

use App\Models\JenisSurat;
use App\Models\Surat;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use App\helpers\Flash;

class Index extends Component
{
    use WithPagination;

    #[Url]
    public $jenis_id = '';
    
    #[Url]
    public $search = '';

    public $jenisSurat;

    public function mount()
    {
        if ($this->jenis_id) {
            $this->jenisSurat = JenisSurat::find($this->jenis_id);
        }
        
        if (!$this->jenisSurat) {
            return redirect()->route('modul');
        }
    }

    #[On('surat-created')]
    #[On('surat-updated')]
    #[On('surat-deleted')]
    public function refreshIndex(string $event)
    {
        $this->resetPage();

        match ($event) {
            'surat-created' => Flash::success('Surat berhasil ditambahkan'),
            'surat-updated' => Flash::success('Surat berhasil diubah'),
            'surat-deleted' => Flash::success('Surat berhasil dihapus'),
            default => null,
        };
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $surats = Surat::where('jenis_surat_id', $this->jenis_id)
            ->where(function($q) {
                $q->where('nomor_surat', 'like', '%'.$this->search.'%')
                  ->orWhere('perihal', 'like', '%'.$this->search.'%');
            })
            ->latest('tanggal')
            ->paginate(10);

        return view('livewire.surat.index', [
            'surats' => $surats,
            'title' => 'Arsip ' . $this->jenisSurat->nama_jenis_surat
        ]);
    }
}
