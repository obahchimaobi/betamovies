<div>
    {{-- In work, do what you enjoy. --}}
    <div class="grid xl:grid-cols-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 grid-cols-2 gap-4">
        @foreach ($kdrama as $top_rated)
        <div class="w-full">
            <a href="{{ route('movie.details', ['name'=>$top_rated->formatted_name]) }}" wire:navigate><img
                    src="{{ asset('storage/images/' . $top_rated->poster_path) }}"
                    alt="{{ $top_rated->name }}"
                    class="rounded-lg border dark:border-slate-700 lg:hover:scale-105 duration-200 w-full border-slate-100"></a>

            <div class="flex justify-between mt-2 gap-4">
                <a href="{{ route('movie.details', ['name'=>$top_rated->formatted_name]) }}" class="text-gray-800 hover:text-gray-700 font-semibold dark:text-white lg:text-xs text-sm truncate dark:hover:text-slate-300"
                    wire:navigate><span class="">{{ $top_rated->name }} ({{ $top_rated->release_year }})</span></a>
                <span class="text-gray-800 font-semibold dark:text-white lg:text-xs text-sms">{{ $top_rated->vote_count }}</span>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-8">
        {{ $kdrama->links(data: ['scrollTo' => "#korean-drama"]) }}
    </div>
</div>
