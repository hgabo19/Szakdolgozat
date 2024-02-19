<div class="flex justify-between gap-4">
    <x-bladewind.progress-circle 
              percentage="{{ $percent }}"
              size="300"
              circle_width="40"
              text_size="50"
              color="purple"
              align="80"
              valign="0"
              show_label="true"
              show_percent="true"/>
    <div class="w-fit mt-5">
        <table>
            <tbody>
                <tr>
                    <td>
                        <h1 class="text-white text-2xl">Calories</h1>
                    </td>
                    <td>
                        <h1 class="text-white text-xl">{{ $totalCalories }}</h1>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h1 class="text-white text-2xl pr-8">Carbonhydrates</h1>
                    </td>
                    <td>
                        <h1 class="text-white text-xl">{{ $totalCarbonhydrates }}</h1>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h1 class="text-white text-2xl">Fats</h1>
                    </td>
                    <td>
                        <h1 class="text-white text-xl">{{ $totalFat }}</h1>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h1 class="text-white text-2xl">Protein</h1>
                    </td>
                    <td>
                        <h1 class="text-white text-xl">{{ $totalProtein }}</h1>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>