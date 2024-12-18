<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <form wire:submit.prevent='update_password' @class(['flex flex-col', 'font-bold' => false])>
        <div class="dark:bg-slate-800 p-6 rounded-lg bg-white/10 border dark:border-black/30">
            <div @class(['flex flex-col mb-4', 'font-semibold' => false])>
                <label for="Name" class="text-slate-800 dark:text-slate-100">Current Password<span
                        @class(['text-red-500', 'font-bold' => false])>*</span></label>
                <div class="relative">
                    <input id="hs-toggle-password" type="password"
                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-slate-700 dark:text-slate-300 dark:placeholder-slate-400 dark:focus:ring-slate-600"
                        value="" wire:model='old_password'>
                    <button type="button" data-hs-toggle-password='{ "target": "#hs-toggle-password" }'
                        class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-blue-600 dark:text-slate-600 dark:focus:text-blue-500">
                        <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24">
                            </path>
                            <path class="hs-password-active:hidden"
                                d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                            </path>
                            <path class="hs-password-active:hidden"
                                d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
                            </path>
                            <line class="hs-password-active:hidden" x1="2" x2="22" y1="2"
                                y2="22"></line>
                            <path class="hidden hs-password-active:block"
                                d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                            <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3">
                            </circle>
                        </svg>
                    </button>
                </div>
                @error('old_password')
                    <span class="text-red-500 dark:text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div @class(['flex flex-col mb-4', 'font-semibold' => false])>
                <label for="Name" class="text-slate-800 dark:text-slate-100">New Password<span
                        @class(['text-red-500', 'font-bold' => false])>*</span></label>
                <input type="password" id="input-label"
                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-slate-700 dark:text-slate-300 dark:placeholder-slate-400 dark:focus:ring-slate-600"
                    value="" wire:model='new_password'>
                @error('new_password')
                    <span class="text-red-500 dark:text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div @class(['flex flex-col', 'font-semibold' => false])>
                <label for="Name" class="text-slate-800 dark:text-slate-100">Confirm Password<span
                        @class(['text-red-500', 'font-bold' => false])>*</span></label>
                <input type="password" id="input-label"
                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-slate-700 dark:text-slate-300 dark:placeholder-slate-400 dark:focus:ring-slate-600"
                    value="" wire:model='new_password_confirmation'>

                @error('new_password_confirmation')
                    <span class="text-red-500 dark:text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div @class(['text-end', 'font-semibold' => true])>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg mt-5 text-white">Save

                <div wire:loading>
                    <div class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white rounded-full"
                        role="status" aria-label="loading">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </button>
        </div>
    </form>
</div>
