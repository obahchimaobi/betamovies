<div>
    <hr class="border-0 h-0.5 dark:bg-slate-800 bg-slate-300">

    <!-- Content -->
    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 my-10">
            <!-- your content goes here ... -->
            <h1 class="text-gray-800 dark:text-white lg:text-3xl text-2xl font-semibold">New Seasons & Episodes
            </h1>

            <div class="grid xl:grid-cols-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 grid-cols-2 gap-y-5 gap-4">
                @if ($seasons)
                    @foreach ($seasons as $season)
                        <div class="w-full">
                            <a href="{{ route('movie.details', ['name' => $season->formatted_name]) }}"
                                wire:navigate><img src="{{ asset('storage/uploads/' . $season->poster_path) }}"
                                    alt=""
                                    class="rounded-lg lg:hover:scale-105 duration-200 w-full border-slate-100"></a>

                            <div class="flex justify-between mt-2 gap-4">
                                <a href="{{ route('movie.details', ['name' => $season->formatted_name]) }}"
                                    class="text-gray-800 hover:text-gray-700 font-semibold dark:text-white lg:text-xs text-sm dark:hover:text-slate-300"
                                    wire:navigate><span class="">
                                        {{ $season->name . ' ' . 'Season ' . $season->season_number . ' Episode ' . $season->episode_number }} (Added)
                                    </span></a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- End Content -->

    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <hr class="border-0 h-0.5 dark:bg-slate-800 bg-slate-300">

    <!-- Content -->
    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 my-10">
            <!-- your content goes here ... -->
            <h1 class="text-gray-800 dark:text-white lg:text-3xl text-2xl font-semibold">Newly Added Movies
            </h1>

            <div class="grid xl:grid-cols-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 grid-cols-2 gap-y-5 gap-4">
                @if ($movies_section)
                    @foreach ($movies_section as $movies)
                        <div class="w-full">
                            <a href="{{ route('movie.details', ['name' => $movies->formatted_name]) }}"
                                wire:navigate><img src="{{ asset('storage/images/' . $movies->poster_path) }}"
                                    alt=""
                                    class="rounded-lg dark:border-slate-700 lg:hover:scale-105 duration-200 w-full border-slate-100"></a>

                            <div class="flex justify-between mt-2 gap-4">
                                <a href="{{ route('movie.details', ['name' => $movies->formatted_name]) }}"
                                    class="text-gray-800 hover:text-gray-700 font-semibold dark:text-white lg:text-xs text-sm truncate dark:hover:text-slate-300"
                                    wire:navigate><span class="">{{ $movies->name }}
                                        ({{ $movies->release_year }})
                                    </span></a>

                                <span
                                    class="text-gray-800 font-semibold dark:text-white lg:text-xs text-sm flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-3 fill-yellow-400">
                                        <path fill-rule="evenodd"
                                            d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                                            clip-rule="evenodd" />
                                    </svg>

                                    {{ $movies->vote_count }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            @if (count($movies_section) >= 24)
                <div class="mx-auto text-center">
                    <a href="{{ route('movies.page') }}"
                        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                        wire:navigate>
                        Show more
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </a>

                </div>
            @endif
        </div>
    </div>
    <!-- End Content -->

    <hr class="border-0 h-0.5 dark:bg-slate-800 bg-slate-300">

    <!-- Content -->
    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 my-10">
            <!-- your content goes here ... -->
            <h1 class="text-gray-800 dark:text-white lg:text-3xl text-2xl font-semibold">Newly Added Series
            </h1>

            <div class="grid xl:grid-cols-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 grid-cols-2 gap-y-5 gap-4">
                @if ($series_section)
                    @foreach ($series_section as $series)
                        <div class="w-full">
                            <a href="{{ route('movie.details', ['name' => $series->formatted_name]) }}"
                                wire:navigate><img src="{{ asset('storage/images/' . $series->poster_path) }}"
                                    alt=""
                                    class="rounded-lg dark:border-slate-700 lg:hover:scale-105 duration-200 w-full border-slate-100"></a>

                            <div class="flex justify-between mt-2 gap-4">
                                <a href="{{ route('movie.details', ['name' => $series->formatted_name]) }}"
                                    class="text-gray-800 hover:text-gray-700 font-semibold dark:text-white lg:text-xs text-sm truncate dark:hover:text-slate-300"
                                    wire:navigate><span class="">{{ $series->name }}
                                        ({{ $series->release_year }})
                                    </span></a>

                                <span
                                    class="text-gray-800 font-semibold dark:text-white lg:text-xs text-sm flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-3 fill-yellow-400">
                                        <path fill-rule="evenodd"
                                            d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                                            clip-rule="evenodd" />
                                    </svg>

                                    {{ $series->vote_count }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            @if (count($series_section) >= 24)
                <div class="mx-auto text-center">
                    <a href="{{ route('series.page') }}"
                        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                        wire:navigate>
                        Show more
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </a>

                </div>
            @endif
        </div>
    </div>
    <!-- End Content -->

    <hr class="border-0 h-0.5 dark:bg-slate-800 bg-slate-300">

    <!-- Content -->
    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 my-10">
            <!-- your content goes here ... -->
            <h1 class="text-gray-800 dark:text-white lg:text-3xl text-2xl font-semibold">Trending Movies
            </h1>

            <div class="grid xl:grid-cols-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 grid-cols-2 gap-y-5 gap-4">
                @foreach ($trending_movies as $trending)
                    <div class="w-full">
                        <a href="{{ route('movie.details', ['name' => $trending->formatted_name]) }}" wire:navigate><img
                                src="{{ asset('storage/images/' . $trending->poster_path) }}" alt=""
                                class="rounded-lg dark:border-slate-700 lg:hover:scale-105 duration-200 w-full border-slate-100"></a>

                        <div class="flex justify-between mt-2 gap-4">
                            <a href="{{ route('movie.details', ['name' => $trending->formatted_name]) }}"
                                class="text-gray-800 hover:text-gray-700 font-semibold dark:text-white lg:text-xs text-sm truncate dark:hover:text-slate-300"
                                wire:navigate><span class="">{{ $trending->name }}
                                    ({{ $trending->release_year }})
                                </span></a>
                            <span
                                class="text-gray-800 font-semibold dark:text-white lg:text-xs text-sm flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="size-3 fill-yellow-400">
                                    <path fill-rule="evenodd"
                                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ $trending->vote_count }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>

            @if (count($trending_movies) >= 12)
                <div class="mx-auto text-center">
                    <a href="{{ route('trending.movies') }}"
                        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                        wire:navigate>
                        Show more
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </a>
                </div>
            @else
            @endif
        </div>
    </div>
    <!-- End Content -->

    <hr class="border-0 h-0.5 dark:bg-slate-800 bg-slate-300">

    <!-- Content -->
    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 my-10">
            <!-- your content goes here ... -->
            <h1 class="text-gray-800 dark:text-white lg:text-3xl text-2xl font-semibold">Trending
                Series
            </h1>

            <div class="grid xl:grid-cols-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 grid-cols-2 gap-y-5 gap-4">
                @foreach ($trending_series as $trending_serie)
                    <div class="w-full">
                        <a href="{{ route('movie.details', ['name' => $trending_serie->formatted_name]) }}"
                            wire:navigate><img src="{{ asset('storage/images/' . $trending_serie->poster_path) }}"
                                alt=""
                                class="rounded-lg dark:border-slate-700 lg:hover:scale-105 duration-200 w-full border-slate-100"></a>

                        <div class="flex justify-between mt-2 gap-4">
                            <a href="{{ route('movie.details', ['name' => $trending_serie->formatted_name]) }}"
                                class="text-gray-800 hover:text-gray-700 font-semibold dark:text-white lg:text-xs text-sm truncate dark:hover:text-slate-300"
                                wire:navigate><span class="">{{ $trending_serie->name }}
                                    ({{ $trending_serie->release_year }})
                                </span></a>
                            <span
                                class="text-gray-800 font-semibold dark:text-white lg:text-xs text-sm flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="size-3 fill-yellow-400">
                                    <path fill-rule="evenodd"
                                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ $trending_serie->vote_count }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>

            @if (count($trending_series) >= 12)
                <div class="mx-auto text-center">
                    <a href="{{ route('trending.series') }}"
                        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                        wire:navigate>
                        Show more
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </a>
                </div>
            @else
            @endif
        </div>
    </div>
    <!-- End Content -->
</div>
