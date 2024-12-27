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
                        class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:border-slate-700 dark:text-neutral-400 dark:placeholder-slate-500 dark:focus:ring-slate-600 focus:outline-none"
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
                        class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:border-slate-700 dark:text-neutral-400 dark:placeholder-slate-500 dark:focus:ring-slate-600 focus:outline-none"
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
                <div class="relative">
                    <input type="password" id="password"
                        class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:border-slate-700 dark:text-neutral-400 dark:placeholder-slate-500 dark:focus:ring-slate-600 focus:outline-none"
                         aria-describedby="password-error" wire:model='password'>
                    <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                        <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor"
                            viewBox="0 0 16 16" aria-hidden="true">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </div>
                </div>
                @error('password')
                    <span class="error text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <!-- End Form Group -->

            <!-- Checkbox -->
            <div class="flex items-center">
                <div class="flex">
                    <input id="remember-me" type="checkbox"
                        class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-slate-800 dark:border-slate-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" wire:model='checkbox'>
                </div>
                <div class="ms-3">
                    <label for="remember-me" class="text-sm dark:text-white">I accept the <a
                            class="text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                            href="#">Terms and Conditions</a></label>
                </div>
            </div>

            @error('checkbox')
                <span class="error text-red-500">{{ $message }}</span>
            @enderror
            <!-- End Checkbox -->

            <button type="submit"
                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Sign
                up

                <div wire:loading>
                    <div class="animate-spin inline-block size-5 border-[3px] border-current border-t-transparent text-white rounded-full"
                        role="status" aria-label="loading">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </button>
        </div>
    </form>
    <!-- End Form -->
</div>
