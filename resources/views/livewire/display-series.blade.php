<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="grid xl:grid-cols-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 grid-cols-2 gap-4">
        @foreach ($series as $serie)
            <div class="w-full">
                <a href="{{ route('movie.details', ['name' => $serie->formatted_name]) }}" wire:navigate><img
                        src="{{ asset('storage/images/' . $serie->poster_path) }}" alt="{{ $serie->name }}"
                        class="rounded-lg border dark:border-slate-700 lg:hover:scale-105 duration-200 w-full border-slate-100"></a>

                <div class="flex justify-between mt-2 gap-5">
                    <a href="{{ route('movie.details', ['name' => $serie->formatted_name]) }}"
                        class="text-gray-800 hover:text-gray-700 font-semibold dark:text-white lg:text-xs text-sm truncate dark:hover:text-slate-300"
                        wire:navigate><span class="">{{ $serie->name }}
                            ({{ $serie->release_year }})</span></a>
                    <span
                        class="text-gray-800 font-semibold dark:text-white lg:text-xs text-sms">{{ $serie->vote_count }}</span>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-8">
        {{ $series->appends(request()->query())->onEachSide(2)->links() }}
    </div>
</div>
