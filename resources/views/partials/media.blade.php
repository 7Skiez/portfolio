<section id="{{ $portfolioSections[$i]['id'] }}" class="relative w-full pt-24 xl:pt-40">

    {{-- @dump($sectionId, $section->title) --}}

    @if($jd)<h2 class="mb-12 text-lg xl:text-2xl font-bold leading-none text-white text-opacity-30 text-center">&#60;{{ $section->title }}&#62;</h2>@endif

    @if($ivno)
        <h2 class="mb-6 text-2xl xl:text-4xl font-bold leading-none text-white text-opacity-80 text-center">{{ $portfolioSections[$i]['title'] }}</h2>
        <h3 class="mb-6 xl:mb-12 text-sm xl:text-xl font-bold leading-none text-white text-opacity-30 text-center">{{ $section->url }}</h3>
    @endif    

    <div class="relative flex flex-wrap items-center justify-center w-full">
        @foreach ($portfolio->media as $medium)
            <a href="{{ $medium->link }}" target="_blank" class="flex flex-col w-16 h-16 xl:w-24 xl:h-24 my-4 mx-4 rounded-xl justify-center items-center hover:scale-110 duration-300" style="background: linear-gradient(135deg, {{ setting('ivno.radar_color_one') }} 0%, {{ setting('ivno.radar_color_two') }} 100%)">
                <div class="flex justify-center items-center w-full h-full hover:scale-110 duration-300">
                    <img class="w-8/12 h-8/12 select-none pointer-events-none object-scale-down rounded" src="{{ Voyager::image($medium->image) }}" alt="{{ $medium->name }}">
                </div>
            </a>
        @endforeach
    </div>
</section>