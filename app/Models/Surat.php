<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $fillable = [
        "nomor_surat",
        "tanggal",
        "perihal",
        "file",
        "nama_asli_file"];

    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class);
    }
}
