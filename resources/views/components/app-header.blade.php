<div class="py-2">
    <div class="grid grid-cols-3 items-center">

        <!-- Kolom 1 (Actions Left / Back Button) -->
        <div class="flex justify-start pb-4">
            {{ $left ?? '' }}
        </div>

        <!-- Kolom 2 (Title - CENTER ASLI) -->
        <div class="flex flex-col items-center text-center w-fit mx-auto pb-4">
            <h2 class="font-semibold text-xl lg:text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $title }}
            </h2>
            <div class="w-[75%] h-1 bg-blue-700 dark:bg-blue-700 rounded-full mt-2"></div>
        </div>

        <!-- Kolom 3 (Actions Right) -->
        <div class="flex justify-end pb-4">
            {{ $actions ?? '' }}
        </div>

    </div>
</div>