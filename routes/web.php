<?php

use App\Livewire\Dashboard;
use App\Livewire\Users\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get("dashboard",Dashboard::class)->name("dashboard");

    Route::get("users",Index::class)->name("pengguna");

});
require __DIR__.'/settings.php';
