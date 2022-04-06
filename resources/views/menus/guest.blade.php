<nav class="flex items-center justify-end flex-1 hidden w-full h-full space-x-10 md:flex">

    @if($jd && menu('Jdcode', '_json'))

        @foreach (menu('Jdcode', '_json') as $item)
            <a href="{{ $item->url }}"
                class="text-base font-medium leading-6 text-gray-500 transition duration-150 ease-in-out hover:text-wave-600 focus:outline-none focus:text-wave-600">
                {{ $item->title }}
            </a>
        @endforeach

    @endif

    @if($ivno && menu('Ivno', '_json'))
        @foreach (menu('Ivno', '_json') as $i => $section)
            <a @click="debounce(blinkText, 300)" href="#{{ $portfolioSections[$i]['id'] }}" class="text-base leading-6 text-accent transition duration-150 ease-in-out hover:text-wave-400 focus:outline-none focus:text-wave-400">
                {{ $portfolioSections[$i]['id'] }}
            </a>
        @endforeach
    @endif
    
</nav>

