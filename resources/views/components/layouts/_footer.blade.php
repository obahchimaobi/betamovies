<!-- ========== FOOTER ========== -->
<footer class="mt-auto bg-slate-800 w-full dark:bg-slate-950">
    <div class="w-full lg:ps-64">
        <div class="space-y-4 sm:space-y-6 mt-10">
            <div class="mt-auto w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 lg:pt-20 mx-auto">
                <!-- ========== FOOTER ========== -->
                <footer class="mt-auto w-full max-w-[85rem] @guest py-10 @endguest px-4 sm:px-6 lg:px-8 mx-auto">
                    <!-- Grid -->
                    <div class="text-center">
                        <div class="mx-auto flex justify-center pb-4">
                            <a class="flex-none text-xl font-semibold text-black dark:text-white" href="{{ route('home') }}"
                                aria-label="Brand" wire:navigate><img src="{{ asset('icons/betamovies-icon.png') }}" alt="" class="h-16 w-16"></a>
                        </div>
                        <!-- End Col -->

                        <div class="mt-3">
                            <p class="text-slate-400 dark:text-slate-500">We're part of the <a
                                    class="text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                                    href="{{ route('home') }}" wire:navigate>{{ config('app.name') }}</a> family, bringing movies closer to you.</p>
                            <p class="text-slate-400 dark:text-slate-500">
                                © 2024 {{ config('app.name') }}.
                            </p>
                        </div>

                        <!-- Social Brands -->
                        <div class="mt-3 space-x-2">
                            <a class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-500 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                href="#">
                                <svg class="shrink-0 size-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path fill="currentColor" fill-rule="evenodd" d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z" clip-rule="evenodd"/>
                                    <path fill="currentColor" d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z"/>
                                  </svg>

                            </a>
                        </div>
                        <!-- End Social Brands -->
                    </div>
                    <!-- End Grid -->
                </footer>
                <!-- ========== END FOOTER ========== -->
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
