<section id="{{ $section->id }}" class="relative w-full pt-24 xl:pt-40">

    <div class="flex flex-col items-center">
        @include('app.section.title', ['title' => $section->title])
        @include('app.section.subtitle', ['subtitle' => $section->subtitle])
    </div>

    @yield('body')

</section>
