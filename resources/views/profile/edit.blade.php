<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto space-y-6 sm:px-6 lg:px-8">
            <div class="flex justify-center">
                <a href="{{ route('profile.show', Auth::user()) }}"
                    class="px-2 text-xl font-extrabold text-white transition duration-300 ease-in-out border-b-2 border-blue-400 lg:text-3xl hover:border-action-hover">
                    Back to profile
                </a>
            </div>
            <div
                class="p-4 transition duration-300 ease-in-out bg-white shadow sm:p-8 dark:bg-dark-charcoal sm:rounded-lg hover:shadow-lg hover:shadow-sky-400 shadow-sky-600">
                <div class="max-w-full">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div
                class="p-4 transition duration-300 ease-in-out bg-white shadow sm:p-8 dark:bg-dark-charcoal sm:rounded-lg hover:shadow-lg hover:shadow-sky-400 shadow-sky-600">
                <div class="max-w-full">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div
                class="p-4 transition duration-300 ease-in-out bg-white shadow sm:p-8 dark:bg-dark-charcoal sm:rounded-lg hover:shadow-lg hover:shadow-sky-400 shadow-sky-600">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
