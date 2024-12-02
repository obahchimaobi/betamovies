@extends('layouts.app')

@section('content')
    <div>

        <!-- Content -->
        <div class="w-full lg:ps-64">
            <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 my-10">
                <!-- your content goes here ... -->
                <!-- Contact Us -->
                <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-10 mx-auto">
                    <div class="max-w-xl mx-auto">
                        <div class="text-center">
                            <h1 class="text-3xl font-bold text-gray-800 sm:text-4xl dark:text-white">
                                Contact us
                            </h1>
                            <p class="mt-1 text-gray-600 dark:text-neutral-400">
                                We'd love to talk about how we can help you.
                            </p>
                        </div>
                    </div>

                    <div class="mt-12 max-w-lg mx-auto">
                        <!-- Card -->
                        <div class="flex flex-col border rounded-xl p-4 sm:p-6 lg:p-8 dark:border-slate-700">
                            <h2 class="mb-8 text-xl font-semibold text-gray-800 dark:text-neutral-200">
                                Fill in the form
                            </h2>

                            <form action="">
                                <div class="grid gap-4 lg:gap-6">
                                    <!-- Grid -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                                        <div>
                                            <label for="hs-firstname-contacts-1"
                                                class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">First
                                                Name</label>
                                            <input type="text" name="hs-firstname-contacts-1"
                                                id="hs-firstname-contacts-1"
                                                class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:border-slate-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 focus:outline-none">
                                        </div>

                                        <div>
                                            <label for="hs-lastname-contacts-1"
                                                class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Last
                                                Name</label>
                                            <input type="text" name="hs-lastname-contacts-1" id="hs-lastname-contacts-1"
                                                class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:border-slate-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 focus:outline-none">
                                        </div>
                                    </div>
                                    <!-- End Grid -->

                                    <!-- Grid -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                                        <div>
                                            <label for="hs-email-contacts-1"
                                                class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Email</label>
                                            <input type="email" name="hs-email-contacts-1" id="hs-email-contacts-1"
                                                autocomplete="email"
                                                class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:border-slate-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 focus:outline-none">
                                        </div>

                                        <div>
                                            <label for="hs-phone-number-1"
                                                class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Phone
                                                Number</label>
                                            <input type="text" name="hs-phone-number-1" id="hs-phone-number-1"
                                                class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:border-slate-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 focus:outline-none">
                                        </div>
                                    </div>
                                    <!-- End Grid -->

                                    <div>
                                        <label for="hs-about-contacts-1"
                                            class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Details</label>
                                        <textarea id="hs-about-contacts-1" name="hs-about-contacts-1" rows="4"
                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:border-slate-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 focus:outline-none"></textarea>
                                    </div>
                                </div>
                                <!-- End Grid -->

                                <div class="mt-6 grid">
                                    <button type="submit"
                                        class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Send
                                        inquiry</button>
                                </div>

                                <div class="mt-3 text-center">
                                    <p class="text-sm text-gray-500 dark:text-neutral-500">
                                        We'll get back to you in 1-2 business days.
                                    </p>
                                </div>
                            </form>
                        </div>
                        <!-- End Card -->
                    </div>
                </div>
                <!-- End Contact Us -->
            </div>
        </div>
        <!-- End Content -->
    </div>
@endsection
