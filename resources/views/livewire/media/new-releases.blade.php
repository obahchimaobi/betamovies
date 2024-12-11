<div>
    {{-- Stop trying to control. --}}
    <div class="grid xl:grid-cols-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 grid-cols-2 gap-4">
        @foreach ($paginatedResults as $new_releases)
            <div class="w-full">
                <a href="{{ route('movie.details', ['name'=>$new_releases->formatted_name]) }}" wire:navigate><img src="{{ asset('storage/images/' . $new_releases->poster_path) }}"
                        alt="{{ $new_releases->name }}"
                        class="rounded-lg border dark:border-slate-700 lg:hover:scale-105 duration-200 w-full border-slate-100"></a>

                <div class="flex justify-between mt-2 gap-3">
                    <a href="{{ route('movie.details', ['name'=>$new_releases->formatted_name]) }}"
                        class="text-gray-800 hover:text-gray-700 font-semibold dark:text-white lg:text-xs text-sm truncate dark:hover:text-slate-300"
                        wire:navigate><span class="">{{ $new_releases->name }}
                            ({{ $new_releases->release_year }})</span></a>
                    <span
                        class="text-gray-800 font-semibold dark:text-white lg:text-xs text-sms">{{ $new_releases->vote_count }}</span>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-8">
        {{ $paginatedResults->appends(request()->query())->onEachSide(2)->links(data: ['scrollTo' => false]) }}
    </div>
</div>
