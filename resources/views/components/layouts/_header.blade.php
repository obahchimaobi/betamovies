<!-- ========== HEADER ========== -->

<!-- Toast -->
<div id="dismiss-toast"
    class="fixed top-2 right-2 z-50 hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 max-w-xs bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-slate-800 dark:border-slate-700"
    role="alert" tabindex="-1" aria-labelledby="hs-toast-dismiss-button-label" wire:offline>
    <div class="flex p-4 gap-2">
        <div class="shrink-0">
            <svg class="shrink-0 size-4 text-blue-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16"
                height="16" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z">
                </path>
            </svg>
        </div>
        <p id="hs-toast-dismiss-button-label" class="text-sm text-gray-700 dark:text-slate-200">
            Whoops, your device has lost connection. The web page you are viewing is offline.
        </p>
    </div>
</div>
<!-- End Toast -->

<header
    class="sticky top-0 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-[48] w-full bg-white border-b text-sm py-2.5 lg:ps-[260px] dark:bg-slate-900 dark:border-slate-800">
    <nav class="px-4 sm:px-6 flex basis-full items-center w-full mx-auto">
        <div class="me-5 lg:me-0 lg:hidden">
            <!-- Logo -->
            <a class="flex-none rounded-md text-xl inline-block font-semibold focus:outline-none focus:opacity-80"
                href="#" aria-label="Preline">
                <img src="{{ asset('icons/betamovies.png') }}" alt="" class="h-12 w-80">
            </a>
            <!-- End Logo -->
        </div>

        <div class="w-full flex items-center justify-end ms-auto md:justify-between gap-x-1 md:gap-x-3">

            <div class="hidden md:block">
                <!-- Search Input -->
                <div class="relative">

                </div>
                <!-- End Search Input -->
            </div>

            <div class="flex flex-row items-center justify-end gap-1">
                {{-- <button type="button"
                class="md:hidden size-[38px] relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.3-4.3" />
                </svg>
                <span class="sr-only">Search</span>
            </button> --}}


                <button type="button"
                    class="hs-dark-mode hs-dark-mode-active:hidden inline-flex items-center gap-x-2 py-2 px-2 bg-slate-200 rounded-full text-sm text-neutral-700 hover:bg-slate-300 focus:outline-none"
                    data-hs-theme-click-value="dark">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path>
                    </svg>

                </button>
                <button type="button"
                    class="hs-dark-mode hs-dark-mode-active:inline-flex hidden items-center gap-x-2 py-2 px-2 bg-white/10 rounded-full text-sm text-white hover:bg-white/20 focus:outline-none focus:bg-white/20"
                    data-hs-theme-click-value="light">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="4"></circle>
                        <path d="M12 2v2"></path>
                        <path d="M12 20v2"></path>
                        <path d="m4.93 4.93 1.41 1.41"></path>
                        <path d="m17.66 17.66 1.41 1.41"></path>
                        <path d="M2 12h2"></path>
                        <path d="M20 12h2"></path>
                        <path d="m6.34 17.66-1.41 1.41"></path>
                        <path d="m19.07 4.93-1.41 1.41"></path>
                    </svg>

                </button>

                <button type="button"
                    class="size-[38px] relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-slate-700 dark:focus:bg-slate-700" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-basic-modal"
                    data-hs-overlay="#hs-basic-modal">
                    <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.3-4.3" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>

                {{-- @auth
                    <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                        <button id="hs-dropdown-account" type="button"
                            class="size-[38px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 focus:outline-none disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-slate-800 dark:focus:bg-slate-800 relative"
                            aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">

                            <!-- Notification Icon -->
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
                                <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
                            </svg>

                            <!-- Notification Badge (Red Dot) -->
                            <span class="flex absolute top-1 end-2 size-3 -mt-1.5 -me-1.5">
                                <span class="animate-ping absolute inline-flex size-full rounded-full bg-red-400 opacity-75 dark:bg-red-600"></span>
                                <span class="relative inline-flex rounded-full size-3 bg-red-500"></span>
                              </span>

                            <span class="sr-only">Notifications</span>
                        </button>


                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 dark:bg-slate-800 dark:border dark:border-slate-700 dark:divide-slate-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
                            role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-account">
                            <div class="py-3 px-5 bg-gray-100 rounded-t-lg dark:bg-slate-700">
                                <p class="text-sm text-gray-500 dark:text-slate-400">You are subscribed to</p>
                                <p class="text-sm font-medium text-gray-800 dark:text-neutral-200">
                                    New Movies Alerts
                                </p>
                            </div>

                            <div class="p-1.5 space-y-0.5">
                                <!-- Notification item 1 -->
                                <a href="{{ route('details') }}"
                                    class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-slate-300 dark:focus:bg-slate-700 dark:focus:text-slate-300" wire:navigate>
                                    <!-- Image on the left -->
                                    <img src="https://img.awafim.tv/images/RrvP6bWZAAn2.192x0.webp" alt="movie image"
                                        class="w-12 h-12 rounded-full object-cover">
                                    <!-- Movie title and year in one line -->
                                    <div class="flex flex-col justify-center">
                                        <span class="text-sm font-medium text-gray-800 dark:text-neutral-200">Movie
                                            Title</span>
                                        <span class="text-xs text-gray-500 dark:text-slate-400">2024</span>
                                    </div>
                                </a>

                                <!-- Notification item 2 -->
                                <a href="#"
                                    class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-slate-300 dark:focus:bg-slate-700 dark:focus:text-slate-300">
                                    <!-- Image on the left -->
                                    <img src="https://img.awafim.tv/images/1kw5y30yLpoA.192x0.webp" alt="movie image"
                                        class="w-12 h-12 rounded-full object-cover">
                                    <!-- Movie title and year in one line -->
                                    <div class="flex flex-col justify-center">
                                        <span class="text-sm font-medium text-gray-800 dark:text-neutral-200">Another Movie
                                            Title</span>
                                        <span class="text-xs text-gray-500 dark:text-slate-400">2024</span>
                                    </div>
                                </a>

                                <!-- More items can be added here in the same structure -->
                            </div>

                            <!-- Other links, such as Profile, Watchlist, etc., remain unchanged -->

                        </div>
                    </div>
                @endauth --}}

                @auth
                    <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                        <button id="hs-dropdown-account" type="button"
                            class="size-[38px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 focus:outline-none disabled:opacity-50 disabled:pointer-events-none dark:text-white"
                            aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                            <img class="shrink-0 size-[38px] rounded-full"
                                src="{{ auth()->user()->avatar ?? asset('icons/user.jpg') }}" alt="Avatar">
                        </button>

                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 dark:bg-slate-800 dark:border dark:border-slate-700 dark:divide-slate-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
                            role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-account">
                            <div class="py-3 px-5 bg-gray-100 rounded-t-lg dark:bg-slate-700">
                                <p class="text-sm text-gray-500 dark:text-slate-400">Signed in as</p>
                                <p class="text-sm font-medium text-gray-600 dark:text-neutral-200">
                                    {{ auth()->user()->email }}</p>
                            </div>
                            <div class="p-1.5 space-y-0.5">
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-slate-300 dark:focus:bg-slate-700 dark:focus:text-slate-300"
                                    href="{{ route('user.profile') }}" wire:navigate>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="size-4 shrink-0" width="24"
                                        height="24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg>

                                    Profile
                                </a>
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-slate-300 dark:focus:bg-slate-700 dark:focus:text-slate-300"
                                    href="{{ route('my.watchlist') }}" wire:navigate>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="size-4 shrink-0" width="24"
                                        height="24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                                    </svg>

                                    My Watchlist
                                </a>
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-slate-300 dark:focus:bg-slate-700 dark:focus:text-slate-300"
                                    href="{{ route('logout') }}" wire:navigate>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        class="size-4 shrink-0 fill-slate-600 dark:fill-slate-500" width="24"
                                        height="24" stroke-width="2"
                                        stroke="currentColor"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path
                                            d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                                    </svg>
                                    Sign Out
                                </a>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
</header>
<!-- ========== END HEADER ========== -->

<div id="hs-basic-modal"
    class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none"
    role="dialog" tabindex="-1" aria-labelledby="hs-basic-modal-label">
    <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">
        <div class="flex flex-col shadow-sm rounded-xl pointer-events-auto">
            <div class="flex justify-between items-center py-3 px-4">
                <h3 id="hs-basic-modal-label" class="font-bold text-gray-800 dark:text-white">

                </h3>
                <button type="button"
                    class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-700 dark:hover:bg-slate-600 dark:text-slate-400 dark:focus:bg-slate-600"
                    aria-label="Close" data-hs-overlay="#hs-basic-modal">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="">
                <!-- Search Input -->
                <livewire:search-bar>
                <!-- End Search Input -->
            </div>
        </div>
    </div>
</div>