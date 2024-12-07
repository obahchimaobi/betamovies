@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}"
        class="flex flex-wrap items-center justify-center lg:pt-4 pt-6">

        {{-- Pagination Elements --}}
        <div class="flex items-center gap-x-1">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span
                        class="min-h-[38px] min-w-[38px] flex justify-center items-center py-2 px-3 text-sm rounded-lg text-gray-800 dark:text-white">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page"
                                class="min-h-[38px] min-w-[38px] flex justify-center items-center bg-gray-200 text-gray-800 py-2 px-3 text-sm rounded-lg focus:outline-none focus:bg-gray-300 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-600 dark:text-white dark:focus:bg-slate-500">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                                class="min-h-[38px] min-w-[38px] flex justify-center items-center py-2 px-3 text-sm rounded-lg text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-white dark:hover:bg-slate-600 dark:focus:bg-white/10"
                                aria-label="{{ __('Go to page :page', ['page' => $page]) }}" wire:navigate>
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        
    </nav>

@endif
