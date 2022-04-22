@extends('app.section.wrapper', compact('section'))

@section('body')
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($section->items as $project)
                <div class="swiper-slide">
                    <div class="relative invisible opacity-0 transition-none duration-300">
                        <img data-src="{{ image($project->image) }}" class="relative w-full rounded-lg sm:rounded-3xl z-10 shadow text-accent swiper-lazy transition-none transform translate-y-4 delay-300 duration-700">

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
@overwrite
