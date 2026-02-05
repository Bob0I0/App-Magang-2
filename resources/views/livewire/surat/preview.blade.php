<div x-cloak x-data="{ modalIsOpen: false }" class="inline-block">
    <button x-on:click="modalIsOpen = true" type="button" class="text-slate-500 rounded-md hover:bg-sky-500/80 dark:hover:bg-sky-400/80">
        <flux:icon.preview-icon class="size-5" />
    </button>

    <div x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen" x-on:keydown.esc.window="modalIsOpen = false" x-on:click.self="modalIsOpen = false" class="fixed inset-0 z-30 flex items-center justify-center bg-black/50 p-4 pb-8 backdrop-blur-md" role="dialog" aria-modal="true" aria-labelledby="previewModalTitle-{{ $surat_id }}">
        
        <div x-show="modalIsOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" 
        class="flex w-full max-w-4xl flex-col overflow-hidden rounded-sm border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 max-h-[90vh]">

            <!-- Dialog Header -->
            <div class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 md:p-5 dark:border-neutral-700 dark:bg-neutral-950/20">
                <h3 id="previewModalTitle-{{ $surat_id }}" class="font-semibold tracking-wide text-neutral-900 dark:text-white">Preview: {{ $nama_asli_file }}</h3>
                <button x-on:click="modalIsOpen = false" aria-label="close modal">
                    <flux:icon.x-mark class="hover:bg-slate-200/90"/>
                </button>
            </div>

            <!-- Dialog Body -->
            <div class="p-4 md:p-5 flex-1 overflow-auto bg-gray-100 dark:bg-gray-800 flex justify-center items-center">
                @if($file_path)
                    @if(str_contains($mime_type, 'image'))
                        <img src="{{ $file_path }}" alt="Preview" class="max-w-full max-h-[70vh] object-contain shadow-lg">
                    @elseif(str_contains($mime_type, 'pdf'))
                        <iframe src="{{ $file_path }}" class="w-full h-[70vh] border-0" frameborder="0"></iframe>
                    @else
                        <div class="text-center">
                            <flux:icon.document-text class="size-24 mx-auto text-gray-400 mb-4"/>
                            <p class="text-gray-500 mb-4">File tidak dapat dipreview.</p>
                            <a href="{{ $file_path }}" target="_blank" class="text-blue-600 hover:underline">Download File</a>
                        </div>
                    @endif
                @else
                    <div class="text-center text-gray-500">File tidak ditemukan.</div>
                @endif
            </div>
        </div>
    </div>
</div>
