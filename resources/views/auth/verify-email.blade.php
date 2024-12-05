@extends('layouts.app')

@section('content')
    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 my-10">
            {{-- Success Message --}}
            @if (session()->has('error'))
                <!-- Toast -->
                <div id="dismiss-toast"
                    class="fixed top-2 right-2 z-50 hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 max-w-xs bg-red-100 border-s-4 border-red-700 rounded-lg shadow-lg dark:bg-red-900 dark:border-red-900"
                    role="alert" tabindex="-1" aria-labelledby="hs-toast-dismiss-button-label">
                    <div class="flex p-4 gap-2">
                        <p id="hs-toast-dismiss-button-label" class="text-sm text-red-900 dark:text-red-200">
                            {{ session('error') }}
                        </p>

                        <div class="ms-auto">
                            <button type="button"
                                class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg text-gray-800 opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100 dark:text-white"
                                aria-label="Close" data-hs-remove-element="#dismiss-toast">
                                <span class="sr-only">Close</span>
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- End Toast -->
            @endif

            @if (session()->has('success'))
                <!-- Toast -->
                <div id="dismiss-toast"
                    class="fixed top-2 right-2 z-50 hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 max-w-xs bg-green-100 border-s-4 border-green-700 rounded-lg shadow-lg dark:bg-green-900 dark:border-green-950"
                    role="alert" tabindex="-1" aria-labelledby="hs-toast-dismiss-button-label">
                    <div class="flex p-4">
                        <p id="hs-toast-dismiss-button-label" class="text-sm text-green-900 dark:text-green-200">
                            {{ session('success') }}
                        </p>

                        <div class="ms-auto">
                            <button type="button"
                                class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg text-gray-800 opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100 dark:text-white"
                                aria-label="Close" data-hs-remove-element="#dismiss-toast">
                                <span class="sr-only">Close</span>
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- End Toast -->
            @endif

            <div
                class="max-w-[25rem] mt-7 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-slate-900 dark:border-slate-700 mx-auto">
                <div class="p-4 sm:p-7">
                    <div class="text-center">
                        <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Verify Your Email</h1>
                        <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                            Enter the 6-digit verification code sent to your email.
                        </p>
                    </div>

                    <div class="mt-8">
                        @livewire('verify-form')
                    </div>
                </div>
            </div>
        </div>
        <!-- End Toast -->
    </div>
@endsection
