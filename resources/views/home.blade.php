@extends('layouts.app')

@section('content')
    <div>

        <!-- Content -->
        <div class="w-full lg:ps-64">
            <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
                <!-- your content goes here ... -->
                <!-- Hero -->
                <div class="relative overflow-hidden">
                    <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-24">
                        <div class="text-center">
                            <h1 class="text-4xl sm:text-6xl font-bold text-gray-800 dark:text-neutral-200">
                                Search
                            </h1>

                            <p class="mt-3 text-gray-600 text-sm lg:text-base dark:text-neutral-400">
                                Search for movies, series, and stories that captivate
                            </p>

                            <div class="mt-7 sm:mt-12 mx-auto max-w-xl relative">
                                <!-- Form -->
                                <form>
                                    <div
                                        class="relative z-10 flex gap-x-3 p-2 bg-white border rounded-lg shadow-lg shadow-gray-100 dark:bg-slate-800 dark:border-slate-700 dark:shadow-gray-900/20">
                                        <div class="w-full">
                                            <label for="hs-search-article-1"
                                                class="block text-sm text-gray-700 font-medium dark:text-white"><span
                                                    class="sr-only">Search article</span></label>
                                            <input type="email" name="hs-search-article-1" id="hs-search-article-1"
                                                class="py-2.5 px-4 block w-full border-transparent rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-800 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-400 dark:focus:ring-slate-600 dark:focus:outline-none"
                                                placeholder="Search article" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-basic-modal"
                                                data-hs-overlay="#hs-basic-modal">
                                        </div>
                                        <div>
                                            <a class="size-[46px] inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                                href="#">
                                                <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <circle cx="11" cy="11" r="8" />
                                                    <path d="m21 21-4.3-4.3" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                                <!-- End Form -->

                                <!-- SVG Element -->
                                <div class="hidden md:block absolute top-0 end-0 -translate-y-12 translate-x-20">
                                    <svg class="w-16 h-auto text-orange-500" width="121" height="135"
                                        viewBox="0 0 121 135" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 16.4754C11.7688 27.4499 21.2452 57.3224 5 89.0164" stroke="currentColor"
                                            stroke-width="10" stroke-linecap="round" />
                                        <path d="M33.6761 112.104C44.6984 98.1239 74.2618 57.6776 83.4821 5"
                                            stroke="currentColor" stroke-width="10" stroke-linecap="round" />
                                        <path d="M50.5525 130C68.2064 127.495 110.731 117.541 116 78.0874"
                                            stroke="currentColor" stroke-width="10" stroke-linecap="round" />
                                    </svg>
                                </div>
                                <!-- End SVG Element -->

                                <!-- SVG Element -->
                                <div class="hidden md:block absolute bottom-0 start-0 translate-y-10 -translate-x-32">
                                    <svg class="w-40 h-auto text-cyan-500" width="347" height="188"
                                        viewBox="0 0 347 188" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4 82.4591C54.7956 92.8751 30.9771 162.782 68.2065 181.385C112.642 203.59 127.943 78.57 122.161 25.5053C120.504 2.2376 93.4028 -8.11128 89.7468 25.5053C85.8633 61.2125 130.186 199.678 180.982 146.248L214.898 107.02C224.322 95.4118 242.9 79.2851 258.6 107.02C274.299 134.754 299.315 125.589 309.861 117.539L343 93.4426"
                                            stroke="currentColor" stroke-width="7" stroke-linecap="round" />
                                    </svg>
                                </div>
                                <!-- End SVG Element -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Hero -->
            </div>
        </div>
        <!-- End Content -->

        <hr class="border-0 h-0.5 dark:bg-slate-700 bg-slate-300">

        <!-- Content -->
        <div class="w-full lg:ps-64">
            <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 my-10">
                <!-- your content goes here ... -->
                <h1 class="text-gray-800 dark:text-white lg:text-3xl text-2xl font-semibold font-roboto">New Releases</h1>

                <div class="grid xl:grid-cols-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 grid-cols-2 gap-4">
                    @if ($merge)
                        @foreach ($merge as $movies)
                            <div class="w-full">
                                <a href="{{ route('movie.details', ['name' => $movies->formatted_name]) }}" wire:navigate><img
                                        src="{{ asset('storage/images/' . $movies->poster_path) }}" alt=""
                                        class="rounded-lg border dark:border-slate-700 lg:hover:scale-105 duration-200 w-full border-slate-100"></a>

                                <div class="flex justify-between mt-2 gap-4">
                                    <a href="{{ route('movie.details', ['name' => $movies->formatted_name]) }}"
                                        class="text-gray-800 hover:text-gray-700 font-semibold dark:text-white lg:text-xs text-sm truncate dark:hover:text-slate-300"
                                        wire:navigate><span class="">{{ $movies->name }}
                                            ({{ $movies->release_year }})</span></a>
                                    <span
                                        class="text-gray-800 font-semibold dark:text-white lg:text-xs text-sm">{{ $movies->type }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="mx-auto text-center">
                    <button type="button"
                        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Show more
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                </div>
            </div>
        </div>
        <!-- End Content -->

        <hr class="border-0 h-0.5 dark:bg-slate-700 bg-slate-300">

        <!-- Content -->
        <div class="w-full lg:ps-64">
            <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 my-10">
                <!-- your content goes here ... -->
                <h1 class="text-gray-800 dark:text-white lg:text-3xl text-2xl font-semibold font-roboto">Trending Movies
                </h1>

                <div class="grid xl:grid-cols-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 grid-cols-2 gap-4">
                    <div class="w-full">
                        <a href="" wire:navigate><img
                                src="https://nkiri.com/wp-content/uploads/2024/12/a-christmas-well-traveled-hollywood-movie-200x300.jpg"
                                alt=""
                                class="rounded-lg border dark:border-slate-700 lg:hover:scale-105 duration-200 w-full border-slate-100"></a>

                        <div class="flex justify-between mt-2 gap-10">
                            <a href=""
                                class="text-gray-800 hover:text-gray-700 font-semibold dark:text-white lg:text-xs text-sm truncate dark:hover:text-slate-300"
                                wire:navigate><span class="">HitPig (2024)</span></a>
                            <span class="text-gray-800 font-semibold dark:text-white lg:text-xs text-sms">8.1</span>
                        </div>
                    </div>
                </div>

                <div class="mx-auto text-center">
                    <button type="button"
                        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Show more
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                </div>
            </div>
        </div>
        <!-- End Content -->

        <hr class="border-0 h-0.5 dark:bg-slate-700 bg-slate-300">

        <!-- Content -->
        <div class="w-full lg:ps-64">
            <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 my-10">
                <!-- your content goes here ... -->
                <h1 class="text-gray-800 dark:text-white lg:text-3xl text-2xl font-semibold font-roboto">Trending Series
                </h1>

                <div class="grid xl:grid-cols-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 grid-cols-2 gap-4">
                    <div class="w-full">
                        <a href="" wire:navigate><img
                                src="https://nkiri.com/wp-content/uploads/2024/11/hitpig-hollywood-movie-200x300.jpg"
                                alt=""
                                class="rounded-lg border dark:border-slate-700 lg:hover:scale-105 duration-200 w-full border-slate-100"></a>

                        <div class="flex justify-between mt-2 gap-10">
                            <a href=""
                                class="text-gray-800 hover:text-gray-700 font-semibold dark:text-white lg:text-xs text-sm truncate dark:hover:text-slate-300"
                                wire:navigate><span class="">HitPig (2024)</span></a>
                            <span class="text-gray-800 font-semibold dark:text-white lg:text-xs text-sms">8.1</span>
                        </div>
                    </div>
                </div>

                <div class="mx-auto text-center">
                    <button type="button"
                        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Show more
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                </div>
            </div>
        </div>
        <!-- End Content -->
    </div>
@endsection
