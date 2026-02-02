<div x-data="{modalIsOpen: false}">
    <button x-on:click="modalIsOpen = true" type="button" class="hover:bg-blue-200"><flux:icon.trash /></button>
    <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen" x-on:keydown.esc.window="modalIsOpen = false" x-on:click.self="modalIsOpen = false" class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8" role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
        <!-- Modal Dialog -->
        <div x-show="modalIsOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" class="flex w-full max-w-md flex-col gap-4 overflow-hidden rounded-sm border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
            <div class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-neutral-900 dark:text-white">Hapus Pengguna</h3>
                <button x-on:click="modalIsOpen = false" aria-label="close modal">
                    <flux:icon.x-mark class="hover:bg-slate-200/90"/>
                </button>   
            </div>
            <!-- Dialog Body -->
            <div class="px-4 pb-4">
                <flux:text variant="strong" class="text-base">
                    Apakah Anda yakin ingin
                    <span class="font-extrabold text-red-600">
                        menghapus data akun ini?
                    </span>
                </flux:text>

                <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">
                    Akun dengan nama
                    <span class="font-semibold">{{ $name }}</span>
                    akan dihapus secara permanen.
                </p>

                <p class="text-sm text-neutral-600 dark:text-neutral-400">
                    Tindakan ini tidak dapat dibatalkan.
                </p>
            </div>
            <!-- Dialog Footer -->
            <div class="flex flex-col-reverse justify-between gap-2 border-t border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20 sm:flex-row sm:items-center md:justify-end">
                <button x-on:click="modalIsOpen = false" type="button" class="whitespace-nowrap rounded-sm px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:text-neutral-300 dark:focus-visible:outline-white">Batal</button>
                <button wire:click="delete" type="button" class="whitespace-nowrap rounded-sm bg-red-600 border border-red-600 px-4 py-2 text-center text-sm font-medium tracking-wide text-white transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 active:opacity-100 active:outline-offset-0">Hapus</button>
            </div>
        </div>
    </div>
</div>