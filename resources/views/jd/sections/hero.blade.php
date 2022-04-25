@extends('app.partials.hero')

@section('script')
    <?php
        $items = Portfolio::setting(config('ownerUsername').'.hero_items');

        if (count($items)) {$splitItems = array_chunk($items, ceil(count($items) / 2));}
    ?>
@overwrite

{{-- <div class="relative flex items-center w-full">
    <div class="relative z-20 mx-auto w-full max-w-7xl">
        <div class="flex flex-col items-center justify-center pt-28 sm:pt-44 md:pb-12 xl:pb-40 lg:flex-row">
            <div class="flex flex-col items-center lg:mb-0">
                <h1 class="invisible pb-2 mt-3 text-4xl font-extrabold leading-10 tracking-widest text-transparent transition-none duration-700 ease-out delay-150 transform translate-y-12 opacity-0 bg-clip-text bg-gradient-to-r from-pink-600 via-fuchsia-600 to-purple-600 scale-10 md:my-5 sm:leading-none lg:text-5xl xl:text-6xl" data-replace='{ "transition-none": "transition-all", "invisible": "visible", "translate-y-12": "translate-y-0", "scale-110": "scale-100", "opacity-0": "opacity-100" }'>
                    {{ setting('jd_headline') }}</h1>
                <h2 class="invisible text-sm font-semibold tracking-wide text-gray-500 transition-none duration-700 ease-out transform translate-y-12 opacity-0 sm:text-base lg:text-sm xl:text-lg" data-replace='{ "transition-none": "transition-all", "invisible": "visible", "translate-y-12": "translate-y-0", "scale-110": "scale-100", "opacity-0": "opacity-100" }'>{{ setting('jd_subheadline') }}</h2>

                <div class="relative mt-16">
                    <img id="Cube1" src="{{ asset('themes/tailwind/images/pink.svg') }}" alt="Pink cube" class="absolute animate-bounce1 z-10 hidden sm:block">
                    <img id="Cube2" src="{{ asset('themes/tailwind/images/gray.svg') }}" alt="Gray cube" class="absolute inset-y-1/2 animate-bounce2 z-10 hidden sm:block">
                    <img id="Cube3" src="{{ asset('themes/tailwind/images/green.svg') }}" alt="Green cube" class="absolute bottom-0 animate-bounce3 hidden sm:block">

                    <img id="Cube4" src="{{ asset('themes/tailwind/images/yellow.svg') }}" alt="Yellow cube" class="absolute right-0 animate-bounce4 hidden sm:block">
                    <img id="Cube5" src="{{ asset('themes/tailwind/images/gray.svg') }}" alt="Gray cube" class="absolute right-0 inset-y-1/2 animate-bounce5 z-10 hidden sm:block">
                    <img id="Cube6" src="{{ asset('themes/tailwind/images/purple.svg') }}" alt="Purple cube" class="absolute bottom-0 right-0 animate-bounce6 z-10 hidden sm:block">

                    <div class="relative w-full flex flex-col overflow-hidden shadow-xl bg-black/40 rounded-lg sm:rounded-xl backdrop-blur">
                        <pre class="flex text-[0.825rem] leading-8 sm:text-xl sm:leading-10"><div aria-hidden="true" class="hidden md:block text-gray-600 flex-none py-4 pr-4 text-right select-none w-[3.125rem]">1<br/>2<br/>3<br/>4<br/>5<br/>6<br/>7</div>
                           <code class="flex-auto relative block overflow-auto p-4 bg-trans">{{ Portfolio::setting('jd_description') }}</code>
                        </pre>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div> --}}

