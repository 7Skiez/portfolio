<section id="{{ $portfolioSections[$i]['id'] }}" class="relative w-full pt-24 xl:pt-40">

    @if($jd)<h2 class="mb-12 text-lg xl:text-2xl font-bold leading-none text-white text-opacity-30 text-center">&#60;{{ $section->title }}&#62;</h2>@endif

    @if($ivno)
        <h2 class="mb-6 text-2xl xl:text-4xl font-bold leading-none text-white text-opacity-80 text-center">{{ $portfolioSections[$i]['title'] }}</h2>
        <h3 class="mb-12 text-sm xl:text-xl font-bold leading-none text-white text-opacity-30 text-center">{{ $section->url }}</h3>
    @endif    

    <div class="relativ flex justify-center w-full">
        <div class="relative text-center text-accent text-lg xl:text-2xl tracking-[.25em] z-10">
            {!! $portfolio->contacts !!}
        </div>
    </div>
</section>