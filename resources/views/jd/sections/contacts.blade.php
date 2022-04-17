<section id="{{ $sections[$i]['id'] }}" class="relative w-full pt-24 xl:pt-40">
    @include('partials.section_title')
    <div class="relativ flex justify-center w-full">
        <div class="relative text-center text-accent text-lg xl:text-2xl tracking-[.25em] z-10">
            {!! $portfolio->contacts !!}
        </div>
    </div>
</section>