@section('content')

    <div class="flex flex-row w-full justify-center console">
        @if (isset($splitItems) && count($splitItems[0]))
            <div class="left basis-[30%] hidden xl:flex flex-col items-center justify-center">
                @foreach ($splitItems[0] as $item)
                    <div class="cube transition duration-1000">
                        {!! $item !!}
                    </div>
                @endforeach
            </div>
        @endif
        <div class="basis-auto lg:basis-2/5 flex flex-col items-center mx-8">

            {{-- <div class="interactive-particles flex items-center justify-center w-full aspect-square cursor-pointer mb-8"></div> --}}

            {{-- <div class="relative flex justify-center items-center w-52 h-52 z-1 rounded-full overflow-hidden select-none">
                <img id="profile_bg_img" src="{{ settingImage('profile_bg_image') }}" alt="profile_bg_image" class="w-[110%] h-[110%] max-w-none object-scale-down duration-500">
                <img src="{{ image(config('owner')->avatar) }}" alt="IVNO" class="absolute w-52 h-52 object-cover z-10">
            </div> --}}

            <div class="flex text-center justify-center">
                <h1 class="headline flex flex-row w-max items-end -mr-6 bg-gradient text-gradient my-3 invisible font-black text-6xl leading-10 tracking-wider transition-none duration-700 ease-out delay-150 transform translate-y-12 opacity-0 scale-10 sm:leading-none" data-replace='{ "transition-none": "transition-all", "invisible": "visible", "translate-y-12": "translate-y-0", "scale-110": "scale-100", "opacity-0": "opacity-100" }'>
                    {{Portfolio::setting('jd.headline') }}
                </h1>
            </div>
            
            <h2 class="invisible font-bold text-xl tracking-wide text-gray-500 mb-4 transition-none duration-700 ease-out transform translate-y-12 opacity-0" data-replace='{ "transition-none": "transition-all", "invisible": "visible", "translate-y-12": "translate-y-0", "scale-110": "scale-100", "opacity-0": "opacity-100" }'>{{ Portfolio::setting('jd.subheadline') }}</h2>

            <div class="w-full px-5 py-5 shadow-lg text-gray-100 text-md font-mono subpixel-antialiased bg-gray-800  rounded-lg leading-normal overflow-hidden">

                <div class="mb-2 flex flex-row-reverse space-x-2">
                    <div class="h-3 w-3 ml-2 bg-red-500 rounded-full"></div>
                    <div class="h-3 w-3 bg-orange-300 rounded-full"></div>
                    <div class="h-3 w-3 bg-green-500 rounded-full"></div>
                </div>

                <div class="flex flex-col mt-4">

                    <p class="flex-1 loadtime"></p>
                    
                    <div class="hidden flex-col dir">
                        
                        <div class="flex flex-row">
                            <span class="flex w-max bg-white mb-1">
                                <span class="arrow-left border-l-[#012b35]"></span>
                                <span class="text-black leading-5 font-semibold">{{ config('ownerUsername') . '@' . preg_replace("(^https?://)", "", setting('jd.domain')) }}</span>
                            </span>
                            <span class="arrow-left border-l-white mr-2"></span>
                        </div>

                        <div class="flex w-full text-blue-600 leading-5">
                            <span class="text-blue-600 mr-2">❯</span><span class="flex command text-gray-300 tracking-tight"></span>
                        </div>

                    </div>

                    <p class="flex-1 items-center pl-2 text-gray-300 output">
                        {{-- {!! Portfolio::setting('jd.description') !!} --}}
                    </p>
                </div>

            </div>
            
            {{-- <h2 class="text-lg lg:text-xl font-medium text-center text-accent mx-auto mb-12 space-y-2">
                {!! Portfolio::setting('jd.description') !!}
            </h2> --}}
            @if (count(config('owner')->certifications))
                <div class="flex flex-row flex-wrap justify-center">
                    @foreach (config('owner')->certifications as $cert)
                        <a href="{{ $cert->link }}" target="_blank" class="mx-2 my-2">
                            <img class="w-16 h-16 xl:w-20 xl:h-20 object-scale-down rounded-lg invert hover:scale-110 duration-300" src="{{ image($cert->image) }}" alt="{{ $cert->name }}">
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
        @if (isset($splitItems) && count($splitItems[1]))
            <div class="right basis-[30%] hidden xl:flex flex-col items-center justify-center">
                @foreach ($splitItems[1] as $item)
                    <div class="cube transition duration-1000">
                        {!! $item !!}
                    </div>
                @endforeach
            </div>
        @endif
    </div>

@overwrite
