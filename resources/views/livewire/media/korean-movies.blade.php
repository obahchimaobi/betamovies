<div>
    <div class="pb-5 pt-3 relative flex">
        <div class="flex flex-wrap sm:flex-nowrap w-full gap-2">
            <select id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-transparent dark:placeholder-gray-400 dark:text-white dark:focus:ring-transparent dark:focus:border-transparent focus:outline-none [&::-webkit-scrollbar]:w-1 [&::-webkit-scrollbar-track]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-slate-700 dark:[&::-webkit-scrollbar-thumb]:bg-slate-500"
                wire:model.live="yearFilter">
                <option value="">Choose a year</option>
                @foreach ($year as $item)
                    <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>

            <button type="button" wire:click='refresh'
                class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                <span class="flex items-center gap-x-2" wire:loading.remove.delay>
                    Reset
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4 shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                </span>

                <div class="animate-spin inline-block size-5 border-[3px] border-current border-t-transparent text-white/60 rounded-full dark:text-white/60"
                    role="status" aria-label="loading" wire:loading.delay>
                    <span class="sr-only">Loading...</span>
                </div>
            </button>
        </div>
    </div>

    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="grid xl:grid-cols-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 grid-cols-2 gap-y-5 gap-4">
        @if (sizeof($korean_movies) > 0)
            @foreach ($korean_movies as $movies)
                <div class="w-full">
                    <a href="{{ route('movie.details', ['name' => $movies->formatted_name]) }}" wire:navigate><img
                            src="{{ asset('storage/images/' . $movies->poster_path) }}" alt="{{ $movies->name }}"
                            class="rounded-lg dark:border-slate-700 lg:hover:scale-105 duration-200 w-full border-slate-100"></a>

                    <div class="flex justify-between mt-2 gap-4">
                        <a href="{{ route('movie.details', ['name' => $movies->formatted_name]) }}"
                            class="text-gray-800 hover:text-gray-700 font-semibold dark:text-white lg:text-xs text-sm truncate dark:hover:text-slate-300"
                            wire:navigate><span class="">{{ $movies->name }}
                                ({{ $movies->release_year }})
                            </span></a>
                        <span
                            class="text-gray-800 font-semibold dark:text-white lg:text-xs text-sm flex gap-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="size-3 fill-yellow-400">
                                <path fill-rule="evenodd"
                                    d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ $movies->vote_count }}</span>
                    </div>
                </div>
            @endforeach
        @else
            <div class="flex flex-col items-center justify-center mx-auto col-span-full">
                <svg class="fi-ta-empty-state-icon w-10 h-10 mt-4 text-gray-500 dark:text-gray-400 dark:bg-slate-600 rounded-full p-2 mx-auto"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path>
                </svg>
                <h1 class="dark:text-white/70 text-slate-800 mt-2">No result found</h1>
            </div>
        @endif
    </div>
    <div class="mt-8">
        {{ $korean_movies->links(data: ['scrollTo' => '#korean-drama']) }}
    </div>
</div>
