<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    @section('title')
        Download {{ Str::ucfirst($genre) }} movies and series for free | {{ config('app.name') }}
    @endsection

    @section('content')
        <div>

            <!-- Content -->
            <div class="w-full lg:ps-64">
                <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 my-10">
                    <!-- your content goes here ... -->
                    <livewire:media.genres :genre="$genre" lazy/>
                </div>
            </div>
            <!-- End Content -->
        </div>
    @endsection
</div>
