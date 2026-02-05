<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JenisSurat;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    protected $data = [
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

        
    public function run(): void
    {
        Storage::disk('public')->deleteDirectory('surat-files');
        Storage::disk('public')->makeDirectory('surat-files');
      
        User::factory(7)->create();

        User::factory()->create([
            'name' => 'Testing User',
            'username' => 'Tes',
            'is_admin' => true,
        ]);
        User::factory()->create([
            'name' => 'Admin',
            'username' => 'Admin',
            'is_admin' => true,
        ]);

        JenisSurat::insert($this->data);
    }
}
