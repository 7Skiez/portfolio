<section id="{{ $sections[$i]['id'] }}" class="relative w-full pt-24 xl:pt-40">

    @include('partials.section_title')   

    <div class="relative flex flex-wrap items-center justify-center w-full">
        @foreach ($portfolio->media as $medium)
            <a href="{{ $medium->link }}" target="_blank" class="flex flex-col w-16 h-16 xl:w-24 xl:h-24 my-4 mx-4 bg-gradient rounded-xl justify-center items-center hover:scale-110 duration-300">
                <div class="flex justify-center items-center w-full h-full hover:scale-110 duration-300">
                    <img class="w-8/12 h-8/12 select-none pointer-events-none object-scale-down rounded" src="{{ image($medium->image) }}" alt="{{ $medium->name }}">
                </div>
            </a>
        @endforeach
    </div>
</section>