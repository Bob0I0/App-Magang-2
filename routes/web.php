<?php

use App\Livewire\Dashboard;
use App\Livewire\Surat\Modul;
use App\Livewire\Users\Index as UsersIndex;
use App\Livewire\Surat\Index as SuratIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/surat', SuratIndex::class)->name('surat.index');

    Route::get("dashboard",Dashboard::class)->name("dashboard");

    Route::get("modul",Modul::class)->name("modul");

    Route::get("users",UsersIndex::class)->name("pengguna");

});
require __DIR__.'/settings.php';
