@props([
    'title',
])
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2 flex flex-col items-center">
    <div class="w-fit flex flex-col items-center">
        <h2 class="font-semibold text-xl lg:text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $title }}
        </h2>
        <div class="w-[75%] h-1 bg-blue-700 dark:bg-indigo-900 rounded-full mt-2"></div>
    </div>
</div>
