<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JenisSurat;

class JenisSuratSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_jenis_surat' => 'Surat Keputusan'],
            ['nama_jenis_surat' => 'Surat Perintah'],
            ['nama_jenis_surat' => 'Surat Edaran'],
            ['nama_jenis_surat' => 'Surat Pengumuman'],
            ['nama_jenis_surat' => 'Surat P3S'],
            ['nama_jenis_surat' => 'Surat Penugasan'],
            ['nama_jenis_surat' => 'Surat Keterangan'],
            ['nama_jenis_surat' => 'Surat Perjanjian'],
            ['nama_jenis_surat' => 'Surat Berita Acara'],
            ['nama_jenis_surat' => 'Surat Notulen Rapat'],
            ['nama_jenis_surat' => 'Surat Perintah'],
            ['nama_jenis_surat' => 'Surat Lainnya'],

        ];

        JenisSurat::insert($data);
    }
}

