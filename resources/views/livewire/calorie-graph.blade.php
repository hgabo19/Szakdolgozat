<div class="lg:flex lg:justify-between lg:gap-4">
    <div class="pb-1 mb-2">
        <x-bladewind.progress-circle percentage="{{ $percent }}" size="200" circle_width="40" text_size="50"
            color="purple" align="80" valign="0" show_label="true" show_percent="true" />
    </div>
    <div class="mt-5 w-fit">
        <table>
            <tbody>
                <tr>
                    <td>
                        <h1 class="text-2xl text-white">Calories</h1>
                    </td>
                    <td>
                        <h1 class="text-xl text-white">{{ $totalCalories }}</h1>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h1 class="pr-8 text-2xl text-white">Carbonhydrates</h1>
                    </td>
                    <td>
                        <h1 class="text-xl text-white">{{ $totalCarbonhydrates }}</h1>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h1 class="text-2xl text-white">Fats</h1>
                    </td>
                    <td>
                        <h1 class="text-xl text-white">{{ $totalFat }}</h1>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h1 class="text-2xl text-white">Protein</h1>
                    </td>
                    <td>
                        <h1 class="text-xl text-white">{{ $totalProtein }}</h1>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
