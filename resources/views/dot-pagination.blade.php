<div>
    @if ($paginator->hasPages())
        <div class="mt-8 flex justify-center gap-2">
            {{-- Loop through the pages --}}
            @foreach ($elements as $element)
                {{-- Array of links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            {{-- Active Page Dot --}}
                            <span 
                                class="w-2.5 h-2.5 rounded-full bg-blue-600 transition-all duration-300"
                                aria-current="page">
                            </span>
                        @else
                            {{-- Inactive Page Dot --}}
                            <button 
                                wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                class="w-2.5 h-2.5 rounded-full bg-slate-300 dark:bg-slate-600 hover:bg-slate-400 transition-all duration-300"
                                aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                            </button>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
    @endif
</div>