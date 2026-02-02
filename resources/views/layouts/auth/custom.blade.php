<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body class="bg-[url('/public/images/Login.jpg')] bg-cover bg-no-repeat bg-center md:bg-cover bg-[#FDFDFC] dark:bg-zinc-950 text-[#1b1b18]">
        
        <div x-data="{ mode: 'button' }" x-bind:class="mode === 'button' ? 'p-6 lg:p-8 place-content-center lg:justify-center min-h-screen' : 'lg:justify-center min-h-screen'">

            <!-- BUTTON -->
            <div x-show="mode === 'button'" class="place-content-center">
                <div class="bg-[url('/public/images/Loginlogo.svg')] bg-contain bg-no-repeat bg-center h-32"></div>
                <div class="relative flex flex-col items-center justify-center">
                    <button
                        @click="mode = 'form'"
                        class="w-80 h-12 whitespace-nowrap rounded-xl bg-red-500 px-4 py-2 text-base font-medium tracking-wide text-white transition hover:bg-cyan-400 text-center active:bg-cyan-600 dark:bg-red-500 dark:text-white"
                    >
                        Login
                    </button>
                </div>
            </div>
            
            <!-- CARD FORM -->
            <div x-show="mode === 'form'" >
                
                <div class="relative text-white p-6">
                    <h1 class="font-bold text-2xl lg:text-4xl md:text-3xl leading-tight">Sistem</h1>
                    <h1 class="font-bold text-2xl lg:text-4xl md:text-3xl leading-tight">Informasi</h1>
                    <h1 class="font-bold text-2xl lg:text-4xl md:text-3xl leading-tight">Pengarsipan Surat</h1>
                </div>

                <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
                    <div class="w-full sm:max-w-md mt-2 px-8 lg:px-16 py-8 bg-white dark:bg-nightfall-900 shadow-md overflow-hidden sm:rounded-xl">
                    {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
