@extends('components.layouts.app')

@section('title')
    Reset Password | {{ config('app.name') }}
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
            
            <livewire:forgot-password />
        </div>
    </div>
@endsection
