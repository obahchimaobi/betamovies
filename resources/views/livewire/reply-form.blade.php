<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <form wire:submit.prevent='submitReply'>
        {{-- @csrf --}}
        <div class="grid grid-cols-full gap-3">
            <div
                class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <label for="comment" class="sr-only">Your
                    name</label>
                <input type="text"
                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                    placeholder="Name (required)" @required(true) name="reply_name"
                    @auth value="{{ auth()->user()->name }}" @endauth wire:model='reply_name'>
            </div>

            @error('reply_name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div
            class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <label for="comment" class="sr-only">Your
                comment</label>
            <textarea id="comment" rows="6"
                class="px-0 w-full text-sm text-gray-700 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                placeholder="Write a comment..." required name="reply" wire:model='reply'></textarea>

            @error('reply')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit"
            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-0 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
            Post reply

            <div wire:loading>
                <div class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white rounded-full ml-1"
                    role="status" aria-label="loading">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </button>
    </form>
</div>
