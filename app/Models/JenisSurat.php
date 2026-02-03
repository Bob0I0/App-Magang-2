<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    protected $fillable = ['nama_jenis_surat'];

    public function surats()
    {
        return $this->hasMany(Surat::class);
    }
}
