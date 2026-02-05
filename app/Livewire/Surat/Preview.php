<?php

namespace App\Livewire\Surat;

use App\Models\Surat;
use Livewire\Component;

class Preview extends Component
{
    public $surat_id;
    public $file_path;
    public $mime_type;
    public $nama_asli_file;

    public function mount($id)
    {
        $this->surat_id = $id;
        $surat = Surat::findOrFail($id);
        
        $this->file_path = $surat->file ? asset('storage/' . $surat->file) : null;
        $this->nama_asli_file = $surat->nama_asli_file;
        
        if ($surat->file && file_exists(storage_path('app/public/' . $surat->file))) {
            $this->mime_type = mime_content_type(storage_path('app/public/' . $surat->file));
        } else {
            // Fallback extension check if needed
            $ext = pathinfo($surat->file, PATHINFO_EXTENSION);
            if(in_array(strtolower($ext), ['jpg', 'jpeg', 'png'])) {
                $this->mime_type = 'image/' . $ext;
            } elseif(strtolower($ext) == 'pdf') {
                $this->mime_type = 'application/pdf';
            }
        }
    }

    public function render()
    {
        return view('livewire.surat.preview');
    }
}
