<x-app-layout>
    <div class="relative">
        <div class="absolute inset-0 h-screen text-center bg-center bg-no-repeat bg-cover"
            style="background-image: url('{{ asset('images/hero/hero-img.jpg') }}')">
            <div class="absolute inset-0 bg-black opacity-40"></div>
            <div class="absolute inset-0 w-3/4 mx-auto text-white">
                <h1
                    class="pb-5 mb-10 text-4xl font-extrabold leading-none tracking-tight text-gray-900 pt-36 md:text-5xl lg:text-8xl dark:text-white">
                    Welcome to Lift it Up!
                </h1>
                <p class="p-2 mb-6 text-lg font-normal text-gray-500 lg:text-4xl sm:px-16 xl:px-48 dark:text-gray-200">
                    Unlock Your Potential. <br> <span class="lg:text-3xl">Transform Your Lifestyle.</span> <br>
                    <span class="lg:text-3xl">Embrace the Journey.</span>
                </p>
                <a href="#"
                    class="inline-flex items-center justify-center px-5 py-3 text-lg font-medium text-center text-white rounded-lg bg-action-color hover:bg-action-hover focus:ring-2 focus:ring-blue-300 dark:focus:ring-white">
                    Get started today
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
