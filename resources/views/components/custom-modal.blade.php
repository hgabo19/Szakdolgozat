@props(['name'])
<div x-data = "{ show: false , name : '{{ $name }}' }" x-show = "show"
    x-on:open-modal.window = "show = ($event.detail.name === name)" x-on:close-modal.window = "show = false"
    x-transition.duration style="display: none;" class="fixed inset-0 z-50 overflow-y-auto transition-all">

    {{-- Gray bg --}}
    <div x-on:click="show = false" class="fixed inset-0 backdrop-blur-sm"></div>

    {{-- Body --}}
    <div class="fixed inset-0 mx-auto overflow-y-auto shadow-xl bg-gray-950 rounded-xl my-9 max-w-fit max-h-fit">
        <div>
            {{ $body }}
        </div>
    </div>
</div>
