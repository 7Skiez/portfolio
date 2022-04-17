<section id="{{ $section->id }}" class="relative w-full pt-24 xl:pt-40">

    @include(config('ownerUsername') . '.sections.partials.title')

    <div class="relative flex flex-col xl:flex-row justify-center items-center w-full">
        <div class="relative text-center text-accent text-lg xl:text-2xl tracking-[.25em] z-10">
            {!! $section->items !!}
        </div>
    </div>

</section>
