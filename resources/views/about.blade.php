<x-app-layout>
    <div class="p-10 mt-10 text-sm text-white md:text-xl">
        <div>
            <h1 class="text-base text-center md:text-5xl ">About this application</h1>
        </div>
        <div class="mt-10">
            <p>I obtained the descriptions for the workout plans and exercises from the website <span><a
                        href="https://shopbuilder.hu/" class="hover:text-action-hover">https://shopbuilder.hu/</a></span>
            </p>
            <p class="p-5">
                The images used can be accessed at the following links:
            </p>
            <div class="flex flex-wrap pl-10">
                @foreach ($linksArray as $name => $link)
                    <a href="{{ $link }}" class="hover:text-action-hover" target="_blank">
                        {{ $name }}</a>
                    @if (!$loop->last)
                        <p class="px-2">,</p>
                    @endif
                @endforeach
            </div>
        </div>

    </div>
</x-app-layout>
