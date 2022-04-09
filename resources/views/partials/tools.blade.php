<section id="{{ $sections[$i]['id'] }}" class="relative w-full pt-24 xl:pt-40">

    @if($jd)<h2 class="mb-12 text-lg xl:text-2xl font-bold leading-none text-white text-opacity-30 text-center">&#60;{{ $section->title }}&#62;</h2>@endif

    @if($ivno)
        <h2 class="mb-6 text-2xl xl:text-4xl font-bold leading-none text-white text-opacity-80 text-center">{{ $sections[$i]['title'] }}</h2>
        <h3 class="mb-12 text-sm xl:text-xl font-bold leading-none text-white text-opacity-30 text-center">{{ $section->url }}</h3>
    @endif    

        <div class="relative flex items-center justify-center items-center flex-wrap">
            @foreach ($portfolio->tools as $tool)
                <a href="{{ $tool->link }}" target="_blank" class="mx-4 my-4">
                    <img class="w-16 h-16 xl:w-24 xl:h-24 select-none object-scale-down rounded hover:scale-110 duration-300" src="{{ image($tool->image) }}" alt="{{ $tool->name }}">
                </a>
            @endforeach

        </div>

</section>