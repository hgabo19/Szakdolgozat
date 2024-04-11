<div>
    <div
        class="w-full p-2 mx-auto my-10 transition duration-300 ease-in-out shadow-lg animate-fade_in_up lg:w-4/5 bg-dark-charcoal lg:rounded-xl hover:shadow-xl hover:shadow-action-color shadow-action-hover">
        <div
            class="p-1 mx-3 mt-3 transition duration-300 ease-in-out rounded-full shadow-md cursor-pointer bg-action-color hover:bg-action-hover w-fit">
            <a href="{{ route('exercises.admin-list') }}" class="align-middle">
                @include('components.back-arrow')
            </a>
        </div>
        <div class="p-4 text-center">

            <h1 class="mb-5 text-xl font-extrabold text-white lg:text-4xl">Create a new exercise!</h1>
        </div>

        <div class="w-full p-6 mx-auto mb-8 md:w-4/5 rounded-xl bg-secondary-color">
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
                <div class="relative z-0 flex flex-col items-center my-20 group">
                    <div>
                        <label for="muscle_group"
                            class="block mb-2 text-2xl font-medium text-gray-900 dark:text-gray-400">
                            Muscle group
                        </label>
                    </div>
                    <select id="muscle_group" wire:model.blur="muscle_group"
                        class="bg-transparent border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block md:w-1/3 w-full p-2.5 dark:bg-secondary-color dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-action-color dark:focus:border-action-color">
                        <option selected hidden value="">Choose a muscle group</option>
                        <option value="back">Back</option>
                        <option value="chest">Chest</option>
                        <option value="legs">Legs</option>
                        <option value="shoulders">Shoulders</option>
                        <option value="arms">Arms</option>
                        <option value="abs">Abs</option>
                    </select>
                    @error('muscle_group')
                        <span class="block ml-3 text-sm text-red-500 md:text-base"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="flex flex-col items-center w-full my-20">
                    <label class="block my-4 text-2xl font-bold text-gray-900 dark:text-white" for="file_input">
                        Exercise picture
                    </label>
                    <div>
                        <input wire:model='image'
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-secondary-color dark:border-gray-600 dark:placeholder-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-base file:font-semibold file:bg-action-color file:text-white"
                            aria-describedby="file_input_help" id="file_input" accept="image/png, image/jpg"
                            type="file">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400" id="file_input_help">
                            JPG or PNG
                        </p>
                    </div>
                    <div wire:loading.delay wire:target='image'>
                        <span class="text-xl text-gray-500 animate-pulse">Uploading...</span>
                    </div>
                    @error('image')
                        <span class="block ml-3 text-xs text-red-500 md:text-base"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="flex flex-col items-center">
                    <label for="description"
                        class="block mt-10 mb-2 text-sm font-medium text-gray-900 md:text-2xl dark:text-white">Description</label>
                    <textarea id="description" rows="5" wire:model='description'
                        class="block p-2.5 w-3/4 min-h-[46px] text-base text-gray-900 bg-gray-50 rounded-lg border-2 border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-secondary-color dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-action-color dark:focus:border-action-color"
                        placeholder="Write the exercise's description here..."></textarea>
                    @error('description')
                        <span class="block mt-3 ml-3 text-xs text-red-500 md:text-base"> {{ $message }} </span>
                    @enderror
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
