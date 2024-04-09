<form enctype="multipart/form-data" wire:submit.prevent="save" method="POST">
    @csrf
    @method('PATCH')
    <div class="gap-5 px-5 py-3 lg:flex bg-dark-gray rounded-xl">
        <div class="flex justify-between">
            <h1 class="text-xl text-center text-white">Edit your post!</h1>
            <div
                class="p-1 transition duration-300 ease-in-out rounded-full lg:hidden bg-action-color hover:bg-action-hover">
                <button x-data x-on:click="$dispatch('close-modal')" class="align-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="white" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="mt-4 lg:mt-0">
            <textarea wire:model.blur="body" id="message" rows="3" cols="60"
                class="block p-2.5 w-full resize-none text-base text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-secondary-color dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-action-color dark:focus:border-blue-500"
                placeholder="Write your thoughts here...">
            </textarea>
            @error('body')
                <span class="block ml-3 text-sm text-center text-red-500 md:text-base"> {{ $message }} </span>
            @enderror
            <div class="flex mt-3">
                <label for="small-input"
                    class="block pr-4 mt-1 text-lg font-medium text-gray-900 dark:text-white">Categories:
                </label>
                <input wire:model.blur="tagString" type="text" id="small-input" placeholder="#tag1, #tag2"
                    class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-secondary-color dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-action-color dark:focus:border-action-color">
            </div>
            @error('tagString')
                <span class="block ml-3 text-sm text-center text-red-500 md:text-base"> {{ $message }} </span>
            @enderror
        </div>
        <div class="my-5 lg:my-0">
            @error('image')
                <span class="block ml-3 text-sm text-center text-red-500 md:text-base"> {{ $message }} </span>
            @enderror
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-secondary-color dark:border-gray-600 dark:placeholder-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-base file:font-semibold file:bg-action-color file:text-white"
                name="avatar" id="image" wire:model='postImage' accept="image/png, image/jpg" type="file">
            {{-- <input wire:model='postImage' accept="image/png, image/jpg" type="file" /> --}}
            <div>
                <div wire:loading.delay wire:target='postImage'>
                    <span class="text-xl text-gray-500 animate-pulse">Uploading...</span>
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center justify-center align-middle lg:items-end lg:justify-between">
            <div class="my-2 lg:my-0">
                @if ($postImage)
                    <img class="mt-2 rounded h-14" src="{{ $postImage->temporaryUrl() }}" alt="post-img">
                @endif
            </div>
            <div class="my-2 lg:my-0">
                <button type="submit"
                    class="text-white bg-action-color hover:bg-action-hover focus:outline-none focus:ring-2 focus:ring-white font-extrabold rounded-full text-sm 2xl:text-lg px-4 py-2.5 text-center dark:bg-action-color dark:hover:bg-action-hover dark:focus:ring-white">
                    Post
                </button>
            </div>
        </div>
    </div>
</form>
