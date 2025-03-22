<!DOCTYPE html>
<html lang="en" class="dark">

<head>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QGVV61KLVM"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-QGVV61KLVM');
    </script>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Download moves and series for free | ' . config('app.name'))</title>

    <link rel="shortcut icon" href="{{ asset('icons/betamovies-icon.png') }}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <meta name="description" content="@yield('meta_description', 'Discover a world of movies and series on ' . config('app.name') . '. Explore, download, and watch top-rated, new releases, and your favorite films, all in one place. Join now and build your ultimate watchlist!')">

    <meta name="keywords" content="movies series mkv srt mp4 season episode download">

    <meta property="og:title" content="@yield('og_title', 'Download Free Hollywood Movies, Series and Drama Online | ' . config('app.name'))">
    <meta property="og:description" content="@yield('og_description', 'Explore the best movies and series on ' . config('app.name') . '. Download the latest releases, add to your watchlist, and enjoy top-rated films all in one place.')">
    <meta property="og:image" content="@yield('og_image', asset('icons/betamovies.jpeg'))">
    <meta property="og:url" content="@yield('og_url', Request::url())">
    <meta property="og:type" content="Website">

    <meta property="og:image:width" content="1200"> <!-- Replace with your desired width -->
    <meta property="og:image:height" content="1200">

    {{-- GOOGLE FONTS --}}
    {{-- ROBOTO --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    {{-- INTER --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Keania+One&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Host+Grotesk:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">

    @livewireStyles

</head>

<body
    class="dark:bg-slate-900 bg-white font-inter text-sm [&::-webkit-scrollbar]:w-1 [&::-webkit-scrollbar-track]:bg-slate-100 [&::-webkit-scrollbar-thumb]:bg-slate-300 dark:[&::-webkit-scrollbar-track]:bg-slate-700 dark:[&::-webkit-scrollbar-thumb]:bg-slate-500">

    @include('components.layouts._header')
    @include('components.layouts._main')
    @include('components.layouts._sidebar')
    @yield('content')
    @include('components.layouts._footer')

    <x-toaster-hub />
    @livewireScripts
    <!-- ========== END MAIN CONTENT ========== -->
</body>

</html>
