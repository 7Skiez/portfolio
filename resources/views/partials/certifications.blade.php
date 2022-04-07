<section id="{{ $sections[$i]['id'] }}" class="relative w-full pt-24 xl:pt-40">

    @if($jd)<h2 class="mb-12 text-lg xl:text-2xl font-bold leading-none text-white text-opacity-30 text-center">&#60;{{ $section->title }}&#62;</h2>@endif

    @if($ivno)
        <h2 class="mb-6 text-2xl xl:text-4xl font-bold leading-none text-white text-opacity-80 text-center">{{ $sections[$i]['title'] }}</h2>
        <h3 class="mb-6 xl:mb-12 text-sm xl:text-xl font-bold leading-none text-white text-opacity-30 text-center">{{ $section->url }}</h3>
    @endif    

    <div class="relative flex items-center justify-center w-full">
        <div class="relative flex flex-col xl:flex-row justify-center items-center">
            @foreach ($portfolio->certifications as $cert)
                <a href="{{ $cert->link }}" target="_blank" class="flex flex-col p-4 w-52 h-52 xl:w-60 xl:h-60 mx-4 my-4 rounded-xl justify-center items-center hover:scale-110 duration-300" style="background:{{ preg_replace('/(?<=\()([^[+-]?([0-9]+\.?[0-9]*|\.[0-9]+))(?=deg)|(?<=\()([0-9]+)(?=deg)/', $cert->bg_rotation, setting('ivno.main_gradient')) }}">
                    <img class="m-auto w-4/6 h-4/6 xl:w-4/5 xl:h-4/5 mb-2 object-scale-down rounded-lg hover:scale-110 duration-300" src="{{ Voyager::image($cert->image) }}" alt="{{ $cert->name }}">
                    <span class="w-4/5 text-center color-[#0C041B] font-[georgia] font-semibold tracking-wider text-base">{{ $cert->title }}</span>
                </a>
            @endforeach
        </div>
    </div>
</section>