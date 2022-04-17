<section id="{{ $sections[$i]['id'] }}" class="relative w-full pt-24 xl:pt-36 xl:pb-4">

    @include('partials.section_title')
    
    <div class="relative flex items-center justify-center w-full">
        @if ($jd)
            <div class="relative flex flex-col p-6 sm:p-8 space-y-2 shadow-xl bg-black/40 rounded-lg sm:rounded-xl backdrop-blur">
                @foreach ($portfolio->skills as $skill)
                    <div class="flex flex-row text-xl">
                        <span class="mr-8 basis-1/2 text-white/60 text-sm sm:text-base">$ {{ $skill->name }}</span>

                        <div class="flex items-center text-white/20 skill">
                            <span class="-translate-y-[2px] mr-2">[</span>
                            <div id="container-{{ $skill->id - 1 }}" class="w-36 sm:w-48"></div><span class="-translate-y-[2px] ml-2">]</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @if ($ivno)
            <div class="relative flex flex-col w-full items-center justify-center">
                <div class="relative w-full max-w-2xl flex items-center justify-center rounded-full scale-90 hover:scale-[100%] duration-300">
                    <div class="absolute w-[42%] z-0">
                        <img src="{{ image(setting('ivno.skills_radar_bg')) }}" class="w-full h-full">
                    </div>
                    <div class="relative w-full radarChart z-10 text-accent font-medium text-sm hover:scale-[95%] duration-300"></div>
                </div>
    
                <h3 class="text-sm xl:text-xl mb-12 font-bold leading-none text-white text-opacity-30 text-center">Other {{ $sections[$i]['title'] }}</h3>
                <div class="flex flex-col items-center space-y-4">
                    <?php preg_match_all('/(?<=--).*?(?=--)/', setting('ivno.other_skills'), $otherSkills); ?>
                    @foreach ($otherSkills[0] as $otherskill)
                        <p class="flex justify-center items-center bg-accent text-accent text-sm xl:text-base w-max text-center py-2 px-3 rounded-full hover:scale-110 duration-300">{!! $otherskill !!}</p>
                    @endforeach
                </div>
            </div>            
        @endif
    </div>
</section>
