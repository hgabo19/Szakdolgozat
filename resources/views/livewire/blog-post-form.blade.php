<div class="flex gap-5 px-5 py-3 mb-4 shadow-md bg-darker-gray shadow-action-color rounded-xl">
    <div class="relative overflow-hidden bg-gray-100 rounded-full w-14 h-14 dark:bg-gray-600">
        <svg class="absolute w-16 h-16 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd">
            </path>
        </svg>
    </div>
    <div>
        <textarea id="message" rows="3" cols="60"
            class="block p-2.5 w-full resize-none text-base text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-secondary-color dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-action-color dark:focus:border-blue-500"
            placeholder="Write your thoughts here..."></textarea>
        <div class="flex mt-3">
            <label for="small-input" class="block pr-4 mt-1 text-lg font-medium text-gray-900 dark:text-white">Tags:
            </label>
            <input type="text" id="small-input" placeholder="Add tags (#tag1, #tag2)"
                class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-secondary-color dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-action-color dark:focus:border-action-color">
        </div>
    </div>
    <div>
        <label for="dropzone-file"
            class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-secondary-color hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-dark-charcoal">
            <div class="flex items-center justify-center px-4 pt-5 pb-6">
                <svg class="w-8 h-8 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                </svg>
                <p class="px-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                        upload</span> <br> or drag and drop</p>
            </div>
            <input id="dropzone-file" type="file" class="hidden" />
        </label>
    </div>
    <div class="flex items-end justify-center align-middle">
        <button
            class="text-white bg-action-color hover:bg-action-hover focus:outline-none focus:ring-2 focus:ring-white font-extrabold rounded-full text-lg px-4 py-2.5 text-center dark:bg-action-color dark:hover:bg-action-hover dark:focus:ring-white">
            Add post
        </button>
    </div>
</div>
