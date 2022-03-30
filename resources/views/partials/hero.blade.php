@if ($jd)
    <div class="relative flex items-center w-full">
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
                               <code class="flex-auto relative block overflow-auto p-4 bg-trans">{{ setting('jd_description') }}</code>
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if($ivno)
    <?php
        preg_match_all('/(?<=--).*?(?=--)/', setting('ivno.headline'), $headline);
        $headlineCombo = array_map(fn($i) => explode("=", $i), $headline[0]);

        preg_match_all('/(?<=--).*?(?=--)/', setting('ivno.hero_items'), $matches);

        if (count($matches[0])) {
            $splitMatches = array_chunk($matches[0], ceil(count($matches[0]) / 2));
            $reduceBy = function (array $matches) {
                return (setting('ivno.degree_rotation') * 2) / (count($matches) === 1 ? 2 : count($matches) - 1);
            };
            $degree1 = setting('ivno.degree_rotation');
            $degree2 = setting('ivno.degree_rotation');
        }
    ?>

    <style>
        .left>div, .right>div {
            margin: 1rem 0 1rem 0;
        }
        @if(isset($splitMatches))
            @foreach($splitMatches[0] as $key => $match)
                .left>div:nth-child({{ $key + 1 }}) {
                    transform: rotate({{ $degree1 }}deg);
                    transform-origin: right;
                }
                @php $degree1 -= $reduceBy($splitMatches[0]) @endphp
            @endforeach
            @foreach($splitMatches[1] as $key => $match)
                .right>div:nth-child({{ $key + 1 }}) {
                    transform: rotate({{ $degree2 * -1 }}deg);
                    transform-origin: left;
                }
                @php $degree2 -= $reduceBy($splitMatches[1]) @endphp
            @endforeach
        @endif

        .left>div:hover,
        .right>div:hover {
            transform: rotate(0)
        }

    </style>

    <div id="hero" class="relative flex items-center w-full">
        <div class="flex flex-col z-20 pt-28 pb-16 xl:pb-40 mx-auto w-full max-w-7xl">
            <div class="flex justify-center" >
                <div class="relative p-6">
                    <div class="relative w-52 h-52 z-1 rounded-full overflow-hidden select-none">
                        <div class="absolute inline-block w-[14.5rem] h-[14.5rem] inset-1/2 -translate-x-1/2 -translate-y-1/2">
                            <img id="inner" src="{{ Voyager::image(setting('ivno.profile_bg_image')) }}" alt="ivno.background_image" class="w-full h-full object-cover duration-500">
                        </div>
                        <img src="{{ Voyager::image($portfolio->profile_pic) }}" alt="ivno.profile_pic" class="relative w-52 h-52 object-scale-down inline-block z-10">
                    </div>
                </div>
            </div>

            <h1 class="headline flex flex-row text-center justify-center items-end -mr-6 gradient text-gradient my-3 invisible text-center font-black text-6xl leading-10 tracking-[1.5rem] hover:tracking-wider transition-none duration-700 ease-out delay-150 transform translate-y-12 opacity-0 scale-10 sm:leading-none" data-replace='{ "transition-none": "transition-all", "invisible": "visible", "translate-y-12": "translate-y-0", "scale-110": "scale-100", "opacity-0": "opacity-100" }'>
                @foreach ($headlineCombo as $combo)
                    <span>{{ $combo[0] }}</span><span>{{ $combo[1] }}</span>
                @endforeach
            </h1>

            <div class="flex flex-row justify-center">
                @if (isset($splitMatches) && count($splitMatches[0]))
                    <div class="left basis-[30%] hidden xl:flex flex-col items-end justify-end">
                        @foreach ($splitMatches[0] as $match)
                            <div class="flex bg-accent p-4 text-accent overflow-hidden truncate rounded-full z-10 duration-300 ease-out delay-150 transform opacity-0" data-replace='{ "opacity-0": "opacity-100" }'>{!! $match !!}</div>
                        @endforeach
                    </div>
                @endif
                <div class="basis-auto lg:basis-2/5 flex flex-col items-center mx-12 lg:mx-16">
                    <h2 class="invisible font-bold text-xl tracking-wide text-gray-500 mb-4 transition-none duration-700 ease-out transform translate-y-12 opacity-0" data-replace='{ "transition-none": "transition-all", "invisible": "visible", "translate-y-12": "translate-y-0", "scale-110": "scale-100", "opacity-0": "opacity-100" }'>{{ $portfolio->subheadline }}</h2>
                    <h2 class="text-xl lg:text-2xl font-medium text-center text-accent mx-auto mb-12">
                        {!! $portfolio->description !!}
                    </h2>
                    @if (count($portfolio->certifications))
                        <div class="flex flex-row flex-wrap justify-center">
                            @foreach ($portfolio->certifications as $cert)
                            <a href="{{ $cert->link }}" target="_blank" class="mx-2 my-2">
                                <img class="w-16 h-16 xl:w-20 xl:h-20 object-scale-down rounded-lg invert hover:scale-110 duration-300" src="{{ Voyager::image($cert->image) }}" alt="{{ $cert->name }}">
                            </a>
                            @endforeach
                        </div>
                    @endif
                </div>
                @if (isset($splitMatches) && count($splitMatches[1]))
                    <div class="right basis-[30%] hidden xl:flex flex-col items-start justify-end">
                        @foreach ($splitMatches[1] as $match)
                            <div class="flex bg-accent p-4 text-accent overflow-hidden truncate rounded-full z-10 duration-300 ease-out delay-150 transform opacity-0" data-replace='{ "opacity-0": "opacity-100" }'>{!! $match !!}</div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endif
