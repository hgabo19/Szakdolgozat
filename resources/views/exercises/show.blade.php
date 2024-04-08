<x-app-layout>
    <div
        class="p-10 mx-auto my-10 transition duration-300 ease-in-out shadow-lg rounded-xl bg-dark-charcoal w-fit lg:w-5/6 hover:shadow-xl hover:shadow-sky-500 shadow-sky-600">
        <div class="flex items-center justify-between">
            <div
                class="hidden p-1 transition duration-300 ease-in-out rounded-full shadow-md cursor-pointer md:block bg-action-color hover:bg-action-hover">
                @can('manage', App\Models\WorkoutPlan::class)
                    <a href="{{ route('exercises.admin-list') }}" class="align-middle">
                        @include('components.back-arrow')
                    </a>
                @else
                    <a href="{{ route('exercises.index') }}" class="align-middle">
                        @include('components.back-arrow')
                    </a>
                @endcan
            </div>
            <div>
                <h1 class="text-3xl font-bold text-center dark:text-white animate-fade_in_down">{{ $exercise->name }}
                </h1>
            </div>
            <div></div>
        </div>
        <div>
            <div class="w-full mt-8">
                <div class="w-full mb-8">
                    <p
                        class="px-6 mt-10 mb-6 text-2xl font-bold text-white border-b-2 lg:text-3xl w-fit border-action-hover">
                        About
                    </p>
                    <div class="gap-5 lg:flex">
                        <img src="{{ asset('storage/' . $exercise->image_path) }}" alt="{{ $exercise->name }}"
                            class="mb-4 mr-10 rounded-lg max-h-40 lg:max-h-56 2xl:max-h-72">
                        <div class="flex flex-col w-full gap-10 h-fit">
                            <div class="flex">
                                <p class="pt-2 text-xl font-semibold text-white lg:text-3xl animate-fade_in_left">
                                    Muscle group:
                                </p>
                                <p
                                    class="px-4 pt-2 text-xl lg:text-4xl font-extrabold text-transparent capitalize animate-[fade-in-right_2s_ease-in-out] bg-clip-text bg-gradient-to-t to-emerald-500 from-sky-400">
                                    {{ $exercise->muscle_group }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <p
                        class="px-4 mt-10 mb-6 text-2xl font-bold text-white border-b-2 lg:text-3xl w-fit border-action-hover">
                        Description
                    </p>
                    <p
                        class="text-base font-bold leading-loose text-white break-words lg:text-lg indent-8 animate-fade_in_right">
                        {{ $exercise->description }}
                    </p>
                </div>

            </div>
        </div>
</x-app-layout>
