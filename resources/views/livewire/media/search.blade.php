

<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    @section('title')
        Search Movies and TV Series | {{ config('app.name') }}
    @endsection
    
    @section('content')

            <!-- Content -->
            <div class="w-full lg:ps-64">
                <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 my-10">
                    <!-- your content goes here ... -->
                    <div class="flex items-center justify-between">
                        <h1 class="text-black dark:text-white lg:text-3xl text-2xl font-semibold">Search</h1>
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
                            <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-neutral-200"
                                aria-current="page">
                                Search
                            </li>
                        </ol>
                    </div>

                    
                        {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
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
                                {{ $paginatedResults->links(data: ['scrollTo' => false]) }}
                            </div>
                        @else
                            <div class="text-center">
                                <p class="text-center text-2xl text-slate-800 dark:text-slate-200 font-semibold mt-20 mb-6">No result found</p>
                                <a href="https://wa.me/2349133381269?text=Hello%20BetaMovies,%20I%20would%20like%20to%20request%20the%20movie%20titled%20{{ $query }}" class="text-blue-600 underline font-semibold">Request it</a>
                            </div>
                        @endif
                    
                </div>
            </div>
            <!-- End Content -->
    @endsection
</div>