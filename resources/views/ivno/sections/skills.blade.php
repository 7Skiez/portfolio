<section id="{{ $section->id }}" class="relative w-full pt-24 xl:pt-40">

    @include(config('ownerUsername') . '.sections.partials.title')

    <div class="relative flex flex-col justify-center items-center w-full -mt-16">

        <div class="relative w-full max-w-2xl flex items-center justify-center rounded-full scale-90 hover:scale-[100%] duration-300">
            <div class="absolute w-[42%] z-0">
                <img src="{{ settingImage('skills_radar_bg') }}" class="w-full h-full">
            </div>
            <div class="relative w-full radarChart z-10 text-accent font-medium text-sm hover:scale-[95%] duration-300"></div>
        </div>

        <h3 class="text-sm xl:text-xl mb-12 font-bold leading-none text-white text-opacity-30 text-center">Other {{ $section->id }}</h3>
        <div class="flex flex-col items-center space-y-4">
            @foreach (Portfolio::setting('ivno.other_skills') as $otherskill)
                <p class="flex justify-center items-center bg-accent text-accent text-sm xl:text-base w-max text-center py-2 px-3 rounded-full hover:scale-110 duration-300">{!! $otherskill !!}</p>
            @endforeach
        </div>

    </div>

</section>
