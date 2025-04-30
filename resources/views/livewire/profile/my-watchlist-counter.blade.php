<div>
    {{-- Be like water. --}}
    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-slate-300 dark:focus:bg-slate-700 dark:focus:text-slate-300 justify-between"
        href="{{ route('my.watchlist') }}" wire:navigate>
        <div class="flex gap-x-3.5 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                class="size-4 shrink-0" width="24" height="24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
            </svg>

            My Watchlist
        </div>

        <span class="text-xs font-medium bg-red-500 text-white py-0.5 px-1.5 rounded-full">
            {{ $count }}
        </span>
    </a>
</div>
