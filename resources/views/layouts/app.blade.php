<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div class="relative min-h-screen md:flex" x-data="{ open: false }">
        <!-- Sidebar -->
        <aside :class="{ '-translate-x-full': !open }"
            class="absolute inset-y-0 left-0 z-10 w-56 px-2 py-4 overflow-y-auto text-white transition duration-200 ease-in-out transform -translate-x-full border-r-2 shadow-lg border-action-hover bg-secondary-color lg:w-64 md:relative md:translate-x-0">
            <!-- Logo -->
            <div class="flex items-center justify-between px-2">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo />
                    </a>
                </div>

                <!-- Button -->
                <button type="button" @click="open = !open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 rounded-md md:hidden hover:bg-blue-500 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="block w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Nav links -->
            <nav class="flex flex-col items-center justify-center mt-5">
                @if (!Auth::user()->is_admin)
                    @include('layouts.navigation.user-navigation')
                @else
                    @include('layouts.navigation.admin-navigation')
                @endif
            </nav>
        </aside>

        <!-- Main content -->
        <main class="flex flex-col w-full h-screen min-h-screen overflow-auto bg-secondary-color">
            <nav>
                <div class="px-2 mx-auto border-b-2 border-action-hover sm:py-4 sm:px-6 lg:px-8">
                    <div class="relative flex items-center justify-between h-16 md:justify-end">
                        <div class="absolute inset-y-0 left-0 flex items-center md:hidden">

                            <!-- Mobile button -->
                            <button type="button" @click="open = !open" @click.away="open = false"
                                class="sticky inline-flex items-center justify-center p-2 text-blue-100 rounded-md hover:bg-blue-500 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                            </button>
                        </div>
                        <!-- Profile button -->
                        @auth
                            <div class="absolute inset-y-0 right-0 flex items-center mr-10">

                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button
                                            class="inline-flex items-center px-4 py-4 text-xl font-medium leading-4 text-gray-500 transition duration-200 ease-in-out bg-white rounded-lg dark:text-white dark:bg-action-color dark:hover:bg-action-hover hover:text-gray-100 dark:hover:text-gray-300 focus:outline-none">
                                            <div>{{ Auth::user()->username }}</div>

                                            <div class="ml-1">
                                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('profile.show', Auth::user())">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        @endauth
                    </div>
                </div>
            </nav>
            <section>
                <div>
                    {{ $slot }}
                </div>
            </section>
            <footer class="mt-auto bg-white border-t-2 dark:bg-darker-gray border-action-color">
                <div class="w-full p-4 mx-auto">
                    <div class="sm:flex sm:items-center sm:justify-evenly sm:gap-32">
                        <h1 class="text-lg font-extrabold text-white lg:text-3xl">Lift It Up!</h1>
                        <div class="grid grid-cols-2 gap-8 mt-4 sm:gap-28 sm:grid-cols-3 lg:pr-10">
                            <div>
                                <h2
                                    class="mb-6 text-sm font-semibold text-gray-900 uppercase lg:text-lg dark:text-white">
                                    Technologies
                                </h2>
                                <ul class="font-medium text-gray-500 dark:text-gray-400">
                                    <li class="mb-4 lg:text-lg">
                                        <a href="https://tallstack.dev/" class="hover:underline" target="_blank"
                                            rel="noopener noreferrer">Tall stack</a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h2
                                    class="mb-6 text-sm font-semibold text-gray-900 uppercase lg:text-lg dark:text-white">
                                    Source
                                    code
                                </h2>
                                <ul class="font-medium text-gray-500 dark:text-gray-400">
                                    <li class="mb-4 lg:text-lg">
                                        <a href="https://github.com/hgabo19/Szakdolgozat" class="hover:underline"
                                            target="_blank" rel="noopener noreferrer">Github</a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h2
                                    class="mb-6 text-sm font-semibold text-gray-900 uppercase lg:text-lg dark:text-white">
                                    Creator
                                </h2>
                                <ul class="font-medium text-gray-500 dark:text-gray-400">
                                    <li class="mb-4 lg:text-lg">
                                        <p>Gábor Huszka</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </main>
    </div>
    @livewireScripts
</body>

</html>
