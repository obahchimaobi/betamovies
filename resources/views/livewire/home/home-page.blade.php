<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <hr class="border-0 h-0.5 dark:bg-slate-700 bg-slate-300">

    <!-- Content -->
    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 my-10">
            <!-- your content goes here ... -->
            <h1 class="text-gray-800 dark:text-white lg:text-3xl text-2xl font-semibold">New Releases
            </h1>

            <div class="grid xl:grid-cols-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 grid-cols-2 gap-4">
                @if ($merge)
                    @foreach ($merge as $movies)
                        <div class="w-full">
                            <a href="{{ route('movie.details', ['name' => $movies->formatted_name]) }}"
                                wire:navigate><img src="{{ asset('storage/images/' . $movies->poster_path) }}"
                                    alt=""
                                    class="rounded-lg border dark:border-slate-700 lg:hover:scale-105 duration-200 w-full border-slate-100"></a>

                            <div class="flex justify-between mt-2 gap-4">
                                <a href="{{ route('movie.details', ['name' => $movies->formatted_name]) }}"
                                    class="text-gray-800 hover:text-gray-700 font-semibold dark:text-white lg:text-xs text-sm truncate dark:hover:text-slate-300"
                                    wire:navigate><span class="">{{ $movies->name }}
                                        ({{ $movies->release_year }})
                                    </span></a>
                                <span
                                    class="text-gray-800 font-semibold dark:text-white lg:text-xs text-sm">{{ $movies->type }}</span>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            @if (count($merge) >= 24)
                <div class="mx-auto text-center">
                    <a href="{{ route('new.releases') }}"
                        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" wire:navigate>
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

    <hr class="border-0 h-0.5 dark:bg-slate-700 bg-slate-300">

    <!-- Content -->
    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 my-10">
            <!-- your content goes here ... -->
            <h1 class="text-gray-800 dark:text-white lg:text-3xl text-2xl font-semibold">Trending Movies
            </h1>

            <div class="grid xl:grid-cols-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 grid-cols-2 gap-4">
                @foreach ($trending_movies as $trending)
                    <div class="w-full">
                        <a href="{{ route('movie.details', ['name'=>$trending->formatted_name]) }}" wire:navigate><img
                                src="{{ asset('storage/images/' . $trending->poster_path) }}"
                                alt=""
                                class="rounded-lg border dark:border-slate-700 lg:hover:scale-105 duration-200 w-full border-slate-100"></a>

                        <div class="flex justify-between mt-2 gap-4">
                            <a href="{{ route('movie.details', ['name'=>$trending->formatted_name]) }}"
                                class="text-gray-800 hover:text-gray-700 font-semibold dark:text-white lg:text-xs text-sm truncate dark:hover:text-slate-300"
                                wire:navigate><span class="">{{ $trending->name }} ({{ $trending->release_year }})</span></a>
                            <span class="text-gray-800 font-semibold dark:text-white lg:text-xs text-sms">8.1</span>
                        </div>
                    </div>
                @endforeach
            </div>

            @if (count($trending_movies) >= 12)
                <div class="mx-auto text-center">
                    <a href="{{ route('trending.movies') }}"
                        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" wire:navigate>
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

    <hr class="border-0 h-0.5 dark:bg-slate-700 bg-slate-300">

    <!-- Content -->
    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 my-10">
            <!-- your content goes here ... -->
            <h1 class="text-gray-800 dark:text-white lg:text-3xl text-2xl font-semibold">Trending
                Series
            </h1>

            <div class="grid xl:grid-cols-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 grid-cols-2 gap-4">
                @foreach ($trending_series as $trending_serie)
                    <div class="w-full">
                        <a href="{{ route('movie.details', ['name'=>$trending_serie->formatted_name]) }}" wire:navigate><img
                                src="{{ asset('storage/images/' . $trending_serie->poster_path) }}"
                                alt=""
                                class="rounded-lg border dark:border-slate-700 lg:hover:scale-105 duration-200 w-full border-slate-100"></a>

                        <div class="flex justify-between mt-2 gap-4">
                            <a href="{{ route('movie.details', ['name'=>$trending_serie->formatted_name]) }}"
                                class="text-gray-800 hover:text-gray-700 font-semibold dark:text-white lg:text-xs text-sm truncate dark:hover:text-slate-300"
                                wire:navigate><span class="">{{ $trending_serie->name }} ({{ $trending_serie->release_year }})</span></a>
                            <span class="text-gray-800 font-semibold dark:text-white lg:text-xs text-sms">8.1</span>
                        </div>
                    </div>
                @endforeach
            </div>

            @if (count($trending_series) >= 12)
                <div class="mx-auto text-center">
                    <a href="{{ route('trending.series') }}"
                        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" wire:navigate>
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
