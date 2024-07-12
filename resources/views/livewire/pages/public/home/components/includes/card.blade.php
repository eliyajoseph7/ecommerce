<a class="w-full h-52 my-7 px-2" href="{{ $route }}">
    <div class="bg-gray-200 rounded-lg relative w-full">
        <div class="h-40 md:h-60 w-full">
            <img src="{{ $image }}" class="h-full w-full rounded-lg object-cover ease-in-out duration-700 hover:scale-110">
        </div>
        <div class="absolute bottom-0 left-0 right-0 mx-auto text-center w-full">
            <div class="bg-gray-50/85 max-w-32 rounded-bl-lg font-bold">
                {{ $name }}
            </div>
        </div>
    </div>
</a>