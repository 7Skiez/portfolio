<section id="{{ $section->id }}" class="relative w-full pt-24 xl:pt-40">

    @include(config('ownerUsername') . '.sections.partials.title')

    <div class="relative flex flex-col xl:flex-row justify-center items-center w-full">
        @foreach ($section->items as $cert)
            <a href="{{ $cert->link }}" target="_blank" class="flex flex-col p-4 w-52 h-52 xl:w-60 xl:h-60 mx-4 my-4 rounded-xl justify-center items-center hover:scale-110 duration-300" style="background:{{ preg_replace('/(?<=\()([^[+-]?([0-9]+\.?[0-9]*|\.[0-9]+))(?=deg)|(?<=\()([0-9]+)(?=deg)/',$cert->bg_rotation,Portfolio::setting('ivno.main_gradient')) }}">
                <img class="m-auto w-4/6 h-4/6 xl:w-4/5 xl:h-4/5 mb-2 object-scale-down rounded-lg hover:scale-110 duration-300" src="{{ image($cert->image) }}" alt="{{ $cert->name }}">
                <span class="w-4/5 text-center color-[#0C041B] font-[raleway] font-extrabold tracking-wider text-sm">{{ $cert->title }}</span>
            </a>
        @endforeach
    </div>

</section>
