<div x-data="{ selected: null }" class="h-full flex flex-col">

    <!-- HEADER -->
    <x-app-header :title="__('Portal Arsip Surat')">
        <x-slot:actions>
            <div
                x-show="selected"
                x-transition
                class="flex items-center gap-3"
            >
                <span class="text-sm text-slate-600">
                    Pilihan: <strong x-text="selected"></strong>
                </span>

                <button
                    type="button"
                    class="px-4 py-2 bg-blue-600 text-white rounded"
                >
                    Konfirmasi
                </button>
            </div>
        </x-slot:actions>
    </x-app-header>    
    
    <!-- Container Kartu - transparan, tanpa background -->
    <div class="flex-1 shadow-sm sm:rounded-lg border border-slate-600/20 dark:border-slate-100/20 px-4 lg:px-16 py-8">

            <!-- PILIHAN -->
            <div class="flex gap-4">
                <button
                    type="button"
                    @click="selected = selected === 'user' ? null : 'user'"
                    :class="selected === 'user' && 'ring-2 ring-blue-500'"
                    class="px-4 py-3 border rounded"
                >
                    User
                </button>

                <button
                    type="button"
                    @click="selected = selected === 'admin' ? null : 'admin'"
                    :class="selected === 'admin' && 'ring-2 ring-blue-500'"
                    class="px-4 py-3 border rounded"
                >
                    Admin
                </button>
            </div>
            
            <!-- Kartu Surat Perintah -->
            <div class="rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-nightfall-900 flex flex-col items-center justify-center py-6 px-3 shadow-sm hover:shadow-md hover:shadow-blue-500/30 transition-shadow">    
                <h1 class="text-xs lg:text-sm font-semibold text-center text-zinc-600 dark:text-zinc-300">Surat Perintah</h1>
                <p class="text-2xl lg:text-3xl font-semibold text-center text-blue-600 dark:text-blue-400 mt-2">3</p>
            </div>
            
            <!-- Kartu Surat Edaran -->
            <div class="rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-nightfall-900 flex flex-col items-center justify-center py-6 px-3 shadow-sm hover:shadow-md hover:shadow-blue-500/30 transition-shadow">    
                <h1 class="text-xs lg:text-sm font-semibold text-center text-zinc-600 dark:text-zinc-300">Surat Edaran</h1>
                <p class="text-2xl lg:text-3xl font-semibold text-center text-blue-600 dark:text-blue-400 mt-2">3</p>
            </div>
            
            <!-- Kartu Surat Pengumuman -->
            <div class="rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-nightfall-900 flex flex-col items-center justify-center py-6 px-3 shadow-sm hover:shadow-md hover:shadow-blue-500/30 transition-shadow">    
                <h1 class="text-xs lg:text-sm font-semibold text-center text-zinc-600 dark:text-zinc-300">Surat Pengumuman</h1>
                <p class="text-2xl lg:text-3xl font-semibold text-center text-blue-600 dark:text-blue-400 mt-2">3</p>
            </div>

            <!-- Kartu Surat P3S -->
            <div class="rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-nightfall-900 flex flex-col items-center justify-center py-6 px-3 shadow-sm hover:shadow-md hover:shadow-blue-500/30 transition-shadow">    
                <h1 class="text-xs lg:text-sm font-semibold text-center text-zinc-600 dark:text-zinc-300">Surat P3S</h1>
                <p class="text-2xl lg:text-3xl font-semibold text-center text-blue-600 dark:text-blue-400 mt-2">3</p>
            </div>

            <!-- Kartu Surat Penugasan -->
            <div class="rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-nightfall-900 flex flex-col items-center justify-center py-6 px-3 shadow-sm hover:shadow-md hover:shadow-blue-500/30 transition-shadow">    
                <h1 class="text-xs lg:text-sm font-semibold text-center text-zinc-600 dark:text-zinc-300">Surat Penugasan</h1>
                <p class="text-2xl lg:text-3xl font-semibold text-center text-blue-600 dark:text-blue-400 mt-2">3</p>
            </div>

            <!-- Kartu Surat Keterangan -->
            <div class="rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-nightfall-900 flex flex-col items-center justify-center py-6 px-3 shadow-sm hover:shadow-md hover:shadow-blue-500/30 transition-shadow">    
                <h1 class="text-xs lg:text-sm font-semibold text-center text-zinc-600 dark:text-zinc-300">Surat Keterangan</h1>
                <p class="text-2xl lg:text-3xl font-semibold text-center text-blue-600 dark:text-blue-400 mt-2">3</p>
            </div>

            <!-- Kartu Surat Perjanjian -->
            <div class="rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-nightfall-900 flex flex-col items-center justify-center py-6 px-3 shadow-sm hover:shadow-md hover:shadow-blue-500/30 transition-shadow">    
                <h1 class="text-xs lg:text-sm font-semibold text-center text-zinc-600 dark:text-zinc-300">Surat Perjanjian</h1>
                <p class="text-2xl lg:text-3xl font-semibold text-center text-blue-600 dark:text-blue-400 mt-2">3</p>
            </div>
        </div>
        
        <!-- Pagination Dots -->
        <div class="mt-8 flex justify-center gap-2">
            <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
            <span class="w-2.5 h-2.5 rounded-full bg-slate-300 dark:bg-slate-600"></span>
        </div> 
    </div>
</div>
