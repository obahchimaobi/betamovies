<div>
    {{-- Stop trying to control. --}}
    @section('content')
        <div>
            <!-- Content -->
            <div class="w-full lg:ps-64">
                <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
                    <!-- your content goes here ... -->


                    @if (session()->has('error'))
                        <!-- Toast -->
                        <div id="dismiss-toast"
                            class="fixed top-2 right-2 z-50 hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 max-w-xs bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-slate-800 dark:border-slate-700"
                            role="alert" tabindex="-1" aria-labelledby="hs-toast-dismiss-button-label">
                            <div class="flex p-4 gap-2">
                                <div class="shrink-0">
                                    <svg class="shrink-0 size-4 text-red-500 mt-0.5" xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z">
                                        </path>
                                    </svg>
                                </div>
                                <p id="hs-toast-dismiss-button-label" class="text-sm text-gray-700 dark:text-slate-200">
                                    {{ session('error') }}
                                </p>
                            </div>
                        </div>
                        <!-- End Toast -->
                    @endif

                    @if (session()->has('success'))
                        <!-- Toast -->
                        <div id="dismiss-toast"
                            class="fixed top-2 right-2 z-50 hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 max-w-xs bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-slate-800 dark:border-slate-700"
                            role="alert" tabindex="-1" aria-labelledby="hs-toast-dismiss-button-label">
                            <div class="flex p-4 gap-2">
                                <div class="shrink-0">
                                    <svg class="shrink-0 size-4 text-teal-500 mt-0.5" xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z">
                                        </path>
                                    </svg>
                                </div>
                                <p id="hs-toast-dismiss-button-label" class="text-sm text-gray-700 dark:text-slate-200">
                                    {{ session('success') }}
                                </p>
                            </div>
                        </div>
                        <!-- End Toast -->
                    @endif

                    <!-- Hero -->
                    <div class="relative overflow-hidden">
                        <div class="max-w-[85rem] mx-auto py-10 sm:py-24">
                            <div class="text-center">
                                <h1 class="text-4xl sm:text-6xl font-bold text-gray-800 dark:text-slate-200">
                                    Search
                                </h1>

                                <p class="mt-3 text-gray-600 text-sm lg:text-base dark:text-slate-400">
                                    Search for movies, series, and stories that captivate
                                </p>

                                <div class="mt-7 sm:mt-12 mx-auto max-w-xl relative">
                                    <!-- Form -->
                                    <form action="{{ route('search') }}" method="get">
                                        <div
                                            class="relative z-10 flex gap-x-3 p-2 bg-white border rounded-lg shadow-lg shadow-gray-100 dark:bg-slate-800 dark:border-slate-700 dark:shadow-gray-900/20 hover:cursor-pointer">
                                            <div class="w-full hover:cursor-pointer">
                                                <label for="hs-search-article-1"
                                                    class="block text-sm text-gray-700 font-medium dark:text-white"><span
                                                        class="sr-only">Search article</span></label>
                                                <input type="text" name="search" id="hs-search-article-1"
                                                    class="py-2.5 px-4 block w-full border-transparent rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-800 dark:border-transparent dark:text-slate-400 dark:placeholder-slate-400 dark:focus:ring-slate-600 dark:focus:outline-none"
                                                    required placeholder="Search movies and TV series" wire:model='searchBar'>
                                            </div>
                                            <div>
                                                <button type="submit"
                                                    class="size-[46px] inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                                    href="#">
                                                    <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <circle cx="11" cy="11" r="8" />
                                                        <path d="m21 21-4.3-4.3" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- End Form -->

                                    <!-- SVG Element -->
                                    <div class="hidden md:block absolute top-0 end-0 -translate-y-12 translate-x-20">
                                        <svg class="w-16 h-auto text-orange-500" width="121" height="135"
                                            viewBox="0 0 121 135" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 16.4754C11.7688 27.4499 21.2452 57.3224 5 89.0164"
                                                stroke="currentColor" stroke-width="10" stroke-linecap="round" />
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

            <livewire:home.home-page lazy>
        </div>
    @endsection
</div>
