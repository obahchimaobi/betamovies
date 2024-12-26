<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <form wire:submit.prevent='submitComment'>
        {{-- @csrf --}}
        <div class="grid grid-cols-full gap-3">
            <div
                class="py-1 px-4 mb-4 bg-white rounded-lg rounded-t-lg border-slate-200 dark:bg-slate-800 dark:border-slate-700">
                <label for="comment" class="sr-only">Your name</label>
                <input type="text"
                    class="px-0 w-full text-sm text-slate-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-slate-400 dark:bg-slate-800"
                    placeholder="Name (required)" name="commentor"
                    @auth value="{{ auth()->user()->name }}" @endauth
                    wire:model='commentor' required>

                    @error('commentor')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
            </div>
        </div>
        <div
            class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border-slate-200 dark:bg-slate-800 dark:border-slate-700">
            <label for="comment" class="sr-only">Your comment</label>
            <textarea id="comment" rows="6"
                class="px-0 w-full text-sm text-slate-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-slate-400 dark:bg-slate-800"
                placeholder="Write a comment..."  name="comment" wire:model='comment' required></textarea>

            @error('comment')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit"
            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-0 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
            Post comment

            <div wire:loading>
                <div class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white rounded-full ml-1"
                    role="status" aria-label="loading">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </button>
    </form>
</div>
