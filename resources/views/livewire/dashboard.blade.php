<div class="h-full flex flex-col">

    <!-- HEADER -->
    <x-app-header :title="__('Overview Arsip Surat')"/>    
    <!-- Filter Tahun - di luar container kartu -->
    <div class="border-l-[3px] border-nightfall-800 dark:border-slate-300 px-2.5 mb-4">
        <div x-data="combobox({
                options: [
                    { value: '2023', label: '2023' },
                    { value: '2024', label: '2024' },
                    { value: '2025', label: '2025' },
                    { value: '2026', label: '2026' },
                ],
                defaultValue: '2025'
        })" class="w-full max-w-md flex flex-row gap-2 items-center" x-on:keydown="highlightFirstMatchingOption($event.key)" x-on:keydown.esc.window="isOpen = false, openedWithKeyboard = false">
            <label for="year_result" class="w-fit pl-0.5 text-sm text-slate-600 dark:text-slate-300 whitespace-nowrap font-medium">Lihat Berdasarkan Tahun</label>    
            <div class="relative w-auto">
                <!-- trigger button -->
                <button type="button" role="combobox" class="inline-flex w-full items-center justify-between gap-2 whitespace-nowrap border-slate-300 bg-slate-50 px-4 py-1.5 text-sm font-medium tracking-wide text-slate-800 transition focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black dark:border-slate-700 dark:bg-slate-900/50 dark:text-slate-300 dark:focus-visible:outline-white rounded-2xl border" aria-haspopup="listbox" aria-controls="industriesList" x-on:click="isOpen = ! isOpen" x-on:keydown.down.prevent="openedWithKeyboard = true" x-on:keydown.enter.prevent="openedWithKeyboard = true" x-on:keydown.space.prevent="openedWithKeyboard = true" x-bind:aria-label="selectedOption ? selectedOption.value : 'Please Select'" x-bind:aria-expanded="isOpen || openedWithKeyboard">
                    <span class="text-sm font-normal" x-text="selectedOption ? selectedOption.value : 'Please Select'"></span>
                    <!-- Chevron -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                        <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                    </svg>
                </button>

                <!-- hidden input -->
                <input id="year_result" name="year_result" type="text" x-ref="hiddenTextField" hidden/>
                <ul x-cloak x-show="isOpen || openedWithKeyboard" id="industriesList" class="absolute z-10 left-0 top-11 flex max-h-44 w-full flex-col overflow-hidden overflow-y-auto border-slate-300 bg-slate-50 py-1.5 dark:border-slate-700 dark:bg-slate-900 rounded-lg border shadow-lg" role="listbox" aria-label="industries list" x-on:click.outside="isOpen = false, openedWithKeyboard = false" x-on:keydown.down.prevent="$focus.wrap().next()" x-on:keydown.up.prevent="$focus.wrap().previous()" x-transition x-trap="openedWithKeyboard">
                    <template x-for="(item, index) in options" x-bind:key="item.value">   
                        <li class="combobox-option inline-flex justify-between gap-6 bg-slate-50 px-4 py-2 text-sm text-slate-800 hover:bg-slate-900/5 hover:text-slate-900 focus-visible:bg-slate-900/5 focus-visible:text-slate-900 focus-visible:outline-hidden dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-50/5 dark:hover:text-white dark:focus-visible:bg-slate-50/10 dark:focus-visible:text-white cursor-pointer" role="option" x-on:click="setSelectedOption(item)" x-on:keydown.enter="setSelectedOption(item)" x-bind:id="'option-' + index" tabindex="0">
                            <span x-bind:class="selectedOption == item ? 'font-bold' : null" x-text="item.label"></span>
                            <span class="sr-only" x-text="selectedOption == item ? 'selected' : null"></span>
                            <svg x-cloak x-show="selectedOption == item" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2" class="size-4" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                            </svg>
                        </li>
                    </template>
                </ul>
            </div>
        </div>

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('combobox', (comboboxData = { options: [], defaultValue: null }) => ({
                    options: comboboxData.options,
                    isOpen: false,
                    openedWithKeyboard: false,
                    selectedOption: comboboxData.options.find(o => o.value === comboboxData.defaultValue) || null,
                    init() {
                        if (this.selectedOption) {
                            this.$refs.hiddenTextField.value = this.selectedOption.value;
                        }
                    },
                    setSelectedOption(option) {
                        this.selectedOption = option;
                        this.isOpen = false;
                        this.openedWithKeyboard = false;
                        this.$refs.hiddenTextField.value = option.value;
                    },
                    highlightFirstMatchingOption(pressedKey) {
                        const option = this.options.find((item) =>
                            item.label.toLowerCase().startsWith(pressedKey.toLowerCase()),
                        );
                        if (option) {
                            const index = this.options.indexOf(option);
                            const allOptions = document.querySelectorAll('.combobox-option');
                            if (allOptions[index]) {
                                allOptions[index].focus();
                            }
                        }
                    },
                }))
            })
        </script>
    </div>
    <!-- Container Kartu - transparan, tanpa background -->
    <div class="flex-1 shadow-sm sm:rounded-lg border border-slate-600/20 dark:border-slate-100/20 px-4 lg:px-16 py-8">

        <!-- GRID CARD -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- CARD -->
            <div class="w-full min-h-30
                        rounded-lg border border-slate-300 dark:border-slate-600
                        bg-white dark:bg-nightfall-900
                        flex flex-col items-center justify-center
                        py-4 px-3
                        shadow-sm hover:shadow-md hover:shadow-blue-500/30
                        transition-shadow">
                <h1 class="text-xs lg:text-sm font-semibold text-center text-zinc-600 dark:text-zinc-300">
                    Surat Keputusan
                </h1>
                <p class="text-2xl lg:text-3xl font-semibold text-center text-blue-600 dark:text-blue-400 mt-2">
                    3
                </p>
            </div>

            <div class="w-full min-h-30 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-nightfall-900 flex flex-col items-center justify-center py-6 px-3 shadow-sm hover:shadow-md hover:shadow-blue-500/30 transition-shadow">
                <h1 class="text-xs lg:text-sm font-semibold text-center text-zinc-600 dark:text-zinc-300">Surat Perintah</h1>
                <p class="text-2xl lg:text-3xl font-semibold text-center text-blue-600 dark:text-blue-400 mt-2">3</p>
            </div>

            <div class="w-full min-h-30 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-nightfall-900 flex flex-col items-center justify-center py-6 px-3 shadow-sm hover:shadow-md hover:shadow-blue-500/30 transition-shadow">
                <h1 class="text-xs lg:text-sm font-semibold text-center text-zinc-600 dark:text-zinc-300">Surat Edaran</h1>
                <p class="text-2xl lg:text-3xl font-semibold text-center text-blue-600 dark:text-blue-400 mt-2">3</p>
            </div>

            <div class="w-full min-h-30 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-nightfall-900 flex flex-col items-center justify-center py-6 px-3 shadow-sm hover:shadow-md hover:shadow-blue-500/30 transition-shadow">
                <h1 class="text-xs lg:text-sm font-semibold text-center text-zinc-600 dark:text-zinc-300">Surat Pengumuman</h1>
                <p class="text-2xl lg:text-3xl font-semibold text-center text-blue-600 dark:text-blue-400 mt-2">3</p>
            </div>

            <div class="w-full min-h-30 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-nightfall-900 flex flex-col items-center justify-center py-6 px-3 shadow-sm hover:shadow-md hover:shadow-blue-500/30 transition-shadow">
                <h1 class="text-xs lg:text-sm font-semibold text-center text-zinc-600 dark:text-zinc-300">Surat P3S</h1>
                <p class="text-2xl lg:text-3xl font-semibold text-center text-blue-600 dark:text-blue-400 mt-2">3</p>
            </div>

            <div class="w-full min-h-30 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-nightfall-900 flex flex-col items-center justify-center py-6 px-3 shadow-sm hover:shadow-md hover:shadow-blue-500/30 transition-shadow">
                <h1 class="text-xs lg:text-sm font-semibold text-center text-zinc-600 dark:text-zinc-300">Surat Penugasan</h1>
                <p class="text-2xl lg:text-3xl font-semibold text-center text-blue-600 dark:text-blue-400 mt-2">3</p>
            </div>

            <div class="w-full min-h-30 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-nightfall-900 flex flex-col items-center justify-center py-6 px-3 shadow-sm hover:shadow-md hover:shadow-blue-500/30 transition-shadow">
                <h1 class="text-xs lg:text-sm font-semibold text-center text-zinc-600 dark:text-zinc-300">Surat Keterangan</h1>
                <p class="text-2xl lg:text-3xl font-semibold text-center text-blue-600 dark:text-blue-400 mt-2">3</p>
            </div>

            <div class="w-full min-h-30 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-nightfall-900 flex flex-col items-center justify-center py-6 px-3 shadow-sm hover:shadow-md hover:shadow-blue-500/30 transition-shadow">
                <h1 class="text-xs lg:text-sm font-semibold text-center text-zinc-600 dark:text-zinc-300">Surat Perjanjian</h1>
                <p class="text-2xl lg:text-3xl font-semibold text-center text-blue-600 dark:text-blue-400 mt-2">3</p>
            </div>

        </div>

        <!-- Pagination Dots -->
        <div class="mt-8 flex justify-center gap-2">
            <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
            <span class="w-2.5 h-2.5 rounded-full bg-slate-300 dark:bg-slate-600"></span>
        </div>
    </div>

</div>
