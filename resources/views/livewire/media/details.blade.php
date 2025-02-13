<div>
    {{-- Be like water. --}}


    @foreach ($all as $item)
        @section('title')
            Download {{ $item->name }} ({{ $item->release_year }}) For Free | {{ config('app.name') }}
        @endsection

        @section('meta_description')
            {{ $item->name }}: {{ $item->overview }}
        @endsection

        @section('og_title')
            {{ $item->name }} ({{ $item->release_year }})
        @endsection

        @section('og_image')
            {{ asset('storage/images/' . $item->poster_path) }}
        @endsection

        @section('og_description')
            Download {{ $item->name }} ({{ $item->release_year }}) from {{ config('app.name') }} for free
        @endsection

        @section('og_url')
            {{ Request::url() }}
        @endsection
    @endforeach

    @section('content')
        <div>

            <!-- Content -->
            <div class="w-full lg:ps-64">
                <div class="space-y-4 sm:space-y-6">
                    <!-- your content goes here ... -->
                    @foreach ($all as $item)
                        @if (isset($item))
                            @if ($item->type == 'movie')
                                <div class="w-full relative bg-center bg-no-repeat bg-fixed bg-cover border-b-2 border-slate-400 dark:border-slate-700"
                                    style="background-image: url('{{ $item->backdrop_cloudinary_url }}')">
                                    <div class="absolute inset-0 dark:bg-black bg-white opacity-90"></div>
                                    <div class="relative mx-auto py-5">

                                        <div class="container mx-auto text-center mt-20 mb-20 w-11/12">

                                            <h1
                                                class="dark:text-gray-300 text-slate-800 uppercase text-3xl xl:text-4xl font-bold tracking-wider mt-7 font-keania">
                                                Download {{ $item->name }} For Free</h1>
                                            <ul class="flex flex-wrap gap-4 mt-10 text-white justify-center font-semibold">
                                                <li class="flex items-center space-x-1">

                                                    <span
                                                        class="dark:text-gray-300 text-slate-700 text-sm flex items-center gap-1"><svg
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="size-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                        </svg>
                                                        {{ $item->vote_count }}</span>
                                                </li>

                                                <li class="-my-3 dark:text-gray-300 text-slate-700 text-2xl">
                                                    <strong>.</strong>
                                                </li>
                                                <li
                                                    class="dark:text-gray-300 text-slate-700 text-sm flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                                    </svg>
                                                    {{ $item->release_year }}
                                                </li>

                                                <li class="-my-3 dark:text-gray-300 text-slate-700 text-2xl">
                                                    <strong>.</strong>
                                                </li>
                                                <li
                                                    class="dark:text-gray-300 text-slate-700 text-sm flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m10.5 21 5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 0 1 6-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 0 1-3.827-5.802" />
                                                    </svg>
                                                    {{ $item->language }}
                                                </li>

                                                <li class="-my-3 dark:text-gray-300 text-slate-700 text-2xl">
                                                    <strong>.</strong>
                                                </li>
                                                <li
                                                    class="dark:text-gray-300 text-slate-700 text-sm flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 0 1-1.161.886l-.143.048a1.107 1.107 0 0 0-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 0 1-1.652.928l-.679-.906a1.125 1.125 0 0 0-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 0 0-8.862 12.872M12.75 3.031a9 9 0 0 1 6.69 14.036m0 0-.177-.529A2.25 2.25 0 0 0 17.128 15H16.5l-.324-.324a1.453 1.453 0 0 0-2.328.377l-.036.073a1.586 1.586 0 0 1-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 0 1-5.276 3.67m0 0a9 9 0 0 1-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                                                    </svg>
                                                    {{ $item->country }}
                                                </li>

                                                <li class="-my-3 dark:text-gray-300 text-slate-700 text-2xl">
                                                    <strong>.</strong>
                                                </li>
                                                <li
                                                    class="dark:text-gray-300 text-slate-700 text-sm flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-4 shrink-0">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                    {{ $item->runtime }}
                                                </li>
                                            </ul>

                                            <ul class="flex gap-4 mt-10 text-white justify-center">
                                                <li class="text-gray-300">
                                                    @php
                                                        $genres = $item->genres ? explode(', ', $item->genres) : []; // Default to an empty array if no genres
                                                    @endphp

                                                    @if (count($genres) > 0)
                                                        @foreach ($genres as $genre)
                                                            <a href="{{ route('genre', ['genre' => Str::lower(trim($genre))]) }}"
                                                                wire:navigate>
                                                                <span
                                                                    class="text-xs border border-slate-500 dark:border-slate-700 px-5 py-2 rounded-full dark:hover:bg-slate-700 hover:bg-slate-500 font-bold dark:text-slate-400 dark:hover:text-slate-200 cursor-pointer mr-1.5 focus:bg-slate-500 dark:focus:bg-slate-700 text-slate-600 hover:text-slate-200">
                                                                    {{ trim($genre) }}
                                                                </span>
                                                            </a>
                                                        @endforeach
                                                    @else
                                                        <span class="text-xs italic text-gray-500 dark:text-gray-400">No
                                                            genres available</span>
                                                    @endif
                                                </li>

                                            </ul>

                                            <p class="dark:text-gray-300 text-slate-700 mt-9 leading-relaxed text-sm">
                                                {{ $item->overview }}
                                            </p>

                                            <ul class="flex flex-wrap gap-2 mt-5 justify-center items-center">
                                                <li class="bg-blue-600 text-white px-6 py-3 rounded-full uppercase text-xs  hover:cursor-pointer hover:bg-blue-700 duration-200"
                                                    aria-haspopup="dialog" aria-expanded="false"
                                                    aria-controls="hs-full-screen-modal"
                                                    data-hs-overlay="#hs-full-screen-modal">
                                                    <i class="fa fa-play pr-1" aria-hidden="true"></i> <button
                                                        class="uppercase">Trailer</button>
                                                </li>
                                                @if (is_null($item->download_url) || empty($item->download_url))
                                                    <li
                                                        class="bg-blue-800 text-white/60 px-6 py-3 rounded-full uppercase text-xs  duration-200 hover:cursor-not-allowed">
                                                        <i class="fa-solid fa-download hover:cursor-not-allowed"></i>
                                                        <button class="uppercase hover:cursor-not-allowed" disabled>Coming
                                                            Soon
                                                        </button>
                                                    </li>
                                                @else
                                                    <a href="{{ route('download.movie', ['name' => $item->formatted_name]) }}"
                                                        class="bg-blue-600 text-white px-6 py-3 rounded-full uppercase text-xs  hover:cursor-pointer hover:bg-blue-700 duration-200">
                                                        <i class="fa-solid fa-download"></i> <button
                                                            class="uppercase">Download
                                                        </button>
                                                    </a>
                                                @endif
                                                <livewire:watch-list :movieId="$item->id" :movie_name="$item->name" :genres="$item->genres"
                                                    :formatted_name="$item->formatted_name" :poster_path="$item->poster_path" />
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @else
                            {{ abort(404, 'Not Found') }}
                        @endif

                        @if (isset($item))
                            @if ($item->type == 'series')
                                <div class="w-full relative bg-center bg-fixed bg-no-repeat bg-cover border-b-2 border-slate-400 dark:border-slate-700"
                                    style="background-image: url('{{ asset('storage/backdrop/' . $item->backdrop_path) }}')">
                                    <div class="absolute inset-0 dark:bg-black bg-white/90 opacity-95"></div>
                                    <div class="mx-auto py-5 relative">

                                        <div class="container mx-auto text-center mt-20 mb-20 w-11/12">

                                            <h1
                                                class="dark:text-gray-300 text-slate-800 uppercase text-3xl xl:text-4xl font-bold tracking-wider mt-7 font-keania">
                                                Download {{ $item->name }} For Free</h1>
                                                <ul class="flex flex-wrap gap-4 mt-10 text-white justify-center font-semibold">
                                                    <li class="flex items-center space-x-1">

                                                        <span
                                                            class="dark:text-gray-300 text-slate-700 text-sm flex items-center gap-1"><svg
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                                class="size-4">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                            </svg>
                                                            {{ $item->vote_count }}</span>
                                                    </li>

                                                    <li class="-my-3 dark:text-gray-300 text-slate-700 text-2xl">
                                                        <strong>.</strong>
                                                    </li>
                                                    <li
                                                        class="dark:text-gray-300 text-slate-700 text-sm flex items-center gap-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="size-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                                        </svg>
                                                        {{ $item->release_year }}
                                                    </li>

                                                    <li class="-my-3 dark:text-gray-300 text-slate-700 text-2xl">
                                                        <strong>.</strong>
                                                    </li>
                                                    <li
                                                        class="dark:text-gray-300 text-slate-700 text-sm flex items-center gap-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="size-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m10.5 21 5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 0 1 6-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 0 1-3.827-5.802" />
                                                        </svg>
                                                        {{ $item->language }}
                                                    </li>

                                                    <li class="-my-3 dark:text-gray-300 text-slate-700 text-2xl">
                                                        <strong>.</strong>
                                                    </li>
                                                    <li
                                                        class="dark:text-gray-300 text-slate-700 text-sm flex items-center gap-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="size-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 0 1-1.161.886l-.143.048a1.107 1.107 0 0 0-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 0 1-1.652.928l-.679-.906a1.125 1.125 0 0 0-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 0 0-8.862 12.872M12.75 3.031a9 9 0 0 1 6.69 14.036m0 0-.177-.529A2.25 2.25 0 0 0 17.128 15H16.5l-.324-.324a1.453 1.453 0 0 0-2.328.377l-.036.073a1.586 1.586 0 0 1-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 0 1-5.276 3.67m0 0a9 9 0 0 1-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                                                        </svg>
                                                        {{ $item->country }}
                                                    </li>
                                                </ul>

                                            <ul class="flex gap-4 mt-10 text-white justify-center">
                                                <li class="text-gray-300">
                                                    @php
                                                        $genres = explode(', ', $item->genres);
                                                    @endphp

                                                    @foreach ($genres as $genre)
                                                        <a href="{{ route('genre', ['genre' => Str::lower($genre)]) }}"
                                                            wire:navigate><span
                                                                class="text-xs border border-slate-500 dark:border-slate-800 px-5 py-2 rounded-full dark:hover:bg-slate-900 hover:bg-slate-500 font-bold dark:text-slate-400 dark:hover:text-slate-200 cursor-pointer mr-1 focus:bg-slate-500 dark:focus:bg-slate-700 text-slate-600 hover:text-slate-200">{{ trim($genre) }}</span>
                                                        </a>
                                                    @endforeach
                                                </li>
                                            </ul>

                                            <p class="dark:text-gray-300 text-slate-700 mt-9 leading-relaxed text-sm">
                                                {{ $item->overview }}
                                            </p>

                                            <ul class="flex flex-wrap gap-2 mt-6 justify-center items-center">
                                                <li class="bg-blue-600 text-white px-6 py-3 rounded-full uppercase text-xs  hover:cursor-pointer hover:bg-blue-700 duration-200"
                                                    aria-haspopup="dialog" aria-expanded="false"
                                                    aria-controls="hs-full-screen-modal"
                                                    data-hs-overlay="#hs-full-screen-modal">
                                                    <i class="fa fa-play pr-1" aria-hidden="true"></i> <button
                                                        class="uppercase">Trailer</button>
                                                </li>
                                                <livewire:watch-list :movieId="$item->id" :movie_name="$item->name" :genres="$item->genres"
                                                    :formatted_name="$item->formatted_name" :poster_path="$item->poster_path" />
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @else
                            {{ abort(404, 'Not Found') }}
                        @endif
                    @endforeach
                </div>
            </div>
            <!-- End Content -->

            <div class="w-full lg:ps-64">
                <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 my-7">

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

                    @isset($item)
                        @if ($item->type == 'movie')
                            <div class="grid md:grid-cols-8 grid-cols-none gap-5">
                                <!-- First Element -->
                                <div class="col-span-12 sm:col-span-12 md:col-span-6 sm:gap-4">
                                    <h1 class="font-bold dark:text-white text-2xl pb-4">More Like This</h1>
                                    <div class="hs-accordion-group space-y-3">
                                        @foreach ($merged as $more)
                                            <div class="hs-accordion {{ $loop->first ? 'active' : '' }} bg-white border -mt-px rounded-lg dark:bg-slate-800 dark:border-slate-700"
                                                id="hs-bordered-heading-{{ $loop->index }}">
                                                <button title="Toggle details for {{ $more->name }}"
                                                    class="hs-accordion-toggle hs-accordion-active:text-blue-600 inline-flex items-center gap-x-3 w-full font-semibold text-start text-gray-800 py-4 px-5 hover:text-gray-500 disabled:opacity-50 disabled:pointer-events-none dark:hs-accordion-active:text-blue-500 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:outline-none dark:focus:text-neutral-400"
                                                    aria-expanded="true"
                                                    aria-controls="hs-basic-bordered-collapse-{{ $loop->index }}">
                                                    <svg class="hs-accordion-active:hidden block size-3.5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5v14"></path>
                                                    </svg>
                                                    <svg class="hs-accordion-active:block hidden size-3.5"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                    </svg>
                                                    {{ $more->name }}
                                                </button>
                                                <div id="hs-basic-bordered-collapse-{{ $loop->index }}"
                                                    class="hs-accordion-content {{ $loop->first ? '' : 'hidden' }} w-full overflow-hidden transition-[height] duration-300"
                                                    role="region" aria-labelledby="hs-bordered-heading-{{ $loop->index }}">
                                                    <div class="pb-4 px-5">
                                                        <hr class="border-0 h-[1px] bg-slate-200 dark:bg-slate-700 mb-5">
                                                        <div class="grid xl:grid-cols-9 items-center gap-10">
                                                            <div class="col-span-full sm:-mt-0 flex gap-4">
                                                                <img src="{{ asset('storage/images/' . $more->poster_path) }}"
                                                                    alt="{{ $more->name }} poster"
                                                                    class="xl:h-32 h-44 rounded-md" loading="lazy">
                                                                <h1 class="">
                                                                    <a href="{{ route('movie.details', ['name' => $more->formatted_name]) }}"
                                                                        class="text-slate-800 dark:text-white dark:hover:text-slate-200 text-base font-bold"
                                                                        wire:navigate>{{ $more->name }}</a>
                                                                    <br>
                                                                    <span
                                                                        class="dark:text-slate-300 text-sm xl:line-clamp-4 line-clamp-4">{{ $more->overview }}</span>
                                                                </h1>
                                                                <br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <hr class="border-0 h-0.5 dark:bg-slate-700 bg-slate-300 my-10">

                                    <section class="antialiased">
                                        <div class="mx-auto">
                                            <div class="flex justify-between items-center mb-6">
                                                <h2 class="text-xl lg:text-2xl font-bold text-gray-900 dark:text-white">
                                                    Comments
                                                    ({{ $all_comments }})
                                                </h2>
                                            </div>
                                            <livewire:comment-form :name="$item->formatted_name" :id="$item->movieId" />

                                            @foreach ($comments as $comment)
                                                <article class="p-6 text-base bg-gray-100 rounded-lg dark:bg-gray-800 mt-3">
                                                    <footer class="flex justify-between items-center mb-2">
                                                        <div class="flex items-center">
                                                            <p
                                                                class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                                                <img class="mr-2 w-6 h-6 rounded-full"
                                                                    src="{{ $comment->avatar ?? Avatar::create($comment->comment_name)->toGravatar() }}"
                                                                    alt="Michael Gough">{{ $comment->comment_name }}
                                                            </p>
                                                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate
                                                                    datetime="2022-02-08"
                                                                    title="February 8th, 2022">{{ $comment->created_at->diffForHumans() }}</time>
                                                            </p>
                                                        </div>
                                                    </footer>
                                                    <p class="text-gray-500 dark:text-gray-400">{{ $comment->comment }}</p>
                                                    <div class="mt-4">
                                                        <button type="button"
                                                            class="hs-collapse-toggle flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium"
                                                            id="hs-basic-collapse" aria-expanded="false"
                                                            aria-controls="hs-basic-collapse-heading"
                                                            data-hs-collapse="#hs-basic-collapse-heading-comment-{{ $comment->id }}">
                                                            <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 20 18">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                                            </svg>Reply
                                                        </button>
                                                        <div id="hs-basic-collapse-heading-comment-{{ $comment->id }}"
                                                            class="hs-collapse hidden w-full overflow-hidden transition-[height] duration-300"
                                                            aria-labelledby="hs-basic-collapse">
                                                            <div class="mt-5">
                                                                <div class="flex justify-between items-center mb-6">
                                                                    <h2
                                                                        class="text-base lg:text-xl font-bold text-gray-900 dark:text-white">
                                                                        Replies
                                                                    </h2>
                                                                </div>

                                                                <livewire:reply-form :id="$item->movieId" :name="$item->formatted_name"
                                                                    :comment_id="$comment->id" :comment_name="$comment->comment_name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>


                                                @foreach ($comment->replies as $reply)
                                                    <article
                                                        class="p-6 mb-3 ml-6 lg:ml-12 mt-3 text-base bg-gray-100 rounded-lg dark:bg-gray-800">
                                                        <footer class="flex justify-between items-center mb-2">
                                                            <div class="flex items-center">
                                                                <p
                                                                    class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                                                    <img class="mr-2 w-6 h-6 rounded-full"
                                                                        src="{{ $reply->avatar ?? Avatar::create($reply->reply_name)->toGravatar() }}"
                                                                        alt="Jese Leos">{{ $reply->reply_name }}
                                                                </p>
                                                                <p class="text-sm text-gray-600 dark:text-gray-400"><time
                                                                        pubdate datetime="2022-02-12"
                                                                        title="February 12th, 2022">{{ $reply->created_at->diffForHumans() }}</time>
                                                                </p>
                                                            </div>
                                                        </footer>
                                                        <p class="text-gray-500 dark:text-gray-400">{{ $reply->reply }}
                                                        </p>
                                                    </article>
                                                @endforeach
                                            @endforeach

                                        </div>
                                    </section>

                                </div>

                                <!-- Second Element -->
                                <div class="md:col-span-2 col-span-12">
                                    <hr class="border-0 h-0.5 dark:bg-slate-700 bg-slate-300 my-10 md:hidden">
                                    <h1 class="font-bold text-gray-800 dark:text-white text-xl">Recommended Shows
                                    </h1>

                                    <div class="grid md:grid-cols-2 sm:grid-cols-4 grid-cols-2 gap-4 mt-4">
                                        @isset($recom)
                                            @foreach ($recom as $recommended)
                                                <div class="w-full">
                                                    <a href="{{ route('movie.details', ['name' => $recommended->formatted_name]) }}"
                                                        wire:navigate>
                                                        <img src="{{ asset('storage/images/' . $recommended->poster_path) }}"
                                                            alt=""
                                                            class="rounded-lg border dark:border-slate-700 lg:hover:scale-105 duration-200 w-full border-slate-100">
                                                    </a>

                                                    <div class="flex justify-between mt-2 gap-10">
                                                        <a href="{{ route('movie.details', ['name' => $recommended->formatted_name]) }}"
                                                            class="text-gray-800 hover:text-gray-700 font-semibold dark:text-white lg:text-xs text-sm dark:hover:text-slate-300"
                                                            wire:navigate><span class="">{{ $recommended->name }}
                                                                ({{ $recommended->release_year }})
                                                            </span></a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endisset

                    @isset($item)
                        @if ($item->type == 'series')
                            <div class="grid md:grid-cols-8 grid-cols-none gap-5">
                                <!-- First Element -->
                                <div class="col-span-12 sm:col-span-12 md:col-span-6 sm:gap-4">
                                    <h1 class="font-bold dark:text-white text-slate-900 text-2xl pb-4">Seasons and Episodes
                                    </h1>
                                    <div class="hs-accordion-group space-y-3">
                                        @if (count($seasons) > 0)
                                            @php
                                                $groupedSeasons = $seasons->groupBy('season_number');
                                            @endphp

                                            @foreach ($groupedSeasons as $seasonNumber => $episodes)
                                                <div class="hs-accordion {{ $loop->first ? 'active' : '' }} bg-white border -mt-px rounded-lg dark:bg-slate-800 dark:border-slate-700"
                                                    id="hs-bordered-heading-{{ $loop->index }}}">
                                                    <button
                                                        class="hs-accordion-toggle hs-accordion-active:text-blue-600 inline-flex items-center gap-x-3 w-full font-semibold text-start text-gray-800 py-4 px-5 hover:text-gray-500 disabled:opacity-50 disabled:pointer-events-none dark:hs-accordion-active:text-blue-500 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:outline-none dark:focus:text-neutral-400"
                                                        aria-expanded="true"
                                                        aria-controls="hs-basic-bordered-collapse-{{ $loop->index }}">
                                                        <svg class="hs-accordion-active:hidden block size-3.5"
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M5 12h14"></path>
                                                            <path d="M12 5v14"></path>
                                                        </svg>
                                                        <svg class="hs-accordion-active:block hidden size-3.5"
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M5 12h14"></path>
                                                        </svg>
                                                        Season {{ $seasonNumber }} <span
                                                            class="text-sm">{{ $episodes->count() }}
                                                            Episodes</span>
                                                    </button>

                                                    <div id="hs-basic-bordered-collapse-{{ $loop->index }}"
                                                        class="hs-accordion-content {{ $loop->first ? '' : 'hidden' }} w-full overflow-hidden transition-[height] duration-300"
                                                        role="region"
                                                        aria-labelledby="hs-bordered-heading-{{ $loop->index }}">
                                                        @foreach ($episodes as $index => $episode)
                                                            <div class="pb-4 px-5">
                                                                <hr
                                                                    class="border-0 h-[1px] bg-slate-200 dark:bg-slate-700 mb-5">
                                                                <div class="grid xl:grid-cols-9 items-center gap-10">
                                                                    <div class="col-span-1">
                                                                        <h1
                                                                            class="text-end font-bold text-slate-800 dark:text-slate-200 md:text-2xl text-xl">
                                                                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                                                        </h1>
                                                                    </div>
                                                                    <div
                                                                        class="col-span-8 -mt-6 sm:-mt-0 flex gap-4 justify-between">
                                                                        <div class="flex gap-4">
                                                                            <img src="{{ asset('storage/uploads/' . $episode->poster_path) }}"
                                                                                alt="{{ $episode->title }}"
                                                                                class="xl:h-28 h-40 rounded-md">
                                                                            <h1 class="font-inter">
                                                                                <div class="flex justify-between items-center">
                                                                                    <a class="text-slate-800 dark:text-white dark:hover:text-slate-200 text-sm font-bold"
                                                                                        wire:navigate>
                                                                                        {{ $episode->episode_title ?? $episode->name . ' Season ' . $episode->season_number . ' Episode ' . $episode->episode_number }}
                                                                                    </a>
                                                                                </div>
                                                                                <br>
                                                                                <span
                                                                                    class="dark:text-slate-300 text-xs">{{ $episode->overview ? $episode->overview : 'No description available' }}

                                                                                    {{-- @if (empty($epsiode->overview))
                                                                                        <span class="dark:text-slate-400"><i>No description available</i></span>
                                                                                    @endif --}}
                                                                                </span>
                                                                            </h1>
                                                                        </div>

                                                                        @if (is_null($episode->download_url) || empty($episode->download_url))
                                                                        @else
                                                                            <a href="{{ route('download', ['name' => $episode->formatted_name, 'season' => $episode->season_number, 'episode' => $episode->episode_number]) }}"
                                                                                class="flex items-center bg-blue-600 hover:bg-blue-700 text-slate-100 font-bold px-2 py-1.5 rounded-md ml-2 h-9"><svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    fill="none" viewBox="0 0 24 24"
                                                                                    stroke-width="1.5" stroke="currentColor"
                                                                                    class="size-5">
                                                                                    <path stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                                                </svg>
                                                                            </a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>

                                    <hr class="border-0 h-0.5 dark:bg-slate-700 bg-slate-300 my-10">

                                    <section class="antialiased">
                                        <div class="mx-auto">
                                            <div class="flex justify-between items-center mb-6">
                                                <h2 class="text-xl lg:text-2xl font-bold text-gray-900 dark:text-white">
                                                    Comments
                                                    ({{ $all_comments }})
                                                </h2>
                                            </div>
                                            <livewire:comment-form :name="$item->formatted_name" :id="$item->movieId" />

                                            @foreach ($comments as $comment)
                                                <article class="p-6 text-base bg-gray-100 rounded-lg dark:bg-gray-800 mt-3">
                                                    <footer class="flex justify-between items-center mb-2">
                                                        <div class="flex items-center">
                                                            <p
                                                                class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                                                <img class="mr-2 w-6 h-6 rounded-full"
                                                                    src="{{ $comment->avatar ?? Avatar::create($comment->comment_name)->toGravatar() }}"
                                                                    alt="Michael Gough">{{ $comment->comment_name }}
                                                            </p>
                                                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate
                                                                    datetime="2022-02-08"
                                                                    title="February 8th, 2022">{{ $comment->created_at->diffForHumans() }}</time>
                                                            </p>
                                                        </div>
                                                    </footer>
                                                    <p class="text-gray-500 dark:text-gray-400">{{ $comment->comment }}</p>
                                                    <div class="mt-4">
                                                        <button type="button"
                                                            class="hs-collapse-toggle flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium"
                                                            id="hs-basic-collapse" aria-expanded="false"
                                                            aria-controls="hs-basic-collapse-heading"
                                                            data-hs-collapse="#hs-basic-collapse-heading-comment-{{ $comment->id }}">
                                                            <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 20 18">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                                            </svg>Reply
                                                        </button>
                                                        <div id="hs-basic-collapse-heading-comment-{{ $comment->id }}"
                                                            class="hs-collapse hidden w-full overflow-hidden transition-[height] duration-300"
                                                            aria-labelledby="hs-basic-collapse">
                                                            <div class="mt-5">
                                                                <div class="flex justify-between items-center mb-6">
                                                                    <h2
                                                                        class="text-base lg:text-xl font-bold text-gray-900 dark:text-white">
                                                                        Replies
                                                                    </h2>
                                                                </div>
                                                                <livewire:reply-form :id="$item->movieId" :name="$item->formatted_name"
                                                                    :comment_id="$comment->id" :comment_name="$comment->comment_name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>


                                                @foreach ($comment->replies as $reply)
                                                    <article
                                                        class="p-6 mb-3 ml-6 lg:ml-12 mt-3 text-base bg-gray-100 rounded-lg dark:bg-gray-800">
                                                        <footer class="flex justify-between items-center mb-2">
                                                            <div class="flex items-center">
                                                                <p
                                                                    class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                                                    <img class="mr-2 w-6 h-6 rounded-full"
                                                                        src="{{ $reply->avatar ?? Avatar::create($reply->reply_name)->toGravatar() }}"
                                                                        alt="Jese Leos">{{ $reply->reply_name }}
                                                                </p>
                                                                <p class="text-sm text-gray-600 dark:text-gray-400"><time
                                                                        pubdate datetime="2022-02-12"
                                                                        title="February 12th, 2022">{{ $reply->created_at->diffForHumans() }}</time>
                                                                </p>
                                                            </div>
                                                        </footer>
                                                        <p class="text-gray-500 dark:text-gray-400">{{ $reply->reply }}
                                                        </p>
                                                    </article>
                                                @endforeach
                                            @endforeach

                                        </div>
                                    </section>

                                </div>

                                <!-- Second Element -->
                                <div class="md:col-span-2 col-span-12">
                                    <hr class="border-0 h-0.5 dark:bg-slate-700 bg-slate-300 my-10 md:hidden">
                                    <h1 class="font-bold text-gray-900 dark:text-white text-xl">Recommended Shows
                                    </h1>

                                    <div class="grid lg:grid-cols-2 sm:grid-cols-4 grid-cols-2 gap-4 mt-4">
                                        @isset($recom)
                                            @foreach ($recom as $recommended)
                                                <div class="w-full">
                                                    <a href="{{ route('movie.details', ['name' => $recommended->formatted_name]) }}"
                                                        wire:navigate>
                                                        <img src="{{ asset('storage/images/' . $recommended->poster_path) }}"
                                                            alt=""
                                                            class="rounded-lg border dark:border-slate-700 lg:hover:scale-105 duration-200 w-full border-slate-100">
                                                    </a>

                                                    <div class="flex justify-between mt-2 gap-10">
                                                        <a href="{{ route('movie.details', ['name' => $recommended->formatted_name]) }}"
                                                            class="text-gray-800 hover:text-gray-700 font-semibold dark:text-white lg:text-xs text-sm dark:hover:text-slate-300"
                                                            wire:navigate><span class="">{{ $recommended->name }}
                                                                ({{ $recommended->release_year }})
                                                            </span></a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endisset
                </div>
            </div>

            @if (isset($item))
                <div id="hs-full-screen-modal"
                    class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none bg-white/60 backdrop-blur-lg dark:bg-neutral-900/60"
                    role="dialog" tabindex="-1" aria-labelledby="hs-full-screen-label">
                    <div
                        class="hs-overlay-open:mt-0 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-10 opacity-0 transition-all max-w-full max-h-full h-full">
                        <div class="flex flex-col pointer-events-auto max-w-full max-h-full h-full bg-transparent">
                            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                                <h3 id="hs-full-screen-label" class="font-bold text-gray-800 dark:text-white">

                                </h3>
                                <button type="button"
                                    class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-700 dark:hover:bg-neutral-600 dark:text-neutral-200"
                                    aria-label="Close" data-hs-overlay="#hs-full-screen-modal">
                                    <span class="sr-only">Close</span>
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 6 6 18"></path>
                                        <path d="m6 6 12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="overflow-y-auto">
                                <iframe class="w-full aspect-[16/9]" src="{{ $item->trailer_url }}"></iframe>
                                <div wire:loading>
                                    Loading trailer...
                                </div>
                            </div>
                            <div
                                class="flex justify-end items-center gap-x-2 py-3 px-4 mt-auto border-t dark:border-slate-700">
                                <button type="button"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:border-slate-800 dark:text-white dark:hover:bg-slate-700 dark:focus:bg-slate-700"
                                    data-hs-overlay="#hs-full-screen-modal">
                                    Close
                                </button>
                                @if ($item->type == 'series')
                                    {{-- Do Nothing --}}
                                @endif

                                @if ($item->type == 'movie')
                                    @if (!is_null($item->download_url))
                                        <a href="{{ route('download.movie', ['name' => $item->formatted_name]) }}"
                                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                            Download
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                            </svg>
                                        </a>
                                    @else
                                        <button type="button"
                                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                            disabled>
                                            Coming Soon
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                            </svg>
                                        </button>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @else
                {{ abort('404', 'Not Found') }}
            @endif
        </div>
    @endsection
</div>
