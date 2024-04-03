@props(['name'])
<div x-data = "{ show: false , name : '{{ $name }}' }" x-show = "show"
    x-on:open-modal.window = "show = ($event.detail.name === name)" x-on:close-modal.window = "show = false"
    x-transition.duration style="display: none;" class="fixed inset-0 z-50 overflow-y-auto transition-all">

    {{-- Gray bg --}}
    <div x-on:click="show = false" class="fixed inset-0 backdrop-blur-sm"></div>

    {{-- Body --}}
    <div
        class="fixed inset-0 w-full max-h-screen mx-auto overflow-y-auto shadow-xl md:mt-6 md:max-h-fit bg-darker-gray md:rounded-3xl md:max-w-fit">
        <div>
            {{ $body }}
        </div>
    </div>
</div>
