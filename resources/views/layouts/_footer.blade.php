<!-- ========== FOOTER ========== -->
<footer class="mt-auto bg-gray-800 w-full dark:bg-slate-950">
    <div class="w-full lg:ps-64">
        <div class="space-y-4 sm:space-y-6 mt-10">
            <div class="mt-auto w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 lg:pt-20 mx-auto">
                <!-- Grid -->
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
                    <div class="col-span-full lg:col-span-1">
                        <a class="flex-none text-xl font-semibold text-white focus:outline-none focus:opacity-80"
                            href="#" aria-label="Brand">Brand</a>
                    </div>
                    <!-- End Col -->

                    <div class="col-span-1">
                        <h4 class="font-semibold text-gray-100">Product</h4>

                        <div class="mt-3 grid space-y-3">
                            <p><a class="inline-flex gap-x-2 text-gray-400 hover:text-gray-200 focus:outline-none focus:text-gray-200 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200"
                                    href="#">Pricing</a></p>
                            <p><a class="inline-flex gap-x-2 text-gray-400 hover:text-gray-200 focus:outline-none focus:text-gray-200 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200"
                                    href="#">Changelog</a></p>
                            <p><a class="inline-flex gap-x-2 text-gray-400 hover:text-gray-200 focus:outline-none focus:text-gray-200 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200"
                                    href="#">Docs</a></p>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-span-1">
                        <h4 class="font-semibold text-gray-100">Company</h4>

                        <div class="mt-3 grid space-y-3">
                            <p><a class="inline-flex gap-x-2 text-gray-400 hover:text-gray-200 focus:outline-none focus:text-gray-200 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200"
                                    href="#">About us</a></p>
                            <p><a class="inline-flex gap-x-2 text-gray-400 hover:text-gray-200 focus:outline-none focus:text-gray-200 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200"
                                    href="#">Blog</a></p>
                            <p><a class="inline-flex gap-x-2 text-gray-400 hover:text-gray-200 focus:outline-none focus:text-gray-200 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200"
                                    href="#">Careers</a> <span
                                    class="inline-block ms-1 text-xs bg-blue-700 text-white py-1 px-2 rounded-lg">We're
                                    hiring</span></p>
                            <p><a class="inline-flex gap-x-2 text-gray-400 hover:text-gray-200 focus:outline-none focus:text-gray-200 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200"
                                    href="#">Customers</a></p>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-span-2">
                        <h4 class="font-semibold text-gray-100">Stay up to date</h4>

                        <form>
                            <div
                                class="mt-4 flex flex-col items-center gap-2 sm:flex-row sm:gap-3 bg-white rounded-lg p-2 dark:bg-slate-800">
                                <div class="w-full">
                                    <label for="hero-input" class="sr-only">Subscribe</label>
                                    <input type="text" id="hero-input" name="hero-input"
                                        class="py-3 px-4 block w-full border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:border-transparent dark:text-slate-400 dark:placeholder-slate-400 dark:focus:ring-slate-600 focus:outline-none"
                                        placeholder="Enter your email">
                                </div>
                                <a class="w-full sm:w-auto whitespace-nowrap p-3 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                    href="#">
                                    Subscribe
                                </a>
                            </div>
                            <p class="mt-3 text-sm text-gray-400">
                                Subscribe to recieve new movies uplaods
                            </p>
                        </form>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Grid -->

                <div class="mt-5 sm:mt-12 grid gap-y-2 sm:gap-y-0 sm:flex sm:justify-between sm:items-center">

                </div>
            </div>
        </div>
    </div>
</footer>
@guest
    <div id="bottom-banner" tabindex="-1"
        class="fixed bottom-0 start-0 z-50 flex justify-between w-full p-4 lg:ps-64 border-t border-gray-200 bg-slate-50 dark:bg-slate-700 dark:border-slate-600">
        <div class="flex items-center mx-auto">
            <p class="flex items-center text-sm font-normal text-gray-500 dark:text-gray-400">
                <span>Please <a href="{{ route('login') }}"
                        class=" items-center ms-0 text-sm font-medium text-blue-600 md:ms-0 md:inline-flex inline-flex dark:text-blue-500 hover:underline"
                        wire:navigate>sign in</a> to manage and personalize your movie list.</span>
            </p>
        </div>
    </div>
@endguest
<!-- ========== END FOOTER ========== -->
