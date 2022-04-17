@if ($jd)
    <h2 class="mb-12 text-lg xl:text-2xl font-bold leading-none text-white text-opacity-30 text-center">&#60;{{ $section->title }}&#62;</h2>
@elseif ($ivno)
    <div class="flex flex-col items-center">
        <h2 class="mb-6 text-2xl xl:text-4xl font-bold leading-none text-white text-opacity-80 text-center">{{ $sections[$i]['title'] }}</h2>
        <h3 class="mb-12 text-sm xl:text-xl font-bold leading-none text-white text-opacity-30 text-center">{{ $section->url }}</h3>
    </div>
@endif
