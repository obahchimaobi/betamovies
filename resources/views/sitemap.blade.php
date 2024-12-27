<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BetaMovies - Sitemap</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles()
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto mt-8">
        <h3 class="text-center text-2xl font-semibold text-gray-800 mb-6">BetaMovies Sitemap</h3>
        <div class="flex justify-center">
            <ul class="bg-white rounded-lg shadow-lg p-6 space-y-4 w-full mx-3">
                @foreach ($urls as $url)
                    <li class="border-b last:border-b-0 pb-2">
                        <a href="{{ $url }}" class="text-blue-500 hover:text-blue-700 font-medium text-sm transition duration-300" wire:navigate>
                            {{ $url }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    @livewireScripts
</body>
</html>
