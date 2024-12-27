<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <form wire:submit.prevent='update' @class(['flex flex-col', 'font-bold' => false])>
        <div class="dark:bg-slate-800 p-6 rounded-lg bg-white/10 border dark:border-black/30">
            <div class="mb-5">
                <h1 class="text-slate-800 dark:text-slate-100">Photo</h1>
                <img src="{{ auth()->user()->avatar ?? Avatar::create(auth()->user()->name)->setBackground('#000000')->toGravatar() }}" alt=""
                    class="rounded-full mt-3 border h-32 w-32">
            </div>
            <div @class(['flex flex-col mb-4', 'font-semibold' => false])>
                <label for="Name" class="text-slate-800 dark:text-slate-100">Name<span
                        @class(['text-red-500', 'font-bold' => false])>*</span></label>
                <input type="text" id="input-label"
                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-slate-700 dark:text-slate-300 dark:placeholder-slate-400 dark:focus:ring-slate-600" value="{{ auth()->user()->name }}" wire:model='name' @disabled(auth()->user()->google_id) />

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
                @disabled(auth()->user()->google_id)>Save
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
