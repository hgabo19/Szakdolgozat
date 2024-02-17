@props(['name'])
<div 
    x-data = "{ show: false , name : '{{ $name }}' }"
    x-show = "show"
    x-on:open-modal.window = "show = ($event.detail.name === name)"
    x-on:close-modal.window = "show = false"
    x-transition.duration
    style="display: none;"
    class="fixed z-50 inset-0 transition-all overflow-y-auto">
    
    {{-- Gray bg --}}
    <div x-on:click="show = false" class="fixed inset-0 backdrop-blur-sm"></div>

    {{-- Body --}}
    <div class="bg-gray-950 rounded-xl mx-auto my-9 fixed inset-0 max-w-fit shadow-xl max-h-fit overflow-y-auto">
        <div>
            {{ $body }}
        </div>
    </div>
</div>