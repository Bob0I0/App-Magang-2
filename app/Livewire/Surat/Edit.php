<?php

namespace App\Livewire\Surat;

use App\Models\Surat;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public $surat_id;

    #[Validate('required', message: 'Wajib Di Isi')]
    #[Validate('unique:surats,nomor_surat', message: 'Nomor Surat sudah digunakan')]
    public $nomor_surat;

    #[Validate('required', message: 'Wajib Di Isi')]
    #[Validate('date', message: 'Format Tanggal Salah')]
    public $tanggal;

    #[Validate('required', message: 'Wajib Di Isi')]
    public $perihal;

    #[Validate('nullable')]
    #[Validate('file', message: 'Harus berupa file')]
    #[Validate('mimes:pdf,jpg,jpeg,png', message: 'Format file harus PDF, JPG, JPEG, atau PNG')]
    #[Validate('max:10240', message: 'Ukuran file maksimal 10MB')]
    public $file; // New file upload

    public $old_file; // Existing file path
    public $nama_asli_file;

    // Use a unique key for the modal state to avoid conflicts if needed, 
    // but looking at Users module, passing ID might be enough if handled correctly.
    // However, for clean modal handling, we often listen to events.
    
    public function mount($id)
    {
        $this->surat_id = $id;
        $surat = Surat::findOrFail($id);
        
        $this->nomor_surat = $surat->nomor_surat;
        $this->tanggal = $surat->tanggal;
        $this->perihal = $surat->perihal;
        $this->old_file = $surat->file;
        $this->nama_asli_file = $surat->nama_asli_file;
    }

    public function updatesurat()
    {
        $this->validate();

        $surat = Surat::findOrFail($this->surat_id);
        
        $data = [
            'nomor_surat' => $this->nomor_surat,
            'tanggal' => $this->tanggal,
            'perihal' => $this->perihal,
        ];

        if ($this->file) {
            // Delete old file
            if ($surat->file && Storage::disk('public')->exists($surat->file)) {
                Storage::disk('public')->delete($surat->file);
            }
            
            $path = $this->file->store('surat-files', 'public');
            $originalName = $this->file->getClientOriginalName();
            
            $data['file'] = $path;
            $data['nama_asli_file'] = $originalName;
        }

        $surat->update($data);

        $this->reset('file');
        $this->dispatch('surat-updated', 'surat-updated');
        // $this->dispatch('refresh-surat');
    }

    public function render()
    {
        return view('livewire.surat.edit');
    }
}
