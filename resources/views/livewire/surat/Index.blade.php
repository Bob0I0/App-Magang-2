<div class="h-full flex flex-col">
    <!-- HEADER -->
    <x-app-header :title="$title">
        <x-slot:left>
            <flux:button
                href="{{ route('modul') }}"
                wire:navigate
                variant="ghost"
                class="text-sm text-slate-600 dark:text-slate-300"
            >
                <flux:icon.arrow-left variant="mini" class="mr-2"/> Kembali ke Modul
            </flux:button>
        </x-slot:left>
    </x-app-header>

    <!-- Search Bar -->
    <div class="border-l-[3px] border-nightfall-800 dark:border-slate-300 px-2.5 mt-1 mb-4 flex flex-row gap-2 items-center">
        
        <label for="search_surat" class="text-sm text-slate-600 dark:text-slate-300 whitespace-nowrap font-medium">Cari Surat</label>    
        <div class="relative flex w-full max-w-xs flex-col gap-1 text-neutral-600 dark:text-neutral-300">
            <flux:icon.magnifying-glass class="absolute left-2 top-1/2 size-5 -translate-y-1/2 text-neutral-600/50 dark:text-neutral-300/50" aria-hidden="true"/>
            <input
                id="search_surat"
                type="search"
                wire:model.live.debounce.300ms="search"
                class="w-full border border-neutral-300 rounded-xl bg-white px-2 py-1.5 pl-9 text-sm
                    focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black
                    dark:border-neutral-700 dark:bg-slate-950/50 dark:focus-visible:outline-white"
                placeholder="Cari Nomor atau Perihal"
            />
        </div>
    </div>

    <!-- Container Table -->
    <div class="flex-1 flex flex-col shadow-sm sm:rounded-lg border border-slate-600/20 dark:border-slate-100/20 px-6 py-4">
        
        <!-- Action Buttons -->
        <div class="pb-2">
             <button
                @click="$dispatch('open-modal-create')"
                type="button"
                class="whitespace-nowrap rounded-lg bg-blue-700/90 px-8 py-2 text-center text-sm font-normal tracking-wide text-slate-100 transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-blue-900/80 dark:text-slate-100 dark:focus-visible:outline-white"
            >
                Tambah Data
            </button>
            <livewire:surat.create :jenis_id="$jenis_id" />
        </div>
        
        <!-- Table -->
        <table class="table-fixed w-full border border-slate-300 dark:border-slate-800 text-sm">
            <thead class="bg-nightfall-800 dark:bg-blue-950/80 text-white text-left">
                <tr class="text-zinc-50 text-center">
                    <th class="border border-slate-300 dark:border-slate-600 px-3 py-1 w-12">No</th>
                    <th class="border border-slate-300 dark:border-slate-600 px-3 py-1">Nomor Surat</th>
                    <th class="border border-slate-300 dark:border-slate-600 px-3 py-1 w-48">Tanggal Dokumen</th>
                    <th class="border border-slate-300 dark:border-slate-600 px-3 py-1">Perihal</th>
                    <th class="border border-slate-300 dark:border-slate-600 px-3 py-1 w-38">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($surats as $item)
                <tr class="text-zinc-900 dark:text-zinc-50 border-b border-slate-300 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-800/50">
                    <td class="border border-slate-300 dark:border-slate-600 px-3 py-1 text-center">{{ $loop->iteration }}</td>
                    <td class="border border-slate-300 dark:border-slate-600 px-3 py-1 truncate" title="{{ $item->nomor_surat }}">{{ $item->nomor_surat }}</td>
                    <td class="border border-slate-300 dark:border-slate-600 px-3 py-1">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                    <td class="border border-slate-300 dark:border-slate-600 px-3 py-1 truncate" title="{{ $item->perihal }}">{{ $item->perihal }}</td>
                    <td class="border border-slate-300 dark:border-slate-600 px-3 py-1 text-center">
                        <div class="flex items-center justify-center gap-4">
                            <!-- Edit -->
                            <livewire:surat.edit :id="$item->id" :key="'edit-'.$item->id" />
                            
                            <!-- Delete -->
                            <livewire:surat.delete :id="$item->id" :nomor_surat="$item->nomor_surat" :key="'delete-'.$item->id" />
                            
                            <!-- Preview -->
                            <livewire:surat.preview :id="$item->id" :key="'preview-'.$item->id" />
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="border border-slate-300 dark:border-slate-600 px-3 py-8 text-center text-slate-500">
                        Data tidak ditemukan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-auto pt-4">
            {{ $surats->links(data: ['scrollTo' => false]) }}
        </div>
    </div>
    @include('components.flash-message')
</div>