@extends('layouts.app')

@section('content')
    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 my-5 gap-5">
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
            <h1 @class([
                'text-black dark:text-slate-100 text-3xl',
                'font-bold' => true,
            ])>My Profile</h1>

            <div class="grid xl:grid-cols-3">
                <div class="xl:mt-0 mt-5">
                    <h1 @class([
                        'text-black dark:text-slate-100 text-base',
                        'font-bold' => true,
                    ])>Profile Information</h1>
                    <p @class([
                        'text-slate-800 dark:text-slate-400 text-sm',
                        'font-bold' => false,
                    ])>Update your account profile information and email address.</p>
                </div>

                <div class="col-span-2 xl:mt-0 mt-3">
                    <livewire:profile.info-form />
                </div>
            </div>

            @if (auth()->user()->google_id)
            @else
                <div class="grid xl:grid-cols-3 pt-5 gap-4">
                    <div>
                        <h1 @class([
                            'text-black dark:text-slate-100 text-base',
                            'font-bold' => true,
                        ])>Update Password</h1>
                        <p @class([
                            'text-slate-800 dark:text-slate-400 text-sm',
                            'font-bold' => false,
                        ])>Ensure your account is using long, random password to stay secure.
                        </p>
                    </div>

                    <div class="col-span-2 xl:mt-0 mt-3">
                        <livewire:profile.password-form />
                    </div>
                </div>
            @endif

            <div class="grid xl:grid-cols-3 pt-5">
                <div>
                    <h1 @class([
                        'text-black dark:text-slate-100 text-base',
                        'font-bold' => true,
                    ])>Delete Account</h1>
                    <p @class([
                        'text-slate-800 dark:text-slate-400 text-sm',
                        'font-bold' => false,
                    ])>Permanently delete your account.</p>
                </div>

                <div class="col-span-2 xl:mt-0 mt-3">
                    <div class="dark:bg-slate-800 p-6 rounded-lg bg-white/10 border dark:border-black/30">
                        <div @class(['flex flex-col mb-4', 'font-semibold' => false])>
                            <h1 class="text-slate-600 dark:text-slate-400">Once your account is deleted, all of your
                                resources and data will be permanently erased. Before deleting your account, please
                                download any data or information you wish to keep.</h1>
                        </div>
                        <div class="text-start">
                            <button type="button"
                                class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:bg-red-600 disabled:opacity-50 disabled:pointer-events-none"
                                aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-danger-alert"
                                data-hs-overlay="#hs-danger-alert">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-4 shrink-0" stroke-width="2">
                                    <path fill-rule="evenodd"
                                        d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                        clip-rule="evenodd" />
                                </svg>
                                Delete Account
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="hs-danger-alert"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto" role="dialog"
        tabindex="-1" aria-labelledby="hs-danger-alert-label">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all md:max-w-2xl md:w-full m-3 md:mx-auto">
            <div
                class="relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden dark:bg-neutral-900 dark:border-neutral-800">
                <div class="absolute top-2 end-2">
                    <button type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
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
                                class="mb-2 text-xl font-bold text-gray-800 dark:text-neutral-200">
                                Delete Personal Account
                            </h3>
                            <p class="text-gray-500 dark:text-neutral-500">
                                Permanently remove your Personal Account and all of its contents.
                                This action is not reversible, so please continue with caution.
                            </p>
                        </div>
                    </div>
                </div>

                <div
                    class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t dark:bg-neutral-950 dark:border-neutral-800">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                        data-hs-overlay="#hs-danger-alert">
                        Cancel
                    </button>
                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-600 disabled:opacity-50 disabled:pointer-events-none"
                        href="#">
                        Delete personal account
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
