@extends('layouts.app')

@section('content')
    <div>

        <!-- Content -->
        <div class="w-full lg:ps-64">
            <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 my-10">
                <!-- your content goes here ... -->
                <div class="flex items-center justify-between">
                    <h1 class="text-black dark:text-white lg:text-3xl text-2xl font-semibold">Movies</h1>
                    <ol class="flex items-center whitespace-nowrap">
                        <li class="inline-flex items-center">
                            <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-slate-500 dark:hover:text-blue-500 dark:focus:text-blue-500"
                                href="{{ route('home') }}" wire:navigate>
                                Home
                            </a>
                            <svg class="shrink-0 size-5 text-gray-400 dark:text-slate-600 mx-2" width="16"
                                height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true">
                                <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
                            </svg>
                        </li>
                        <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-neutral-200"
                            aria-current="page">
                            Movies
                        </li>
                    </ol>
                </div>

                <div class="grid xl:grid-cols-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 grid-cols-2 gap-4">
                    <div class="w-full">
                        <a href="" wire:navigate><img
                                src="https://nkiri.com/wp-content/uploads/2024/11/hitpig-hollywood-movie-200x300.jpg"
                                alt=""
                                class="rounded-lg border dark:border-slate-700 lg:hover:scale-105 duration-200 w-full border-slate-100"></a>

                        <div class="flex justify-between mt-2 gap-10">
                            <a href="" class="text-gray-800 hover:text-gray-700 font-semibold dark:text-white lg:text-xs text-sm truncate dark:hover:text-slate-300"
                                wire:navigate><span class="">HitPig (2024)</span></a>
                            <span class="text-gray-800 font-semibold dark:text-white lg:text-xs text-sms">8.1</span>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <nav class="flex items-center justify-center gap-x-1 lg:pt-4 pt-6" aria-label="Pagination">
                    <button type="button"
                        class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-1.5 text-sm rounded-lg text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10"
                        aria-label="Previous" disabled="">
                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="m15 18-6-6 6-6"></path>
                        </svg>
                        <span>Previous</span>
                    </button>
                    <div class="flex items-center gap-x-1">
                        <button type="button"
                            class="min-h-[38px] min-w-[38px] flex justify-center items-center bg-gray-200 text-gray-800 py-2 px-3 text-sm rounded-lg focus:outline-none focus:bg-gray-300 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-600 dark:text-white dark:focus:bg-slate-500"
                            aria-current="page">1</button>
                        <button type="button"
                            class="min-h-[38px] min-w-[38px] flex justify-center items-center text-gray-800 hover:bg-gray-100 py-2 px-3 text-sm rounded-lg focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-slate-600 dark:focus:bg-slate-600">2</button>
                        <button type="button"
                            class="min-h-[38px] min-w-[38px] flex justify-center items-center text-gray-800 hover:bg-gray-100 py-2 px-3 text-sm rounded-lg focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-slate-600 dark:focus:bg-slate-600">3</button>
                    </div>
                    <button type="button"
                        class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-1.5 text-sm rounded-lg text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white  dark:hover:bg-slate-600 dark:focus:bg-slate-600"
                        aria-label="Next">
                        <span>Next</span>
                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </button>
                </nav>
                <!-- End Pagination -->
            </div>
        </div>
        <!-- End Content -->
    </div>
@endsection
