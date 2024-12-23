<div>


    <div class="flex items-center justify-between">
        <h1 class="text-black dark:text-white lg:text-3xl text-2xl font-semibold">{{ Str::ucfirst($genre) }}
        </h1>
        <ol class="flex items-center whitespace-nowrap">
            <li class="inline-flex items-center">
                <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-slate-500 dark:hover:text-blue-500 dark:focus:text-blue-500"
                    href="{{ route('home') }}" wire:navigate>
                    Home
                </a>
                <svg class="shrink-0 size-5 text-gray-400 dark:text-slate-600 mx-2" width="16" height="16"
                    viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
                </svg>
            </li>
            <li class="inline-flex items-center">
                <a
                    class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-slate-500 dark:hover:text-blue-500 dark:focus:text-blue-500 hover:cursor-default">
                    tag
                </a>
                <svg class="shrink-0 size-5 text-gray-400 dark:text-slate-600 mx-2" width="16" height="16"
                    viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
                </svg>
            </li>
            <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-neutral-200"
                aria-current="page">
                {{ $genre }}
            </li>
        </ol>
    </div>

    <div class="pt-10 relative flex">
        <select id="countries"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
            wire:model.live="yearFilter">
            <option value="">Choose a year</option>
            @foreach ($year as $item)
                <option value="{{ $item }}">{{ $item }}</option>
            @endforeach
        </select>

        <div wire:loading class="absolute right-6 top-3/4 -translate-y-1/2">
            <div class="animate-spin inline-block size-5 border-[3px] border-current border-t-transparent text-blue-600 rounded-full dark:text-white" role="status" aria-label="loading">
                <span class="sr-only">Loading...</span>
              </div>
        </div>
    </div>

    <div class="grid xl:grid-cols-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 grid-cols-2 gap-4 mt-6">
        @if (sizeof($paginatedResults) > 0)
            @foreach ($paginatedResults as $movie)
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
        @else
            <p class="dark:text-white/70 text-slate-800">No result found</p>
        @endif
    </div>
    <div class="mt-8">
        {{ $paginatedResults->links() }}
    </div>
</div>
