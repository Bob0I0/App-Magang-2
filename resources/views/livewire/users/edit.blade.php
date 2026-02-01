<div x-data="{modalIsOpen: false}" class="pb-2">
    <button x-on:click="modalIsOpen = true" type="button"><flux:icon.edit-icon /></button>
    <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen" x-on:keydown.esc.window="modalIsOpen = false" x-on:click.self="modalIsOpen = false" class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8" role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
        <!-- Modal Dialog -->
        <div x-show="modalIsOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" class="flex max-w-lg flex-col gap-4 overflow-hidden rounded-sm border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
            <div class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-neutral-900 dark:text-white">Tambah Pengguna Baru</h3>
                <button x-on:click="modalIsOpen = false" aria-label="close modal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Dialog Body -->
            <div class="p-4 md:p-5">
                <form wire:submit="updateacc" class="space-y-4">
                    <!-- Name -->
                    <flux:input
                        wire:model.blur="name"
                        :label="__('Nama Lengkap')"
                        type="text"
                        required
                        autofocus
                        autocomplete="name"
                        :placeholder="__('Full name')"
                    />
                    <div>@error('name')<span class="error"></span> @enderror</div>

                    <!-- Email Address -->
                    <flux:input
                        wire:model.blur="username"
                        :label="__('Username')"
                        type="text"
                        required
                        autocomplete="username"
                        placeholder="Username"
                    />
                    <div>@error('username') <span class="error"></span> @enderror</div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Password -->
                        <div class="flex flex-col gap-1">
                        <flux:input
                            wire:model.blur="password"
                            :label="__('Password')"
                            type="password"
                            required
                            autocomplete="new-password"
                            :placeholder="__('Password')"
                            viewable
                        />
                        <div>@error('password') <span class="error"></span> @enderror</div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="flex flex-col gap-1">
                        <flux:input
                            wire:model.blur="password_confirmation"
                            :label="__('konfirmasi password')"
                            type="password"
                            required
                            autocomplete="new-password"
                            :placeholder="__('konfirmasi password')"
                            viewable
                        />
                        <div>@error('password_confirmation') <span class="error"></span> @enderror</div>
                        </div>
                    </div>

                    <!-- Confirmation -->
                    <div x-data="{ mode: 'tambah_user' }">
                        <!-- CREATE BUTTON -->
                        <div
                            x-show="mode === 'tambah_user'"
                            x-transition
                            class="pt-6"
                        >
                            <button
                                @click="mode = 'konfirmasi_user'"
                                class="inline-flex items-center justify-center rounded-lg bg-sky-600 px-10 py-2
                                    text-sm font-medium tracking-wide text-white
                                    transition-colors duration-150
                                    hover:bg-sky-500
                                    focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600
                                    active:opacity-90
                                    dark:bg-indigo-800 dark:hover:bg-indigo-700 dark:focus-visible:outline-indigo-800"
                            >
                                Tambah
                            </button>
                        </div>

                        <!-- CONFIRMATION STATE -->
                        <div
                            x-show="mode === 'konfirmasi_user'"
                            x-transition
                            class="mt-2 flex flex-col items-end gap-1.5 text-right"
                        >
                            <p class="text-sm text-slate-600 dark:text-slate-300">
                                Tekan kembali untuk konfirmasi tambah user
                            </p>
                            <flux:button variant="primary" color="green" type="submit" class="w-full" data-modal-toggle="createuser">Simpan</flux:button>

                            <button
                                @click="mode = 'tambah_user'"
                                class="inline-flex items-center justify-center rounded-lg bg-sky-600 px-10 py-2
                                    text-sm font-medium tracking-wide text-white
                                    transition-colors duration-150
                                    hover:bg-sky-500
                                    focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600
                                    active:opacity-90
                                    dark:bg-indigo-800 dark:hover:bg-indigo-700 dark:focus-visible:outline-indigo-800"
                            >
                                Konfirmasi
                            </button>
                        </div>
                    </div>
                </form>                
            </div>
            <!-- Dialog Footer -->
            <div class="flex flex-col-reverse justify-between gap-2 border-t border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20 sm:flex-row sm:items-center md:justify-end">
                {{-- <button x-on:click="modalIsOpen = false" type="button" class="whitespace-nowrap rounded-sm px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:text-neutral-300 dark:focus-visible:outline-white">Remind me later</button>
                <button x-on:click="modalIsOpen = false" type="button" class="whitespace-nowrap rounded-sm bg-black border border-black dark:border-white px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Upgrade Now</button> --}}
                

            </div>
        </div>
    </div>
</div>
{{-- <div>
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5">
                
                <flux:heading size="xl" level="1" variant="strong">
                    <strong>{{ __('Tambah Data Pengguna') }}</strong>
                </flux:heading>

                <flux:button wire:click.prevent="resetForm" icon="home" variant="subtle" data-modal-toggle="createuser">
                </flux:button>

            </div>

            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form wire:submit="createuser" class="space-y-4">
                    <!-- Name -->
                    <flux:input
                        wire:model.blur="name"
                        :label="__('Nama Lengkap')"
                        type="text"
                        required
                        autofocus
                        autocomplete="name"
                        :placeholder="__('Full name')"
                    />
                    <div>@error('name')<span class="error"></span> @enderror</div>

                    <!-- Email Address -->
                    <flux:input
                        wire:model.blur="username"
                        :label="__('Username')"
                        type="text"
                        required
                        autocomplete="username"
                        placeholder="Username"
                    />
                    <div>@error('username') <span class="error"></span> @enderror</div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Password -->
                        <div class="flex flex-col gap-1">
                        <flux:input
                            wire:model.blur="password"
                            :label="__('Password')"
                            type="password"
                            required
                            autocomplete="new-password"
                            :placeholder="__('Password')"
                            viewable
                        />
                        <div>@error('password') <span class="error"></span> @enderror</div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="flex flex-col gap-1">
                        <flux:input
                            wire:model.blur="password_confirmation"
                            :label="__('konfirmasi password')"
                            type="password"
                            required
                            autocomplete="new-password"
                            :placeholder="__('konfirmasi password')"
                            viewable
                        />
                        <div>@error('password_confirmation') <span class="error"></span> @enderror</div>
                        </div>
                    </div>

                    <!-- Confirmation -->
                    <flux:button variant="primary" color="green" type="submit" class="w-full" data-modal-toggle="createuser">Simpan</flux:button>

                </form>
                
            </div>
        </div>
    </div>
</div> --}}