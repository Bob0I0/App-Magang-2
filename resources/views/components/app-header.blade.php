@props([
    'title',
])

<div class="max-w-7xl sm:px-6 lg:px-8 py-2">
    <div class="grid grid-cols-3 items-center">

        <!-- Kolom 1 (kosong / future use) -->
        <div></div>

        <!-- Kolom 2 (Title - CENTER ASLI) -->
        <div class="flex flex-col items-center text-center w-fit mx-auto">
            <h2 class="font-semibold text-xl lg:text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $title }}
            </h2>
            <div class="w-[75%] h-1 bg-blue-700 dark:bg-indigo-900 rounded-full mt-2"></div>
        </div>

        <!-- Kolom 3 (Actions) -->
        <div class="flex justify-end">
            {{ $actions ?? '' }}
        </div>

    </div>
</div>