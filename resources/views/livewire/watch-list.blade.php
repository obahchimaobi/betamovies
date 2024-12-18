<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    @if ($isInWatchlist)
        <li
            class="bg-blue-600 text-white px-3 py-3 rounded-full uppercase text-xs font-black hover:cursor-pointer hover:bg-blue-700 duration-200 flex gap-1" wire:click="removeFromWatchlist">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
              </svg>
               <button class="uppercase" wire:click="removeFromWatchlist">Remove from Watchlist
            </button>
        </li>
    @else
        <li
            class="bg-blue-600 text-white px-4 py-3 rounded-full uppercase text-xs font-black hover:cursor-pointer hover:bg-blue-700 duration-200" wire:click="addToWatchlist">
            <i class="fa-solid fa-plus"></i> <button class="uppercase" wire:click="addToWatchlist">Add to Watchlist
            </button>
        </li>
    @endif
</div>
