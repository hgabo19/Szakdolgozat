<x-app-layout>
    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div
                class="p-4 transition duration-300 ease-in-out bg-white shadow sm:p-8 dark:bg-dark-charcoal sm:rounded-lg hover:shadow-lg hover:shadow-sky-400 shadow-sky-600">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div
                class="p-4 transition duration-300 ease-in-out bg-white shadow sm:p-8 dark:bg-dark-charcoal sm:rounded-lg hover:shadow-lg hover:shadow-sky-400 shadow-sky-600">
                <div class="max-w-xl">
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
