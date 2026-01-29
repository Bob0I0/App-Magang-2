<div class="h-full flex flex-col">
    <x-app-header :title="__('Kelola Pengguna')" />
    <!-- Search Bar -->
    <div class="border-l-[3px] border-nightfall-800 dark:border-slate-300 px-2.5 mt-1 mb-4 flex flex-row gap-2 items-center">
        <label for="search_modul" class="text-sm text-slate-600 dark:text-slate-300 whitespace-nowrap font-medium">Cari User</label>    
        <div class="relative flex w-full max-w-xs flex-col gap-1 text-neutral-600 dark:text-neutral-300">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2" class="absolute left-2 top-1/2 size-5 -translate-y-1/2 text-neutral-600/50 dark:text-neutral-300/50" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
            </svg>
            <input type="search" class="w-full border border-neutral-300 rounded-xl bg-white px-2 py-1.5 pl-9 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-slate-950/50 dark:focus-visible:outline-white" name="search" aria-label="Search" placeholder="Cari Berdasarkan Jenis Surat"/>
        </div>
    </div>
    <div class="flex-1 shadow-sm sm:rounded-lg border border-slate-600/20 dark:border-slate-100/20 px-6 py-4">
        <div x-data="{modalIsOpen: false}" class="pb-2">
            <button x-on:click="modalIsOpen = true" type="button" class="whitespace-nowrap rounded-sm bg-black border border-black dark:border-white px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Open Modal</button>
            <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen" x-on:keydown.esc.window="modalIsOpen = false" x-on:click.self="modalIsOpen = false" class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8" role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
                <!-- Modal Dialog -->
                <div x-show="modalIsOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" class="flex max-w-lg flex-col gap-4 overflow-hidden rounded-sm border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
                    <livewire:users.create />
                </div>
            </div>
        </div>
        <table class="table-fixed max-w-9/10 border border-slate-300 dark:border-slate-600 text-sm ">
            <thead class="bg-nightfall-800 text-white text-left">
                <tr class="text-zinc-50">
                    <th class="border border-slate-300 dark:border-slate-600 px-3 py-1 w-12">No</th>
                    <th class="border border-slate-300 dark:border-slate-600 px-3 py-1 w-80">Nama Lengkap</th>
                    <th class="border border-slate-300 dark:border-slate-600 px-3 py-1 w-80">Username</th>
                    <th class="border border-slate-300 dark:border-slate-600 px-3 py-1 w-28 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $key => $user)
                <tr class="text-zinc-900 dark:text-zinc-50 border-b border-slate-300 dark:border-slate-600">
                    <td class="border border-slate-300 dark:border-slate-600 px-3 py-1 w-12 text-center">{{ $loop->iteration }}</td>
                    <td class="border border-slate-300 dark:border-slate-600 px-3 py-1 w-80">{{ $user->name }}</td>
                    <td class="border border-slate-300 dark:border-slate-600 px-3 py-1 w-80">{{ $user->username }}</td>
                    <td class="border border-slate-300 dark:border-slate-600 px-3 py-1 w-30 text-center">
                        <span class="text-xs text-gray-500">No Actions</span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="border border-slate-300 dark:border-slate-600 px-3 py-4"></td>
                    <td class="border border-slate-300 dark:border-slate-600 px-3 py-4"></td>
                    <td class="border border-slate-300 dark:border-slate-600 px-3 py-4"></td>
                    <td class="border border-slate-300 dark:border-slate-600 px-3 py-4"></td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- Pagination -->
    <div class="mt-5">
        {{ $users->links(data: ['scrollTo' => false]) }}
    </div>
</div>
