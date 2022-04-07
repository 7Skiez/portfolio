@if($jd)
    <section id="projects" class="relative w-full py-12">

        <h2 class="mb-10 sm:mb-12 text-lg xl:text-2xl font-bold leading-none text-white text-opacity-30 text-center">&#60;{{ $section->title }}&#62;</h2>

        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($portfolio->projects as $project)
                    <div class="swiper-slide">
                        <img src="{{ Voyager::image($project->image) }}" class="rounded-lg sm:rounded-xl">
                        <div class="p-6 -mt-4 bg-black/40 backdrop-blur-lg rounded-lg sm:rounded-xl transition-all duration-200 ease-in">
                            <h3 class="text-lg sm:text-xl font-semibold leading-6 text-wave-100"><span class="text-amber-500">&#60;h3&#62;</span>{{ $project->title }}<span class="text-amber-500">&#60;/h3&#62;</span></h3>
                            <div class="slide-details">
                                <p class="text-slate-400 mt-4 text-sm sm:text-base"><span class="text-pink-500">&#60;p&#62;</span>{{ Illuminate\Support\Str::limit($project->description, 150, '...') }}<span class="text-pink-500">&#60;/p&#62;</span></p>
                                <div class="flex items-center justify-start space-x-6 mt-4">
                                    <a href="{{ $project->link }}" class="flex items-center justify-center transition-all duration-1000 ease-out transform text-sm sm:text-base font-bold text-[#333644]">
                                        <img src="{{ asset('storage/projects/link.png') }}" alt="link icon" class="mr-1 sm:mr-2 scale-90"> {{ $project->link_title }}
                                    </a>
                                    @if ($project->technologies)
                                        <div class="flex items-center justify-end flex-1 w-full h-full space-x-2 sm:space-x-4">
                                            @foreach (json_decode($project->technologies) as $tech)
                                                <img src="{{ Voyager::image($tech) }}" class="w-4 sm:w-6 h-4 sm:h-6 object-scale-down">
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div id="swiper-overlay" class="absolute -z-10 inset-0 w-full h-full bg-black/40 backdrop-blur"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

@if($ivno)
    <section id="{{ $sections[$i]['id'] }}" class="relative w-full pt-24 xl:pt-40">

        @if($ivno)
            <h2 class="mb-6 text-2xl xl:text-4xl font-bold leading-none text-white text-opacity-80 text-center">{{ $sections[$i]['title'] }}</h2>
            <h3 class="mb-12 text-sm xl:text-xl font-bold leading-none text-white text-opacity-30 text-center">{{ $section->url }}</h3>
        @endif

        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($portfolio->projects as $project)
                    <div class="swiper-slide">
                        <div class="relative invisible opacity-0 transition-none duration-300">
                            <img data-src="{{ Voyager::image($project->image) }}" class="relative w-full rounded-lg sm:rounded-3xl z-10 shadow text-accent swiper-lazy transition-none transform translate-y-4 delay-300 duration-700">
                            
                            <div class="slide-details-container pt-12 p-6 -mt-8 bg-accent rounded-lg sm:rounded-3xl z-1 invisible transition-none transform -translate-y-full delay-300 duration-700">
                                <h3 class="text-lg sm:text-2xl font-semibold leading-6 text-wave-100"><span class="text-amber-500"></span>{{ $project->title }}<span class="text-amber-500"></span></h3>
                                <div class="slide-details">
                                    <p class="text-slate-400 mt-4 text-sm sm:text-base"><span class="text-pink-500"></span>{{ Illuminate\Support\Str::limit($project->description, 150, '...') }}<span class="text-pink-500"></span></p>
                                    <div class="flex items-center justify-start space-x-6 mt-4">
                                        <a href="{{ $project->link }}" class="flex items-center justify-center transition-all duration-1000 ease-out transform text-sm sm:text-base font-bold text-[#333644]">
                                            <img src="{{ asset('/storage/projects/link.png') }}" alt="link icon" class="mr-1 sm:mr-2 scale-90"> {{ $project->link_title }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif