<?php

namespace App\Livewire\Surat;

use App\Models\Surat;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class Create extends Component
{
    use WithFileUploads;

    #[Validate('required', message: 'Wajib Di Isi')]
    #[Validate('unique:surats,nomor_surat', message: 'Nomor Surat sudah digunakan')]
    public $nomor_surat;

    #[Validate('required', message: 'Wajib Di Isi')]
    #[Validate('date', message: 'Format Tanggal Salah')]
    public $tanggal;

    #[Validate('required', message: 'Wajib Di Isi')]
    public $perihal;

    // #[Validate('required', message: 'Wajib Di Isi')]
    #[Validate('nullable')]
    #[Validate('file', message: 'Harus berupa file')]
    #[Validate('mimes:pdf,jpg,jpeg,png', message: 'Format file harus PDF, JPG, JPEG, atau PNG')]
    #[Validate('max:10240', message: 'Ukuran file maksimal 10MB')]
    public $file;

    public $jenis_id;

    public function mount($jenis_id = null)
    {
        $this->jenis_id = $jenis_id;
    }

    public function savesurat()
    {
        $this->validate();
        if ($this->file) {
            $path = $this->file->store('surat-files', 'public');
            $originalName = $this->file->getClientOriginalName();
        }
        else {
            $path = null;
            $originalName = null;
        }

        Surat::create([
            'jenis_surat_id' => $this->jenis_id,
            'nomor_surat' => $this->nomor_surat,
            'tanggal' => $this->tanggal,
            'perihal' => $this->perihal,
            'file' => $path,
            'nama_asli_file' => $originalName,
        ]);

        $this->reset(['nomor_surat', 'tanggal', 'perihal', 'file']);
        $this->resetValidation();
        
        $this->dispatch('surat-created','surat-created');
    }

    public function resetForm()
    {
        $this->reset(['nomor_surat', 'tanggal', 'perihal', 'file']);
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.surat.create');
    }
}
