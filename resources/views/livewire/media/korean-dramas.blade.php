<div>
    <div class="pb-5 pt-3 relative flex">
        <div class="flex flex-wrap sm:flex-nowrap w-full gap-2">
            <select id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-transparent dark:placeholder-gray-400 dark:text-white dark:focus:ring-transparent dark:focus:border-transparent focus:outline-none"
                wire:model.live="yearFilter">
                <option value="">Choose a year</option>
                @foreach ($year as $item)
                    <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>

            <button type="button" wire:click='refresh'
                class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                Reset
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4 shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                </svg>

            </button>
        </div>
    </div>

    <div wire:loading class="right-5 top-1/2 -translate-y-1/2">
        <div class="animate-spin inline-block size-6 border-[3px] border-current border-t-transparent text-blue-600 rounded-full dark:text-slate-300"
            role="status" aria-label="loading">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    {{-- In work, do what you enjoy. --}}
    <div class="grid xl:grid-cols-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 grid-cols-2 gap-4">
        @if (sizeof($kdrama) > 0)
            @foreach ($kdrama as $top_rated)
                <div class="w-full">
                    <a href="{{ route('movie.details', ['name' => $top_rated->formatted_name]) }}" wire:navigate><img
                            src="{{ asset('storage/images/' . $top_rated->poster_path) }}" alt="{{ $top_rated->name }}"
                            class="rounded-lg border dark:border-slate-700 lg:hover:scale-105 duration-200 w-full border-slate-100"></a>

                    <div class="flex justify-between mt-2 gap-4">
                        <a href="{{ route('movie.details', ['name' => $top_rated->formatted_name]) }}"
                            class="text-gray-800 hover:text-gray-700 font-semibold dark:text-white lg:text-xs text-sm truncate dark:hover:text-slate-300"
                            wire:navigate><span class="">{{ $top_rated->name }}
                                ({{ $top_rated->release_year }})
                            </span></a>
                        <span
                            class="text-gray-800 font-semibold dark:text-white lg:text-xs text-sms">{{ $top_rated->vote_count }}</span>
                    </div>
                </div>
            @endforeach
        @else
            <p class="dark:text-white/70 text-slate-800">No result found</p>
        @endif
    </div>
    <div class="mt-8">
        {{ $kdrama->links(data: ['scrollTo' => '#korean-drama']) }}
    </div>
</div>
