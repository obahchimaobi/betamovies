<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="relative flex mx-auto">
        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
            <svg class="shrink-0 size-4 text-gray-400 dark:text-white/60" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" />
                <path d="m21 21-4.3-4.3" />
            </svg>
        </div>
        <form action="{{ route('search') }}" class="w-full">
            <input type="text"
                class="py-2 ps-10 pe-16 block w-full border bg-white border-slate-200 rounded-lg text-sm focus:border-slate-700 focus:ring-slate-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:border-slate-700 dark:text-slate-400 dark:placeholder:text-slate-400 dark:focus:ring-slate-600"
                placeholder="Search" wire:model.live.debounce.300ms='searchBar' autofocus name="search"
                autocomplete="off">
        </form>

        <div wire:loading class="absolute right-3 top-1/2 -translate-y-1/2">
            <div role="status">
                <svg aria-hidden="true"
                    class="inline w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>

    @if (sizeof($results) > 0)
        <div
            class="p-1.5 space-y-0.5 rounded-lg mt-2 bg-white border border-gray-300 dark:bg-slate-800 dark:border dark:border-slate-700 dark:divide-slate-700 relative flex-col flex mx-auto overflow-y-auto max-h-[450px] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-slate-700 dark:[&::-webkit-scrollbar-thumb]:bg-slate-500 [&::-webkit-scrollbar-track]:rounded-lg [&::-webkit-scrollbar-thumb]:rounded-lg">
            @foreach ($results as $search_result)
                <a href="{{ route('movie.details', ['name' => $search_result->formatted_name]) }}"
                    class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-slate-300 dark:focus:bg-slate-700 dark:focus:text-slate-300 relative"
                    wire:navigate id="results">
                    <img src="{{ $search_result->poster_cloudinary_url }}" alt="movie image"
                        class="w-12 h-12 rounded object-cover">
                    <div class="flex flex-col justify-center">
                        <span
                            class="text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $search_result->name }}</span>
                        <span
                            class="text-xs text-gray-500 dark:text-slate-400">{{ $search_result->release_year }}</span>
                    </div>
                </a>
            @endforeach

            {{ $results->links(data: ['scrollTo' => '#results']) }}
        </div>
    @elseif ($error)
        <div
            class="p-1.5 space-y-0.5 rounded-lg mt-2 bg-white border border-gray-300 dark:bg-slate-800 dark:border dark:border-slate-700 dark:divide-slate-700 relative text-center mx-auto">
            <svg class="fi-ta-empty-state-icon w-10 h-10 mt-4 text-gray-500 bg-gray-200 dark:text-gray-400 dark:bg-slate-600 rounded-full p-2 mx-auto"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path>
            </svg>
            <h1 class="text-sm font-medium text-slate-600 dark:text-slate-400 pb-4 pt-3">
                @php
                    echo $error;
                @endphp
            </h1>
        </div>
    @endif
</div>
