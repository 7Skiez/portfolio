<section id="{{ $section->id }}" class="relative w-full pt-24 xl:pt-40">

    @include(config('ownerUsername') . '.sections.partials.title')

    <div class="relative flex flex-col xl:flex-row justify-center items-center w-full">
        @foreach ($section->items as $tool)
            <a href="{{ $tool->link }}" target="_blank" class="mx-4 my-4">
                <img class="w-16 h-16 xl:w-24 xl:h-24 select-none object-scale-down rounded hover:scale-110 duration-300" src="{{ image($tool->image) }}" alt="{{ $tool->name }}">
            </a>
        @endforeach
    </div>

</section>
