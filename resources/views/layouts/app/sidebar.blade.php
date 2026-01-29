<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="font-sans antialiased h-screen">
        <div class="flex flex-col h-full">
            <!-- Header Banner -->
            <div class="h-[25vh] bg-[url('/public/images/Dashboard.jpg')] bg-no-repeat bg-center bg-cover shrink-0">
                <div class="relative text-white p-6">
                    <h1 class="font-bold text-lg md:text-2xl leading-tight">Sistem Informasi</h1>
                    <h1 class="font-bold text-lg md:text-2xl leading-tight">Pengarsipan</h1>
                    <h1 class="font-bold text-lg md:text-2xl leading-tight">Surat</h1>
                </div>
            </div>
            <!-- Sidebar  -->
            <div class="flex-1">
                <flux:sidebar sticky collapsible="mobile" class="h-full border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
                    
                    <flux:navlist variant="outline">
                        <flux:navlist.item href="{{ route('dashboard') }}">Dashboard</flux:navlist.item>
                        <flux:navlist.item href="{{ route('modul') }}">Surat</flux:navlist.item>
                        <flux:navlist.item href="{{ route('pengguna') }}">Kelola Pengguna</flux:navlist.item>
                    </flux:navlist>

                    <flux:spacer />

                    <flux:button x-data x-on:click="$flux.dark = ! $flux.dark" icon="moon" variant="subtle" aria-label="Toggle dark mode" />

                    <x-desktop-user-menu class="hidden lg:block" :name="auth()->user()->name" />
                </flux:sidebar>

                <!-- Mobile User Menu -->
                <flux:header class="lg:hidden">
                    <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

                    <flux:spacer />

                    <flux:dropdown position="top" align="end">
                        <flux:profile
                            :initials="auth()->user()->initials()"
                            icon-trailing="chevron-down"
                        />

                        <flux:menu>
                            <flux:menu.radio.group>
                                <div class="p-0 text-sm font-normal">
                                    <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                        <flux:avatar
                                            :name="auth()->user()->name"
                                            :initials="auth()->user()->initials()"
                                        />

                                        <div class="grid flex-1 text-start text-sm leading-tight">
                                            <flux:heading class="truncate">{{ auth()->user()->name }}</flux:heading>
                                            <flux:text class="truncate">{{ auth()->user()->username }}</flux:text>
                                        </div>
                                    </div>
                                </div>
                            </flux:menu.radio.group>

                            <flux:menu.separator />

                            <flux:menu.radio.group>
                                <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>
                                    {{ __('Settings') }}
                                </flux:menu.item>
                            </flux:menu.radio.group>

                            <flux:menu.separator />

                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <flux:menu.item
                                    as="button"
                                    type="submit"
                                    icon="arrow-right-start-on-rectangle"
                                    class="w-full cursor-pointer"
                                    data-test="logout-button"
                                >
                                    {{ __('Log Out') }}
                                </flux:menu.item>
                            </form>
                        </flux:menu>
                    </flux:dropdown>
                </flux:header>
                
                {{ $slot }}
                
            </div>
        </div>
        @fluxScripts
    </body>
    {{-- <body class="min-h-screen bg-white dark:bg-zinc-800">
        <div class="flex flex-col h-full">
            <!-- Header Banner -->
            <div class="h-[25vh] bg-[url('/public/images/Dashboard.jpg')] bg-no-repeat bg-center bg-cover shrink-0">
                <div class="relative text-white p-6">
                    <h1 class="font-bold text-lg md:text-2xl leading-tight">Sistem Informasi</h1>
                    <h1 class="font-bold text-lg md:text-2xl leading-tight">Pengarsipan</h1>
                    <h1 class="font-bold text-lg md:text-2xl leading-tight">Surat</h1>
                </div>
            </div>
            <div class="flex-1 overflow-hidden">
                <flux:sidebar sticky collapsible="mobile" class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
                    
                    <flux:navlist variant="outline">
                        <flux:navlist.item href="{{ route('dashboard') }}">Dashboard</flux:navlist.item>
                        <flux:navlist.item href="{{ route('modul') }}">Surat</flux:navlist.item>
                        <flux:navlist.item href="{{ route('pengguna') }}">Kelola Pengguna</flux:navlist.item>
                    </flux:navlist>

                    <flux:spacer />

                    <flux:button x-data x-on:click="$flux.dark = ! $flux.dark" icon="moon" variant="subtle" aria-label="Toggle dark mode" />

                    <x-desktop-user-menu class="hidden lg:block" :name="auth()->user()->name" />
                </flux:sidebar>


                <!-- Mobile User Menu -->
                <flux:header class="lg:hidden">
                    <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

                    <flux:spacer />

                    <flux:dropdown position="top" align="end">
                        <flux:profile
                            :initials="auth()->user()->initials()"
                            icon-trailing="chevron-down"
                        />

                        <flux:menu>
                            <flux:menu.radio.group>
                                <div class="p-0 text-sm font-normal">
                                    <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                        <flux:avatar
                                            :name="auth()->user()->name"
                                            :initials="auth()->user()->initials()"
                                        />

                                        <div class="grid flex-1 text-start text-sm leading-tight">
                                            <flux:heading class="truncate">{{ auth()->user()->name }}</flux:heading>
                                            <flux:text class="truncate">{{ auth()->user()->username }}</flux:text>
                                        </div>
                                    </div>
                                </div>
                            </flux:menu.radio.group>

                            <flux:menu.separator />

                            <flux:menu.radio.group>
                                <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>
                                    {{ __('Settings') }}
                                </flux:menu.item>
                            </flux:menu.radio.group>

                            <flux:menu.separator />

                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <flux:menu.item
                                    as="button"
                                    type="submit"
                                    icon="arrow-right-start-on-rectangle"
                                    class="w-full cursor-pointer"
                                    data-test="logout-button"
                                >
                                    {{ __('Log Out') }}
                                </flux:menu.item>
                            </form>
                        </flux:menu>
                    </flux:dropdown>
                </flux:header>

                {{ $slot }}

                @fluxScripts
            </div>
        </div>
    </body> --}}
</html>
