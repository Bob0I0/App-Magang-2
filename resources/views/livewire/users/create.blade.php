<div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen" x-on:keydown.esc.window="modalIsOpen = false; $wire.resetForm();" x-on:click.self="modalIsOpen = false; $wire.resetForm();" class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8" role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
    <!-- Modal Dialog -->
    <div x-show="modalIsOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" class="flex max-w-lg flex-col overflow-hidden rounded-sm border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">

        <!-- Dialog Header -->
        <div class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 md:p-5 dark:border-neutral-700 dark:bg-neutral-950/20">
            <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-neutral-900 dark:text-white">Tambah Pengguna Baru</h3>
            <button x-on:click="modalIsOpen = false; $wire.resetForm();" aria-label="close modal">
                <flux:icon.x-mark class="hover:bg-slate-200/90"/>
            </button>
        </div>

        <!-- Dialog Body -->
        <div class="p-4 md:p-5">
            <form wire:submit="createuser" class="space-y-4">
                <!-- Name -->
                <div>
                    <flux:input
                        wire:model.live.blur="name"
                        :label="__('Nama Lengkap')"
                        type="text"
                        autofocus
                        autocomplete="name"
                        :placeholder="__('Full name')"
                    />
                    @error('name')@enderror
                </div>

                <!-- Email Address -->
                <div>
                    <flux:input
                        wire:model.live.blur="username"
                        :label="__('Username')"
                        type="text"
                        autocomplete="username"
                        placeholder="Username"
                    />
                    @error('username')@enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <!-- Password -->
                    <div class="flex flex-col gap-1">
                        <flux:input
                            wire:model.live.blur="password"
                            :label="__('Password')"
                            type="password"
                            autocomplete="new-password"
                            :placeholder="__('Password')"
                            viewable
                        />
                        @error('password')@enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="flex flex-col gap-1">
                        <flux:input
                            wire:model.live.blur="password_confirmation"
                            :label="__('konfirmasi password')"
                            type="password"
                            autocomplete="new-password"
                            :placeholder="__('konfirmasi password')"
                            viewable
                        />
                        @error('password_confirmation')@enderror
                    </div>
                </div>

                <!-- Confirmation -->
                <div x-data="{ mode: 'tambah_user' }" x-on:user-created.window="modalIsOpen = false; mode = 'tambah_user';">
                    <!-- CREATE BUTTON -->
                    <div
                        type="button"
                        x-show="mode === 'tambah_user'"
                        x-transition
                        class="pt-6 flex flex-col items-end"
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

                        <button
                            {{-- @click="mode = 'tambah_user'"  --}}
                            type="submit"
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
    </div>
@if (session('status'))
    <div
        class="relative w-full overflow-hidden rounded-sm border border-green-500 bg-surface text-on-surface dark:bg-surface-dark dark:text-on-surface-dark"
        role="alert"
    >
        <div class="flex w-full items-center gap-2 bg-success/10 p-4">
            <div class="rounded-full bg-green-500/15 p-1 text-green-500" aria-hidden="true">
                <flux:icon.succesful />
            </div>

            <div class="ml-2">
                <h3 class="text-sm font-medium text-success">
                    {{ session('success') }}
                </h3>
            </div>

            <button
                class="ml-auto"
                aria-label="dismiss alert"
                @click="show = false"
            >
                <flux:icon.x-mark />
            </button>
        </div>
    </div>
@endif
</div>
