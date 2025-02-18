<div>
    {{-- The whole world belongs to you. --}}
    <!-- Form -->
    <form wire:submit.prevent='submit'>
        @csrf
        <div class="grid gap-y-4">
            <!-- Form Group -->
            <div>
                <label for="email" class="block text-sm mb-2 dark:text-white">Name</label>
                <div class="relative">
                    <input type="text" id="name"
                        class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-700 dark:border-slate-600 dark:text-slate-300 dark:placeholder-slate-500 dark:focus:ring-blue-600 focus:outline-none"
                        aria-describedby="email-error" wire:model='name'>
                    <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                        <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor"
                            viewBox="0 0 16 16" aria-hidden="true">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </div>
                </div>
                @error('name')
                    <span class="error text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <!-- End Form Group -->

            <!-- Form Group -->
            <div>
                <label for="email" class="block text-sm mb-2 dark:text-white">Email address</label>
                <div class="relative">
                    <input type="email" id="email"
                        class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-700 dark:border-slate-600 dark:text-slate-300 dark:placeholder-slate-500 dark:focus:ring-blue-600 focus:outline-none"
                        aria-describedby="email-error" wire:model='email'>
                    <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                        <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor"
                            viewBox="0 0 16 16" aria-hidden="true">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </div>
                </div>
                @error('email')
                    <span class="text-red-500 dark:text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <!-- End Form Group -->

            <!-- Form Group -->
            <div>
                <label for="password" class="block text-sm mb-2 dark:text-white">Password</label>
                <!-- Strong Password -->
                <div class="max-w-full">
                    <div class="flex">
                        <div class="relative flex-1">
                            <input type="password" id="hs-strong-password-with-indicator-and-hint-in-popover"
                                class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-700 dark:border-slate-600 dark:text-slate-300 dark:placeholder-slate-500 dark:focus:ring-blue-600 focus:outline-none"
                                wire:model='password'>
                            <div id="hs-strong-password-popover"
                                class="hidden absolute z-10 w-full bg-white shadow-md rounded-lg p-4 dark:bg-slate-700 dark:border dark:border-slate-700 dark:divide-slate-700">
                                <div id="hs-strong-password-in-popover"
                                    data-hs-strong-password='{
                                        "target": "#hs-strong-password-with-indicator-and-hint-in-popover",
                                        "hints": "#hs-strong-password-popover",
                                        "stripClasses": "hs-strong-password:opacity-100 hs-strong-password-accepted:bg-teal-500 h-2 flex-auto rounded-full bg-blue-500 opacity-50 mx-1",
                                        "mode": "popover"
                                      }'
                                    class="flex mt-2 -mx-1">
                                </div>

                                <h4 class="mt-3 text-sm font-semibold text-slate-800 dark:text-white">
                                    Your password must contain:
                                </h4>

                                <ul class="space-y-1 text-sm text-gray-500 dark:text-slate-400">
                                    <li data-hs-strong-password-hints-rule-text="min-length"
                                        class="hs-strong-password-active:text-teal-500 flex items-center gap-x-2">
                                        <span class="hidden" data-check="">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <polyline points="20 6 9 17 4 12"></polyline>
                                            </svg>
                                        </span>
                                        <span data-uncheck="">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M18 6 6 18"></path>
                                                <path d="m6 6 12 12"></path>
                                            </svg>
                                        </span>
                                        Minimum number of characters is 6.
                                    </li>
                                    <li data-hs-strong-password-hints-rule-text="lowercase"
                                        class="hs-strong-password-active:text-teal-500 flex items-center gap-x-2">
                                        <span class="hidden" data-check="">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <polyline points="20 6 9 17 4 12"></polyline>
                                            </svg>
                                        </span>
                                        <span data-uncheck="">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M18 6 6 18"></path>
                                                <path d="m6 6 12 12"></path>
                                            </svg>
                                        </span>
                                        Should contain lowercase.
                                    </li>
                                    <li data-hs-strong-password-hints-rule-text="uppercase"
                                        class="hs-strong-password-active:text-teal-500 flex items-center gap-x-2">
                                        <span class="hidden" data-check="">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <polyline points="20 6 9 17 4 12"></polyline>
                                            </svg>
                                        </span>
                                        <span data-uncheck="">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M18 6 6 18"></path>
                                                <path d="m6 6 12 12"></path>
                                            </svg>
                                        </span>
                                        Should contain uppercase.
                                    </li>
                                    <li data-hs-strong-password-hints-rule-text="numbers"
                                        class="hs-strong-password-active:text-teal-500 flex items-center gap-x-2">
                                        <span class="hidden" data-check="">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <polyline points="20 6 9 17 4 12"></polyline>
                                            </svg>
                                        </span>
                                        <span data-uncheck="">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M18 6 6 18"></path>
                                                <path d="m6 6 12 12"></path>
                                            </svg>
                                        </span>
                                        Should contain numbers.
                                    </li>
                                    <li data-hs-strong-password-hints-rule-text="special-characters"
                                        class="hs-strong-password-active:text-teal-500 flex items-center gap-x-2">
                                        <span class="hidden" data-check="">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <polyline points="20 6 9 17 4 12"></polyline>
                                            </svg>
                                        </span>
                                        <span data-uncheck="">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M18 6 6 18"></path>
                                                <path d="m6 6 12 12"></path>
                                            </svg>
                                        </span>
                                        Should contain special characters.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Strong Password -->
                @error('password')
                    <span class="error text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <!-- End Form Group -->

            <!-- Checkbox -->
            <div class="flex items-center">
                <div class="flex">
                    <input id="remember-me" type="checkbox"
                        class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-slate-800 dark:border-slate-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                        wire:model='checkbox'>
                </div>
                <div class="ms-3">
                    <label for="remember-me" class="text-sm dark:text-white">I accept the <a
                            class="text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                            href="#">Terms and Conditions</a></label>
                </div>
            </div>

            @error('checkbox')
                <span class="error text-red-500 -mt-4">{{ $message }}</span>
            @enderror
            <!-- End Checkbox -->

            <button type="submit"
                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Sign
                up

                <div class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white rounded-full"
                    role="status" aria-label="loading" wire:loading>
                    <span class="sr-only">Loading...</span>
                </div>
            </button>
        </div>
    </form>
    <!-- End Form -->
</div>
