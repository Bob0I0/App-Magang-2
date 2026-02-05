<div x-data="{ selectedId: null, selectedName: null }" class="h-full flex flex-col">

    <!-- HEADER -->
    <x-app-header :title="__('Portal Arsip Surat')">
        <x-slot:actions>
            <div
                x-show="selectedId"
                x-transition
                class="flex items-center gap-3"
                style="display: none;"
            >
                <span class="text-sm text-slate-600 dark:text-slate-300">
                    Pilihan: <strong x-text="selectedName"></strong>
                </span>

                <flux:button
                    type="button" variant="ghost"
                    class="px-4 py-2 text-lime-500! rounded cursor-pointer"
                    x-on:click="window.location.href = '{{ route('surat.index') }}?jenis_id=' + selectedId"
                    >
                    Konfirmasi <flux:icon.arrow-right variant="mini" class="text-slate-900 dark:text-slate-200"/>
                </flux:button>
            </div>
        </x-slot:actions>
    </x-app-header>    

    <!-- Container Kartu - transparan, tanpa background -->
    <div class="flex-1 flex flex-col shadow-sm sm:rounded-lg border border-slate-600/20 dark:border-slate-100/20 px-4 lg:px-16 py-8">

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 pt-6">

            <!-- CARD BUTTON -->
            @foreach($jenisSurats as $item)    
            <button
                type="button"
                @click="selectedId = selectedId === '{{ $item->id }}' ? null : '{{ $item->id }}'; selectedName = selectedId ? '{{ $item->nama_jenis_surat }}' : null"
                class="text-left focus:outline-none">
                <div
                    :class="selectedId === '{{ $item->id }}' && 'ring-2 ring-blue-500'"
                    class="w-full min-h-30
                        rounded-lg border border-slate-300 dark:border-slate-600
                        bg-white dark:bg-nightfall-900
                        flex flex-col items-center justify-center
                        py-4 px-3
                        shadow-sm hover:shadow-md hover:shadow-blue-500/30
                        transition-shadow"
                >
                    <h1 class="text-sm lg:text-xl font-semibold text-center text-zinc-600 dark:text-zinc-300">
                        {{ $item->nama_jenis_surat }}
                    </h1>
                </div>
            </button>
            @endforeach

        </div>
        
        <!-- Pagination Dots -->
        <div class="mt-auto">
            {{ $jenisSurats->links('dot-pagination') }}
        </div> 
    </div>
</div>
