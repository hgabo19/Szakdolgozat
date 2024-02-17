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
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-secondary-color selection:bg-action-color selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-200 hover:text-gray-900 dark:text-white dark:hover:text-action-hover focus:outline focus:outline-2 focus:rounded-sm focus:accent-action-color">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-2xl text-gray-400 hover:text-gray-900 dark:text-white dark:hover:text-action-hover focus:outline focus:outline-2 focus:rounded-sm focus:accent-action-color">Sign in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-24 font-semibold text-2xl text-gray-200 hover:text-gray-900 dark:text-white dark:hover:text-action-hover focus:outline focus:outline-2 focus:rounded-sm focus:accent-action-color">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </body>
</html>
