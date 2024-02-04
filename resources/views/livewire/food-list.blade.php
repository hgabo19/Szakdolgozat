<div class="flex flex-col gap-4">
    <table>
        <thead>
            <th class="text-left">Meal name</th>
            <th class="text-left">Calories</th>
            <th class="text-left">Protein</th>
            <th class="text-left">Fats</th>
            <th class="text-left">Carbonhydrates</th>
        </thead>
        <tbody>
        @foreach ($foods as $food)
            <tr>            
                <td>
                    <h1>{{ $food->name }}</h1>        
                </td>
                <td>
                    <h2>{{ $food->calories }}</h2>        
                </td>
                <td>
                    <h2>{{ $food->protein }}</h2>        
                </td>
                <td>
                    <h2>{{ $food->fats }}</h2>        
                </td>
                <td>
                    <h2>{{ $food->carbonhydrates }}</h2>        
                </td>
                <td>
                    <button class="font-extrabold text-2xl hover:text-3xl">+</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    
    {{ $foods->links() }}

    <div>
        <button x-data x-on:click="$dispatch('close-modal')" class="flex justify-center mx-auto mt-10 w-24 px-4 py-2 bg-transparent text-gray-800 border-2 border-solid border-gray-950 font-semibold rounded hover:bg-blue-950 hover:text-white">
            Done
        </button>
    </div>
</div>
