<div 
    x-data = "{ show: false }"
    x-show = "show"
    x-on:open-modal.window = "show = true"
    x-on:close-modal.window = "show = false"
    x-on:keydown.escape.window = "show = false"
    x-transition.duration
    class="fixed z-50 inset-0 transition-all overflow-y-auto">
    
    {{-- Gray bg --}}
    <div x-on:click="show = false" class="fixed inset-0 backdrop-blur-sm"></div>

    {{-- Body --}}
    <div class="bg-gray-800 rounded-xl mx-auto mb-9 my-44 fixed inset-0 max-w-4xl shadow-xl max-h-fit overflow-y-auto">
        <div>
            {{ $body }}
        </div>
    </div>
</div>