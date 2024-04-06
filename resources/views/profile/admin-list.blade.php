<x-app-layout>
    <div
        class="w-full p-2 mx-auto my-10 transition duration-300 ease-in-out shadow-lg lg:w-3/4 bg-dark-charcoal lg:rounded-xl hover:shadow-xl hover:shadow-purple shadow-purple">
        <div class="p-4 text-center animate-fade_in_down">
            <h1 class="my-5 text-xl font-extrabold text-white lg:text-4xl">Users</h1>
        </div>
        @if (session('success'))
            <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="p-4 mb-4 text-base text-center text-green-800 rounded-lg bg-green-50 dark:bg-dark-charcoal dark:text-green-400"
                role="alert">
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif
        <div class="w-full pb-5">
            <div class="relative w-full mx-auto mt-4 overflow-x-auto sm:rounded-lg animate-fade_in_up">
                <table
                    class="w-full text-sm text-left text-gray-500 shadow-md min-w-fit rtl:text-right dark:text-gray-400">
                    <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-action-color dark:text-white">
                        <tr>
                            <th class="w-16 px-4 text-center">
                                Avatar
                            </th>
                            <th scope="col" class="px-4 py-3 w-36">
                                Name
                            </th>
                            <th scope="col" class="w-10 px-4 py-3">
                                Username
                            </th>
                            <th scope="col" class="w-8 px-4 py-3 text-center">
                                Email
                            </th>
                            <th scope="col" class="w-8 px-4 py-3">
                                Admin
                            </th>
                            <th scope="col" class="w-8 px-4 py-3 text-center align-bottom">
                                Registered
                            </th>
                            <th class="w-16 px-4 text-center">
                                Make admin
                            </th>
                            <th class="w-16 px-4 text-center">
                                Delete
                            </th>
                            <th class="w-16 px-4 text-center">
                                View
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr wire:key='{{ $user->id }}'
                                class="border-b-2 odd:bg-white odd:dark:bg-secondary-color border-action-color even:bg-gray-50 even:dark:bg-secondary-color">
                                <td class="px-4 py-4 text-center">
                                    @if ($user->avatar)
                                        <x-user-avatar :user="$user" class="h-14 w-14" />
                                    @else
                                        <div
                                            class="relative overflow-hidden bg-gray-100 rounded-full w-14 h-14 dark:bg-gray-600">
                                            <svg class="absolute w-16 h-16 text-gray-400 -left-1" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                    clip-rule="evenodd">
                                                </path>
                                            </svg>
                                        </div>
                                    @endif
                                </td>
                                <td scope="row"
                                    class="w-10 px-4 py-4 font-medium text-gray-900 break-words dark:text-white">
                                    <h1 class="text-base">{{ $user->name }}</h1>
                                </td>
                                <td class="px-6 py-4 text-base">
                                    <p>{{ $user->username }}</p>
                                </td>
                                <td class="px-4 py-4 text-base text-center">
                                    <p>{{ $user->email }}</p>
                                </td>
                                <td class="px-4 py-4 text-base text-center">
                                    <p>{{ $user->is_admin ? 'Yes' : 'No' }}</p>
                                </td>
                                <td class="px-4 py-4 text-base text-center">
                                    <p>{{ $user->created_at }}</p>
                                </td>
                                <td class="px-4 py-4 text-center">
                                    <form action="{{ route('profile.admin-grant', $user) }}" method="POST">
                                        @csrf
                                        @if ($user->is_admin)
                                            <button type="submit">
                                                @include('components.minus-button')
                                            </button>
                                        @else
                                            <button type="submit">
                                                @include('components.plus-button')
                                            </button>
                                        @endif
                                    </form>
                                </td>
                                <td class="py-4 text-center">
                                    <form action='{{ route('profile.admin-delete', $user) }}' method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-white font-medium rounded-full text-base px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="black" class="w-7 h-7">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                                <td class="py-4 text-center">
                                    <form action='{{ route('profile.show', $user) }}' method="get">
                                        @csrf
                                        <button type="submit"
                                            class="text-white bg-action-color hover:bg-action-hover focus:outline-none focus:ring-2 focus:ring-white font-medium rounded-full text-base px-5 py-2.5 text-center dark:bg-action-color dark:hover:bg-action-hover dark:focus:ring-white">
                                            @include('components.view-icon')
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-10 mb-5">
                    {{ $users->links('pagination.custom-pagination') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
