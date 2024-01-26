<a class="h-52 md:w-80 my-7 px-2" href="{{ $route }}">
    <div class="bg-gray-200 rounded-lg relative">
        <div class="h-60">
            <img src="{{ $image }}" class="h-full w-full rounded-lg object-cover ease-in-out duration-700 hover:scale-105">
        </div>
        <div class="absolute bottom-0 left-0 right-0 mx-auto text-center">
            <div class="bg-gray-50/85 max-w-32 rounded-bl-lg font-bold">
                {{ $name }}
            </div>
        </div>
    </div>
</a>