<div>
    <div class="pt-5 pb-8 relative flex">
        <select id="countries"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
            wire:model.live="movieFilter">
            <option value="">All</option>
            <option value="movie">Movie</option>
            <option value="series">Series</option>
        </select>

        <div wire:loading class="absolute right-8 top-1/2 -translate-y-1/2">
            <div class="animate-spin inline-block size-5 border-[3px] border-current border-t-transparent text-blue-600 rounded-full dark:text-white" role="status" aria-label="loading">
                <span class="sr-only">Loading...</span>
              </div>
        </div>
    </div>

    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div>
        @if (sizeof($paginatedResults) > 0)
            <div class="grid xl:grid-cols-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 grid-cols-2 gap-4">
                @foreach ($paginatedResults->lazy() as $movie)
                    <div class="w-full">
                        <a href="{{ route('movie.details', ['name' => $movie->formatted_name]) }}" wire:navigate><img
                                src="{{ asset('storage/images/' . $movie->poster_path) }}" alt="{{ $movie->name }}"
                                class="rounded-lg border dark:border-slate-700 lg:hover:scale-105 duration-200 w-full border-slate-100"></a>

                        <div class="flex justify-between mt-2 gap-5">
                            <a href="{{ route('movie.details', ['name' => $movie->formatted_name]) }}"
                                class="text-gray-800 hover:text-gray-700 font-semibold dark:text-white lg:text-xs text-sm truncate dark:hover:text-slate-300"
                                wire:navigate><span class="">{{ $movie->name }}
                                    ({{ $movie->release_year }})
                                </span></a>
                            <span
                                class="text-gray-800 font-semibold dark:text-white lg:text-xs text-sms">{{ $movie->vote_count }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-8">
                {{ $paginatedResults->links(data: ['scrollTo' => '#search']) }}
            </div>
        @else
            <div class="text-center">
                <p class="text-center text-2xl text-slate-800 dark:text-slate-200 font-semibold mt-20 mb-6">No result
                    found</p>
                <a href="https://wa.me/2349133381269?text=Hello%20BetaMovies,%20I%20would%20like%20to%20request%20the%20movie%20titled%20{{ $query }}"
                    class="text-blue-600 underline font-semibold">Request it</a>
            </div>
        @endif
    </div>
</div>
