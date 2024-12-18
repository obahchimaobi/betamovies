@extends('components.layouts.app')

@section('title')
    Login | Create and Manage Your Movie Watchlist {{ config('app.name') }}
@endsection

@section('meta_description')
    Sign in to {{ config('app.name') }} to access your watchlist, manage movie downloads, and enjoy a personalized
    experience. Join now to get started
@endsection

@section('content')
    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 my-10">

            @if (session()->has('error'))
                <!-- Toast -->
                <div id="dismiss-toast"
                    class="fixed top-2 right-2 z-50 hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 max-w-xs bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-slate-800 dark:border-slate-700"
                    role="alert" tabindex="-1" aria-labelledby="hs-toast-dismiss-button-label">
                    <div class="flex p-4 gap-2">
                        <div class="shrink-0">
                            <svg class="shrink-0 size-4 text-red-500 mt-0.5" xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z">
                                </path>
                            </svg>
                        </div>
                        <p id="hs-toast-dismiss-button-label" class="text-sm text-gray-700 dark:text-slate-200">
                            {{ session('error') }}
                        </p>
                    </div>
                </div>
                <!-- End Toast -->
            @endif

            @if (session()->has('success'))
                <!-- Toast -->
                <div id="dismiss-toast"
                    class="fixed top-2 right-2 z-50 hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 max-w-xs bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-slate-800 dark:border-slate-700"
                    role="alert" tabindex="-1" aria-labelledby="hs-toast-dismiss-button-label">
                    <div class="flex p-4 gap-2">
                        <div class="shrink-0">
                            <svg class="shrink-0 size-4 text-teal-500 mt-0.5" xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z">
                                </path>
                            </svg>
                        </div>
                        <p id="hs-toast-dismiss-button-label" class="text-sm text-gray-700 dark:text-slate-200">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
                <!-- End Toast -->
            @endif

            @guest
                <div
                    class="max-w-[25rem] mt-7 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-slate-900 dark:border-slate-700 mx-auto">
                    <div class="p-4 sm:p-7">
                        <div class="text-center">
                            <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Sign in</h1>
                            <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                                Don't have an account yet?
                                <a class="text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                                    href="{{ route('register.page') }}" wire:navigate>
                                    Sign up here
                                </a>
                            </p>
                        </div>

                        <div class="mt-5">
                            <a href="{{ route('google.redirect') }}"
                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:border-slate-700 dark:text-white dark:hover:bg-slate-700 dark:focus:bg-slate-700">
                                <svg class="w-4 h-auto" width="46" height="47" viewBox="0 0 46 47" fill="none">
                                    <path
                                        d="M46 24.0287C46 22.09 45.8533 20.68 45.5013 19.2112H23.4694V27.9356H36.4069C36.1429 30.1094 34.7347 33.37 31.5957 35.5731L31.5663 35.8669L38.5191 41.2719L38.9885 41.3306C43.4477 37.2181 46 31.1669 46 24.0287Z"
                                        fill="#4285F4" />
                                    <path
                                        d="M23.4694 47C29.8061 47 35.1161 44.9144 39.0179 41.3012L31.625 35.5437C29.6301 36.9244 26.9898 37.8937 23.4987 37.8937C17.2793 37.8937 12.0281 33.7812 10.1505 28.1412L9.88649 28.1706L2.61097 33.7812L2.52296 34.0456C6.36608 41.7125 14.287 47 23.4694 47Z"
                                        fill="#34A853" />
                                    <path
                                        d="M10.1212 28.1413C9.62245 26.6725 9.32908 25.1156 9.32908 23.5C9.32908 21.8844 9.62245 20.3275 10.0918 18.8588V18.5356L2.75765 12.8369L2.52296 12.9544C0.909439 16.1269 0 19.7106 0 23.5C0 27.2894 0.909439 30.8731 2.49362 34.0456L10.1212 28.1413Z"
                                        fill="#FBBC05" />
                                    <path
                                        d="M23.4694 9.07688C27.8699 9.07688 30.8622 10.9863 32.5344 12.5725L39.1645 6.11C35.0867 2.32063 29.8061 0 23.4694 0C14.287 0 6.36607 5.2875 2.49362 12.9544L10.0918 18.8588C11.9987 13.1894 17.25 9.07688 23.4694 9.07688Z"
                                        fill="#EB4335" />
                                </svg>
                                Sign in with Google
                            </a>

                            <div
                                class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-1 before:border-t before:border-gray-200 before:me-6 after:flex-1 after:border-t after:border-gray-200 after:ms-6 dark:text-slate-500 dark:before:border-slate-600 dark:after:border-slate-600">
                                Or</div>

                            <!-- Form -->
                            @livewire('login-form')
                            <!-- End Form -->
                        </div>
                    </div>
                </div>
            @endguest

            @auth
                <div class="relative flex flex-col bg-white shadow-lg rounded-xl dark:bg-slate-800 max-w-[25rem] mx-auto">

                    <div class="p-4 sm:p-10 text-center overflow-y-auto">
                        <!-- Icon -->
                        <span
                            class="mb-4 inline-flex justify-center items-center size-[62px] rounded-full border-4 border-yellow-50 bg-yellow-100 text-yellow-500 dark:bg-yellow-700 dark:border-yellow-600 dark:text-yellow-100">
                            <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                        </span>
                        <!-- End Icon -->

                        <h3 id="hs-sign-out-alert-label" class="mb-2 text-2xl font-bold text-gray-800 dark:text-slate-200">
                            Sign out
                        </h3>
                        <p class="text-gray-500 dark:text-slate-400">
                            You are already signed in. Do you want to sign out?
                        </p>

                        <div class="mt-6 flex justify-center gap-x-4">
                            <button type="button"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-slate-700 dark:text-slate-300 dark:hover:bg-slate-700 dark:focus:bg-slate-700"
                                aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-danger-alert"
                                data-hs-overlay="#hs-danger-alert">
                                Sign out
                            </button>
                            <a href="{{ route('home') }}"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                data-hs-overlay="#hs-sign-out-alert">
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
    </div>

    <div id="hs-danger-alert"
        class="hs-overlay hidden size-96 mx-auto fixed inset-0 z-[80] overflow-x-hidden overflow-y-auto items-center justify-center"
        role="dialog" tabindex="-1" aria-labelledby="hs-danger-alert-label">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all md:max-w-2xl md:w-full m-3 md:mx-auto">
            <div
                class="relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden dark:bg-slate-800 dark:border-slate-800">
                <div class="absolute top-2 end-2">
                    <button type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-700 dark:hover:bg-slate-600 dark:text-slate-400 dark:focus:bg-slate-600"
                        aria-label="Close" data-hs-overlay="#hs-danger-alert">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>

                <div class="p-4 sm:p-10 overflow-y-auto">
                    <div class="flex gap-x-4 md:gap-x-7">
                        <!-- Icon -->
                        <span
                            class="shrink-0 inline-flex justify-center items-center size-[46px] sm:w-[62px] sm:h-[62px] rounded-full border-4 border-red-50 bg-red-100 text-red-500 dark:bg-red-700 dark:border-red-600 dark:text-red-100">
                            <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                        </span>
                        <!-- End Icon -->

                        <div class="grow">
                            <h3 id="hs-danger-alert-label"
                                class="mb-2 text-xl font-bold text-gray-800 dark:text-slate-200">
                                Sign Out
                            </h3>
                            <p class="text-gray-500 dark:text-slate-400">
                                Are you sure you want to sign out?
                            </p>
                        </div>
                    </div>
                </div>

                <div
                    class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t dark:bg-slate-900 dark:border-slate-800">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-slate-700 dark:text-slate-300 dark:hover:bg-slate-800 dark:focus:bg-slate-800"
                        data-hs-overlay="#hs-danger-alert">
                        No
                    </button>
                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-600 disabled:opacity-50 disabled:pointer-events-none"
                        href="{{ route('logout') }}" wire:navigate>
                        Yes
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
