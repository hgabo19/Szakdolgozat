<div>
    <div
        class="w-full p-2 mx-auto my-10 transition duration-300 ease-in-out shadow-lg animate-fade_in_up lg:w-4/5 bg-dark-charcoal lg:rounded-xl hover:shadow-xl hover:shadow-action-color shadow-action-hover">
        <div
            class="p-1 mx-3 mt-3 transition duration-300 ease-in-out rounded-full shadow-md cursor-pointer bg-action-color hover:bg-action-hover w-fit">
            <a href="{{ route('health.admin-list') }}" class="align-middle">
                @include('components.back-arrow')
            </a>
        </div>
        <div class="p-4 text-center">

            <h1 class="mb-5 text-xl font-extrabold text-white lg:text-4xl">Create a new food</h1>
        </div>

        <div class="w-full p-6 mx-auto mb-8 rounded-xl bg-secondary-color">
            <form wire:submit.prevent="save">
                @csrf
                <div class="relative z-0 flex justify-center mb-5 group">
                    <input wire:model.blur="name" type="text" name="floating_name" id="floating_name"
                        class="block py-2.5 px-0 w-2/3 text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-action-color focus:outline-none focus:ring-0 focus:border-action-hover peer"
                        placeholder="" autocomplete="off" />
                    <label for="floating_name"
                        class="peer-focus:font-medium absolute text-2xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-auto rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-action-hover peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Name
                    </label>
                </div>
                @error('name')
                    <span class="block ml-3 text-sm text-center text-red-500 md:text-base"> {{ $message }} </span>
                @enderror

                <div class="flex flex-wrap items-center justify-around w-full mt-10 align-middle">
                    <div class="w-64">
                        <label for="calories"
                            class="block mb-2 text-base font-medium text-gray-900 md:text-xl dark:text-white">Calories</label>
                        <input wire:model.blur='calories' type="text" name="calories" id="calories" min="0"
                            max="1000" placeholder="20"
                            class="block w-full p-3 text-lg text-gray-900 border border-gray-300 rounded-lg md:w-1/2 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-dark-charcoal dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-action-color dark:focus:border-acring-action-color">
                        @error('calories')
                            <span class="block ml-3 text-base text-red-500"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="w-64">
                        <label for="carbs"
                            class="block mb-2 text-base font-medium text-gray-900 md:text-xl dark:text-white">Carbs</label>
                        <input wire:model.blur='carbs' type="text" name="carbs" id="carbs" min="0"
                            max="1000" placeholder="20"
                            class="block w-full p-3 text-lg text-gray-900 border border-gray-300 rounded-lg md:w-1/2 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-dark-charcoal dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-action-color dark:focus:border-acring-action-color">
                        @error('carbs')
                            <span class="block ml-3 text-base text-red-500"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="w-64">
                        <label for="fats"
                            class="block mb-2 text-base font-medium text-gray-900 md:text-xl dark:text-white">Fats</label>
                        <input wire:model.blur='fats' type="text" name="fats" id="fats" min="0"
                            max="1000" placeholder="20"
                            class="block w-full p-3 text-lg text-gray-900 border border-gray-300 rounded-lg md:w-1/2 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-dark-charcoal dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-action-color dark:focus:border-acring-action-color">
                        @error('fats')
                            <span class="block ml-3 text-base text-red-500"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="w-64">
                        <label for="protein"
                            class="block mb-2 text-base font-medium text-gray-900 md:text-xl dark:text-white">Protein</label>
                        <input wire:model.blur='protein' type="text" name="protein" id="protein" min="0"
                            max="1000" placeholder="20"
                            class="block w-full p-3 text-lg text-gray-900 border border-gray-300 rounded-lg md:w-1/2 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-dark-charcoal dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-action-color dark:focus:border-acring-action-color">
                        @error('protein')
                            <span class="block ml-3 text-base text-red-500"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                        class="text-white bg-blue-700 mb-7 mt-10 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm md:text-2xl w-full sm:w-auto px-7 py-2.5 text-center dark:bg-action-color dark:hover:bg-action-hover dark:focus:ring-white">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
