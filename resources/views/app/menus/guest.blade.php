<nav class="flex items-center justify-end flex-1 hidden w-full h-full space-x-10 md:flex">
    @foreach ($menuItems as $item)
        <a @click="bt" href="#{{ $item['section_id'] }}" class="text-base leading-6 text-accent text-opacity-80 transition duration-150 ease-in-out hover:text-opacity-100 focus:text-opacity-100">
            {{ $item['section_id'] }}
        </a>
    @endforeach
</nav>
