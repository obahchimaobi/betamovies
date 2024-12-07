<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="grid xl:grid-cols-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 grid-cols-2 gap-4">
        @foreach ($movies->lazy() as $movie)
            <div class="w-full">
                <a href="{{ route('movie.details', ['name' => $movie->formatted_name]) }}" wire:navigate><img
                        src="{{ asset('storage/images/' . $movie->poster_path) }}" alt="{{ $movie->name }}"
                        class="rounded-lg border dark:border-slate-700 lg:hover:scale-105 duration-200 w-full border-slate-100"></a>

                <div class="flex justify-between mt-2 gap-5">
                    <a href="{{ route('movie.details', ['name' => $movie->formatted_name]) }}"
                        class="text-gray-800 hover:text-gray-700 font-semibold dark:text-white lg:text-xs text-sm truncate dark:hover:text-slate-300"
                        wire:navigate><span class="">{{ $movie->name }}
                            ({{ $movie->release_year }})</span></a>
                    <span
                        class="text-gray-800 font-semibold dark:text-white lg:text-xs text-sms">{{ $movie->vote_count }}</span>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-8">
        {{ $movies->appends(request()->query())->onEachSide(2)->links() }}
    </div>
</div>
