<x-app-layout>
    <div class="p-10 mx-auto my-10 rounded-xl bg-dark-charcoal w-fit lg:w-5/6">
        <div class="flex items-center justify-between">
            <div
                class="p-1 transition duration-300 ease-in-out rounded-full shadow-md cursor-pointer bg-action-color hover:bg-action-hover">
                @can('manage', App\Models\WorkoutPlan::class)
                    <a href="{{ route('workout-plans.admin-list') }}" class="align-middle">
                        @include('components.back-arrow')
                    </a>
                @else
                    <a href="{{ route('workout-plans.index') }}" class="align-middle">
                        @include('components.back-arrow')
                    </a>
                @endcan
            </div>
            <div>
                <h1 class="text-3xl font-bold dark:text-white">{{ $workoutPlan->title }}</h1>
            </div>
            @can('saveToUser', App\Models\WorkoutPlan::class)
                <div>
                    <form
                        action="{{ route('save.workout.plan', ['userId' => Auth::id(), 'workoutPlanId' => $workoutPlan->id]) }}"
                        method="POST">
                        @csrf
                        @method('POST')
                        <div
                            class="p-2 transition duration-300 ease-in-out rounded-lg bg-action-color dark:focus:ring-white focus:outline-none focus:ring-2 focus:ring-white hover:bg-action-hover">
                            <button class="align-middle" type="submit">
                                <span class="text-xl text-white">Save</span>
                            </button>
                        </div>
                    </form>
                </div>
            @else
                <div></div>
            @endcan
        </div>
        <div>
            <div class="w-full mt-8">

                <div class="w-full mb-8">
                    <h1 class="px-4 mt-10 mb-6 text-2xl font-bold text-white border-b-2 w-fit border-action-hover">
                        Description
                    </h1>
                    <img src="{{ asset('storage/' . $workoutPlan->image_path) }}" alt="{{ $workoutPlan->title }}"
                        class="float-left mb-4 mr-10 rounded-lg h-72">
                    <p class="leading-loose text-white break-words indent-8">This is your
                        paragraph
                        content. It will wrap
                        around
                        the image on the left and continue below the image if the content is too long. You can
                        adjust the width of the image and margin using Tailwind classes. Make sure this content
                        isn't excessively long or contains unexpected characters that cause overflow.This is your
                        paragraph content. It will wrap around the image on the left and continue below the image if
                        the content is too long. You can adjust the width of the image and margin using Tailwind
                        classes. Make sure this content isn't excessively long or contains unexpected characters
                        that cause overflow.This is your paragraph content. It will wrap around the image on the
                        left and continue below the image if the content is too long. You can adjust the width of
                        the image and margin using Tailwind classes. Make sure this content isn't excessively long
                        or contains unexpected characters that cause overflow.This is your paragraph content. It
                        will wrap around the image on the left and continue below the image if the content is too
                        long. You can adjust the width of the image and margin using Tailwind classes. Make sure
                        this content isn't excessively long or contains unexpected characters that cause
                        overflow.This is your paragraph content. It will wrap around the image on the left and
                        continue below the image if the content is too long. You can adjust the width of the image
                        and margin using Tailwind classes. Make sure this content isn't excessively long or contains
                        unexpected characters that cause overflow.</p>
                </div>


                <h2 class="mb-4 text-xl font-semibold text-center">Exercises</h2>

                <div>
                    @foreach ($workoutPlan->exercises as $exercise)
                        <li class="mb-2">
                            <strong>{{ $exercise->name }}</strong>
                            <p class="text-gray-600">{{ $exercise->description }}</p>
                            <img src="{{ asset($exercise->image_path) }}" alt="{{ $exercise->name }}"
                                class="mt-2 rounded-lg h-36">
                        </li>
                    @endforeach
                </div>
            </div>
        </div>
</x-app-layout>
