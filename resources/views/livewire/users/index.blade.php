<div class="flex-1 flex flex-col">
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
    <div class="flex-1 flex flex-col shadow-sm sm:rounded-lg border border-slate-600/20 dark:border-slate-100/20 px-6 py-4">        {{-- <livewire:users.create/> --}}
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
