<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <form wire:submit.prevent='update' @class(['flex flex-col', 'font-bold' => false])>
        <div class="dark:bg-slate-800 p-6 rounded-lg bg-white/10 border dark:border-black/30">
            <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
                x-on:livewire-upload-error="uploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress"
                class="p-6 bg-white dark:bg-slate-800 border dark:border-slate-700 border-dotted rounded-lg shadow-md mb-3">

                <!-- Avatar Display -->
                <div class="flex flex-col items-center">
                    @if ($photo)
                        <img src="{{ $photo->temporaryUrl() }}"
                            class="w-24 h-24 rounded-full mb-3 border border-gray-300 dark:border-slate-600 shadow-sm">
                    @else
                        <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : Avatar::create(auth()->user()->name)->toBase64() }}" class="w-24 h-24 rounded-full mb-3 border border-gray-300 dark:border-slate-600 shadow-sm" alt="Profile Picture">
                    @endif
                </div>

                <!-- File Input -->
                <label class="flex justify-center items-center w-full cursor-pointer">
                    <span class="sr-only">Choose profile photo</span>
                    <input type="file" wire:model="photo" accept="image/*" class="hidden">
                    <div
                        class="py-2 px-4 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-500 transition-all duration-200">
                        Upload New Photo
                    </div>
                </label>

                @error('photo')
                    <span class="text-red-500 text-sm flex justify-center items-center mt-3">{{ $message }}</span>
                @enderror

                <!-- Upload Progress -->
                <div x-show="uploading" class="w-full mt-4">
                    <div class="h-2 bg-gray-300 dark:bg-slate-700 rounded-full overflow-hidden">
                        <div class="h-full bg-blue-600 dark:bg-blue-500 transition-all"
                            x-bind:style="'width:' + progress + '%'"></div>
                    </div>
                    <p class="text-sm mt-1 text-gray-500 dark:text-slate-400">Uploading... <span
                            x-text="progress"></span>%</p>
                </div>
            </div>
            
            <div @class(['flex flex-col mb-4', 'font-semibold' => false])>
                <label for="Name" class="text-slate-800 dark:text-slate-100">Name<span
                        @class(['text-red-500', 'font-bold' => false])>*</span></label>
                <input type="text" id="input-label"
                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-slate-700 dark:text-slate-300 dark:placeholder-slate-400 dark:focus:ring-slate-600"
                    value="{{ auth()->user()->name }}" wire:model='name' @disabled(auth()->user()->google_id) />

                @if (auth()->user()->google_id)
                    <span class="text-slate-400 text-sm dark:text-slate-500">You cannot edit your name
                        because you logged in with a Google account</span>
                @endif

                @error('name')
                    <span class="text-red-500 dark:text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div @class(['flex flex-col', 'font-semibold' => false])>
                <label for="email" class="text-slate-800 dark:text-slate-100">Email<span
                        @class(['text-red-500', 'font-bold' => false])>*</span></label>
                <input type="email" id="input-label"
                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-slate-700 dark:text-slate-300 dark:placeholder-slate-400 dark:focus:ring-slate-600"
                    wire:model='email' value="{{ auth()->user()->email }}" @disabled(auth()->user()->google_id)>
            </div>

            @if (auth()->user()->google_id)
                <span class="text-slate-400 text-sm dark:text-slate-500">You cannot edit your email because
                    you logged in with a Google account</span>
            @endif

            @error('email')
                <span class="text-red-500 dark:text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div @class(['text-end', 'font-semibold' => true])>
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg mt-5 text-white disabled:bg-blue-800 disabled:text-white/40 disabled:cursor-not-allowed"
                @disabled(auth()->user()->google_id)>
                <span wire:loading.remove>Save</span>
                <div class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white/60 rounded-full"
                    role="status" aria-label="loading" wire:loading>
                    <span class="sr-only">Loading...</span>
                </div>
            </button>
        </div>
    </form>
</div>
