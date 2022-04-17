<nav class="flex items-center justify-end flex-1 hidden w-full h-full space-x-10 md:flex">
    @foreach ($menuItems as $item)
        <a @click="document.debounce(document.blinkText, 300)" href="#{{ $item['section_id'] }}" class="text-base leading-6 text-accent transition duration-150 ease-in-out hover:text-wave-400 focus:outline-none focus:text-wave-400">
            {{ $item['section_id'] }}
        </a>
    @endforeach
</nav>
