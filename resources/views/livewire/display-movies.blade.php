<div>
    {{-- Success is as dangerous as failure. --}}

    @section('title')
        Download the Best Movies For Free | {{ config('app.name') }}
    @endsection

    @section('meta_description')
        Browse a wide selection of movies on {{ config('app.name') }}. Download and watch the latest blockbusters and timeless classics today!
    @endsection

    @section('content')
        <!-- Content -->
        <div class="w-full lg:ps-64">
            <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 my-10">
                <!-- your content goes here ... -->
                <div class="flex items-center justify-between" id="movies">
                    <h1 class="text-black dark:text-white lg:text-3xl text-2xl font-semibold">Movies</h1>
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
                        <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-neutral-200"
                            aria-current="page">
                            Movies
                        </li>
                    </ol>
                </div>

                <livewire:media.show-movies lazy>
                    {{-- {{ $movies->appends(request()->query())->onEachSide(2)->links() }} --}}
            </div>
        </div>
        <!-- End Content -->
    @endsection
</div>
