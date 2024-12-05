@extends('layouts.app')

@section('content')
    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 my-5 gap-5">

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
                    <form action="" @class(['flex flex-col', 'font-bold' => false])>
                        <div class="dark:bg-slate-800 p-6 rounded-lg bg-white/10 border dark:border-black/30">
                            <div class="mb-5">
                                <h1 class="text-slate-800 dark:text-slate-100">Photo</h1>
                                <img src="{{ auth()->user()->avatar }}" alt=""
                                    class="rounded-full mt-3 border border-white">
                            </div>
                            <div @class(['flex flex-col mb-4', 'font-semibold' => false])>
                                <label for="Name" class="text-slate-800 dark:text-slate-100">Name<span
                                        @class(['text-red-500', 'font-bold' => false])>*</span></label>
                                <input type="text" id="input-label"
                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-slate-700 dark:text-slate-300 dark:placeholder-slate-400 dark:focus:ring-slate-600"
                                    value="{{ auth()->user()->name }}">
                            </div>
                            <div @class(['flex flex-col', 'font-semibold' => false])>
                                <label for="email" class="text-slate-800 dark:text-slate-100">Email<span
                                        @class(['text-red-500', 'font-bold' => false])>*</span></label>
                                <input type="email" id="input-label"
                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-slate-700 dark:text-slate-300 dark:placeholder-slate-400 dark:focus:ring-slate-600"
                                    value="{{ auth()->user()->email }}">
                            </div>

                        </div>
                        <div @class(['text-end', 'font-semibold' => true])>
                            <button class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg mt-5 text-white">Save</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="grid xl:grid-cols-3 pt-5">
                <div>
                    <h1 @class([
                        'text-black dark:text-slate-100 text-base',
                        'font-bold' => true,
                    ])>Update Password</h1>
                    <p @class([
                        'text-slate-800 dark:text-slate-400 text-sm',
                        'font-bold' => false,
                    ])>Ensure your account is using long, random password to stay secure.</p>
                </div>

                <div class="col-span-2 xl:mt-0 mt-3">
                    <form action="" @class(['flex flex-col', 'font-bold' => false])>
                        <div class="dark:bg-slate-800 p-6 rounded-lg bg-white/10 border dark:border-black/30">
                            <div @class(['flex flex-col mb-4', 'font-semibold' => false])>
                                <label for="Name" class="text-slate-800 dark:text-slate-100">Current Password<span
                                        @class(['text-red-500', 'font-bold' => false])>*</span></label>
                                <div class="relative">
                                    <input id="hs-toggle-password" type="password"
                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-slate-700 dark:text-slate-300 dark:placeholder-slate-400 dark:focus:ring-slate-600"
                                        value="">
                                    <button type="button"
                                        data-hs-toggle-password='{
                                  "target": "#hs-toggle-password"
                                }'
                                        class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-blue-600 dark:text-slate-600 dark:focus:text-blue-500">
                                        <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24">
                                            </path>
                                            <path class="hs-password-active:hidden"
                                                d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                                            </path>
                                            <path class="hs-password-active:hidden"
                                                d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
                                            </path>
                                            <line class="hs-password-active:hidden" x1="2" x2="22"
                                                y1="2" y2="22"></line>
                                            <path class="hidden hs-password-active:block"
                                                d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                            <circle class="hidden hs-password-active:block" cx="12" cy="12"
                                                r="3"></circle>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div @class(['flex flex-col mb-4', 'font-semibold' => false])>
                                <label for="Name" class="text-slate-800 dark:text-slate-100">New Password<span
                                        @class(['text-red-500', 'font-bold' => false])>*</span></label>
                                <input type="password" id="input-label"
                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-slate-700 dark:text-slate-300 dark:placeholder-slate-400 dark:focus:ring-slate-600"
                                    value="">
                            </div>
                            <div @class(['flex flex-col', 'font-semibold' => false])>
                                <label for="Name" class="text-slate-800 dark:text-slate-100">New Password<span
                                        @class(['text-red-500', 'font-bold' => false])>*</span></label>
                                <input type="password" id="input-label"
                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-slate-700 dark:text-slate-300 dark:placeholder-slate-400 dark:focus:ring-slate-600"
                                    value="">
                            </div>
                        </div>

                        <div @class(['text-end', 'font-semibold' => true])>
                            <button class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg mt-5 text-white">Save</button>
                        </div>
                    </form>
                </div>
            </div>

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
                    <form action="" @class(['flex flex-col', 'font-bold' => false])>
                        <div class="dark:bg-slate-800 p-6 rounded-lg bg-white/10 border dark:border-black/30">
                            <div @class(['flex flex-col mb-4', 'font-semibold' => false])>
                                <h1 class="text-slate-600 dark:text-slate-400">Once your account is deleted, all of your
                                    resources and data will be permanently erased. Before deleting your account, please
                                    download any data or information you wish to keep.</h1>
                            </div>
                            <div class="text-start">
                                <button type="button"
                                    class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:bg-red-600 disabled:opacity-50 disabled:pointer-events-none"
                                    aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-danger-alert" data-hs-overlay="#hs-danger-alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 shrink-0" stroke-width="2">
                                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                      </svg>
                                      Delete Account
                                </button>
                            </div>
                        </div>

                        <div @class(['text-end', 'font-semibold' => true])>
                            <button class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg mt-5 text-white">Save</button>
                        </div>
                    </form>
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
