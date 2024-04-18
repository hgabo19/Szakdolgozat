<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lift It Up!</title>
    @vite('resources/css/app.css')
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body class="antialiased">
    <div
        class="relative min-h-screen bg-gray-100 bg-center sm:flex sm:justify-center sm:items-center bg-dots-darker dark:bg-dots-lighter dark:bg-secondary-color selection:bg-action-color selection:text-white">
        <div class="absolute top-16">
            <x-application-logo />
        </div>
        @if (Route::has('login'))
            <div class="z-10 p-6 text-right sm:fixed md:text-center">
                @auth
                    <div class="flex flex-col justify-center">
                        <h1 class="pb-2 text-4xl text-gray-200 border-b-4 dark:text-white border-action-hover">Welcome back
                            to the page!</h1>
                        <a href="{{ url('/dashboard') }}"
                            class="m-8 text-3xl font-semibold text-gray-200 hover:text-gray-900 dark:text-white dark:hover:text-action-hover focus:outline focus:outline-2 focus:rounded-sm focus:accent-action-color">Dashboard</a>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="text-3xl font-semibold text-gray-400 hover:text-gray-900 dark:text-white dark:hover:text-action-hover focus:outline focus:outline-2 focus:rounded-sm focus:accent-action-color">Sign
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-24 text-3xl font-semibold text-gray-200 hover:text-gray-900 dark:text-white dark:hover:text-action-hover focus:outline focus:outline-2 focus:rounded-sm focus:accent-action-color">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</body>

</html>
