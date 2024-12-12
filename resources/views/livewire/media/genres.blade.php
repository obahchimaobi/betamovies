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
                <svg class="shrink-0 size-5 text-gray-400 dark:text-slate-600 mx-2" width="16"
                    height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true">
                    <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
                </svg>
            </li>
            <li class="inline-flex items-center">
                <a
                    class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-slate-500 dark:hover:text-blue-500 dark:focus:text-blue-500 hover:cursor-default">
                    tag
                </a>
                <svg class="shrink-0 size-5 text-gray-400 dark:text-slate-600 mx-2" width="16"
                    height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true">
                    <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
                </svg>
            </li>
            <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-neutral-200"
                aria-current="page">
                {{ $genre }}
            </li>
        </ol>
    </div>
    
    <div class="grid xl:grid-cols-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 grid-cols-2 gap-4 mt-8">
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
    </div>
    <div class="mt-8">
        {{ $paginatedResults->links() }}
    </div>
</div>
