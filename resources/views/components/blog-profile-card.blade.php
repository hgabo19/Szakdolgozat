<div class="py-5 shadow-md bg-darker-gray rounded-xl shadow-action-color">
    <div class="flex flex-col items-center justify-center">
        {{-- temp image  --}}
        <div class="relative w-[5.5rem] h-[5.5rem] overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
            <svg class="absolute w-24 h-[6.5rem] text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd">
                </path>
            </svg>
        </div>
        <div class="mt-2">
            <p class="text-2xl text-white">{{ Auth::user()->name }}</p>
        </div>
        <div>
            <p class="text-xl text-gray-400">&commat;{{ Auth::user()->username }}</p>
        </div>
        <div class="mt-2">
            <p class="px-4 text-base text-center text-gray-400">Lorem, ipsum dolor sit amet
                consectetur
                adipisicing
                elit.</p>
        </div>
    </div>
    <div>
        <hr class="h-px mx-2 mt-6 mb-4 bg-gray-200 border-0 dark:bg-gray-500">
    </div>
    <div class="flex justify-center">
        <div class="pr-6 border-r-2 border-gray-400">
            <p class="text-2xl font-extrabold text-center text-white">5123</p>
            <p class="text-base text-gray-400">Followers</p>
        </div>
        <div class="pl-6">
            <p class="text-2xl font-extrabold text-center text-white">6523</p>
            <p class="text-base text-gray-400">Following</p>
        </div>
    </div>
    <div>
        <hr class="h-px mx-2 mt-4 mb-4 bg-gray-200 border-0 dark:bg-gray-500">
    </div>
    <div class="flex justify-center">
        <a href="#"
            class="px-2 text-2xl font-extrabold text-white transition duration-300 ease-in-out border-b-2 border-blue-400 hover:border-action-hover">
            Profile</a>
    </div>
</div>
