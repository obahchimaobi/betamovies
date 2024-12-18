@extends('components.layouts.app')

@section('title')
    My Watchlist | {{ config('app.name') }}
@endsection

@section('content')
    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 my-5">
            <div class="flex items-center justify-between">
                <h1 class="text-black dark:text-white lg:text-3xl text-2xl font-semibold">My Watchlist</h1>
                <ol class="flex items-center whitespace-nowrap">
                    <li class="inline-flex items-center">
                        <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-slate-500 dark:hover:text-blue-500 dark:focus:text-blue-500"
                            href="{{ route('home') }}" wire:navigate>
                            Home
                        </a>
                        <svg class="shrink-0 size-5 text-gray-400 dark:text-slate-600 mx-2" width="16" height="16"
                            viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
                        </svg>
                    </li>
                    <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-neutral-200"
                        aria-current="page">
                        My watchlist
                    </li>
                </ol>
            </div>
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="border rounded-lg overflow-hidden dark:border-slate-700">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-slate-700">
                                <thead class="bg-gray-50 dark:bg-slate-700">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-slate-400">
                                            </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-slate-400">
                                            Title</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-slate-400">
                                            Date Added</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-slate-700">
                                    @foreach ($watchlists as $watchlist)
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-slate-200">
                                                <a href="{{ route('movie.details', ['name'=>$watchlist->formatted_name]) }}" wire:navigate><img src="{{ asset('storage/images/' . $watchlist->poster_path) }}" alt="" class="w-12 h-12 rounded-full object-cover"></a>
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-slate-200">
                                                <a href="{{ route('movie.details', ['name'=>$watchlist->formatted_name]) }}" wire:navigate>{{ $watchlist->movie_name }}</a></td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-slate-200">
                                                {{ $watchlist->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
