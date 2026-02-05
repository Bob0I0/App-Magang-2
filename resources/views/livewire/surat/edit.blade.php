<div x-data="{modalIsOpen: false}">
    <button x-on:click="modalIsOpen = true" type="button" class="rounded-md hover:bg-emerald-300/80 dark:hover:bg-green-600/80"><flux:icon.edit-icon class="size-5"/></button>
    <div x-cloak x-show="modalIsOpen" x-on:open-modal-edit-{{ $surat_id }}.window="modalIsOpen = true" x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen" x-on:keydown.esc.window="modalIsOpen = false" x-on:click.self="modalIsOpen = false" class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8" role="dialog" aria-modal="true" aria-labelledby="editModalTitle-{{ $surat_id }}">
        
        <!-- Modal Dialog -->
        <div x-show="modalIsOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" class="flex w-full max-w-lg flex-col overflow-hidden rounded-sm border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">

            <!-- Dialog Header -->
            <div class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 md:p-5 dark:border-neutral-700 dark:bg-neutral-950/20">
                <h3 id="editModalTitle-{{ $surat_id }}" class="font-semibold tracking-wide text-neutral-900 dark:text-white">Edit Surat</h3>
                <button x-on:click="modalIsOpen = false" aria-label="close modal">
                    <flux:icon.x-mark class="hover:bg-slate-200/90"/>
                </button>
            </div>

            <!-- Dialog Body -->
            <div class="p-4 md:p-5">
                <form wire:submit="updatesurat" class="space-y-4">
                    <!-- Nomor Surat -->
                    <div>
                        <flux:input
                            wire:model.live.blur="nomor_surat"
                            :label="__('Nomor Surat')"
                            type="text"
                            :placeholder="__('Nomor Surat')"
                        />
                        @error('nomor_surat') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Tanggal -->
                    <div>
                        <flux:input
                            wire:model.live.blur="tanggal"
                            :label="__('Tanggal')"
                            type="date"
                        />
                        @error('tanggal') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Perihal -->
                    <div>
                        <flux:textarea
                            wire:model.live.blur="perihal"
                            :label="__('Perihal')"
                            :placeholder="__('Perihal Surat')"
                        />
                        @error('perihal') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- File -->
                    <div>
                        <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">File Surat (Biarkan kosong jika tidak diubah)</div>
                        @if($old_file)
                            <div class="text-xs text-slate-500 mb-2">File saat ini: {{ $nama_asli_file }}</div>
                        @endif
                        <input type="file" wire:model="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        <div wire:loading wire:target="file" class="text-sm text-blue-500 mt-1">Uploading...</div>
                        @error('file') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Confirmation -->
                    <div x-data="{ mode: 'edit_surat' }" x-on:surat-updated.window="modalIsOpen = false; mode = 'edit_surat';">
                        <!-- UPDATE BUTTON -->
                        <div
                            type="button"
                            x-show="mode === 'edit_surat'"
                            x-transition
                            class="pt-6 flex flex-col items-end"
                        >
                            <button
                                @click="mode = 'confirm_update'"
                                class="inline-flex items-center justify-center rounded-lg bg-sky-600 px-10 py-2
                                    text-sm font-medium tracking-wide text-white
                                    transition-colors duration-150
                                    hover:bg-sky-500
                                    focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600
                                    active:opacity-90
                                    dark:bg-indigo-800 dark:hover:bg-indigo-700 dark:focus-visible:outline-indigo-800"
                                type="button"
                            >
                                Update
                            </button>
                        </div>

                        <!-- CONFIRMATION STATE -->
                        <div
                            x-show="mode === 'confirm_update'"
                            x-transition
                            class="mt-2 flex flex-col items-end gap-1.5 text-right"
                        >
                            <p class="text-sm text-slate-600 dark:text-slate-300">
                                Simpan Perubahan?
                            </p>

                            <div class="flex gap-2">
                                <button
                                    @click="mode = 'edit_surat'"
                                    type="button"
                                    class="inline-flex items-center justify-center rounded-lg bg-gray-200 px-4 py-2
                                        text-sm font-medium tracking-wide text-gray-800
                                        transition-colors duration-150
                                        hover:bg-gray-300"
                                >
                                    Batal
                                </button>
                                <button
                                    type="submit"
                                    class="inline-flex items-center justify-center rounded-lg bg-sky-600 px-10 py-2
                                        text-sm font-medium tracking-wide text-white
                                        transition-colors duration-150
                                        hover:bg-sky-500
                                        focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600
                                        active:opacity-90
                                        dark:bg-indigo-800 dark:hover:bg-indigo-700 dark:focus-visible:outline-indigo-800"
                                >
                                    Ya, Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
