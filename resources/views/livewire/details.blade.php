<div>
    {{-- In work, do what you enjoy. --}}
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

            <livewire:media.details :name="$name" :all="$all"/>
        </div>
    @endsection
</div>
