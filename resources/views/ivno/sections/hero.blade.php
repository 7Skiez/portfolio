<div id="hero" class="relative flex items-center w-full">
    <div class="flex flex-col z-20 pt-28 pb-16 xl:pb-40 mx-auto w-full max-w-7xl">
        <div class="flex justify-center">
            <div class="relative p-6">
                <div class="relative w-52 h-52 z-1 rounded-full overflow-hidden select-none">
                    <div class="absolute inline-block w-[14.5rem] h-[14.5rem] inset-1/2 -translate-x-1/2 -translate-y-1/2">
                        <img id="inner" src="{{ settingImage('profile_bg_image') }}" alt="ivno.background_image" class="w-full h-full object-cover duration-500">
                    </div>
                    <img src="{{ image(config('owner')->avatar) }}" alt="IVNO" class="relative w-52 h-52 object-scale-down inline-block z-10">
                </div>
            </div>
        </div>

        <?php
            $items = Portfolio::setting('ivno.hero_items');

            if (count($items)) {
                $splitItems = array_chunk($items, ceil(count($items) / 2));
                $reduceBy = fn($i) => (Portfolio::setting('ivno.hero_items_degree_rotation') * 2) / (count($i) === 1 ? 2 : count($i) - 1);
                $degree1 = $degree2 = Portfolio::setting('ivno.hero_items_degree_rotation');
            }
        ?>
        
        <style>
            .left>div, .right>div {
                margin: 1rem 0 1rem 0;
            }
            @if (isset($splitItems))

                @foreach ($splitItems[0] as $key => $item)
                
                    .left>div:nth-child({{ $key + 1 }}) {
                        transform: rotate({{ $degree1 }}deg);
                        transform-origin: right;
                    }

                    <?php $degree1 -= $reduceBy($splitItems[0]); ?>
                @endforeach

                @foreach ($splitItems[1] as $key => $item)

                    .right>div:nth-child({{ $key + 1 }}) {
                        transform: rotate({{ $degree2 * -1 }}deg);
                        transform-origin: left;
                    }

                    <?php $degree2 -= $reduceBy($splitItems[1]); ?>
                @endforeach

            @endif

            .left>div:hover, .right>div:hover {
                transform: rotate(0)
            }
        </style>
        {{-- {!! preg_replace('/  |\r\n|\n|\r/', '', view('partials.styles', compact('splitMatches','degree1','degree2','reduceBy'))->render()) !!} --}}
        <div class="flex text-center justify-center">
            <h1 class="headline flex flex-row w-max items-end -mr-6 bg-gradient text-gradient my-3 invisible font-black text-6xl leading-10 tracking-[1.5rem] hover:tracking-wider transition-none duration-700 ease-out delay-150 transform translate-y-12 opacity-0 scale-10 sm:leading-none" data-replace='{ "transition-none": "transition-all", "invisible": "visible", "translate-y-12": "translate-y-0", "scale-110": "scale-100", "opacity-0": "opacity-100" }'>
                @foreach (Portfolio::setting('ivno.headline') as $combo)
                    <span>{{ $combo[0] }}</span><span>{{ $combo[1] }}</span>
                @endforeach
            </h1>
        </div>

        <div class="flex flex-row justify-center">
            @if (isset($splitItems) && count($splitItems[0]))
                <div class="left basis-[30%] hidden xl:flex flex-col items-end justify-end">
                    @foreach ($splitItems[0] as $item)
                        <div class="flex bg-accent p-4 text-accent overflow-hidden truncate rounded-full z-10 duration-300 ease-out delay-150 transform opacity-0" data-replace='{ "opacity-0": "opacity-100" }'>{!! $item !!}</div>
                    @endforeach
                </div>
            @endif
            <div class="basis-auto lg:basis-2/5 flex flex-col items-center mx-12 lg:mx-16">
                <h2 class="invisible font-bold text-xl tracking-wide text-gray-500 mb-4 transition-none duration-700 ease-out transform translate-y-12 opacity-0" data-replace='{ "transition-none": "transition-all", "invisible": "visible", "translate-y-12": "translate-y-0", "scale-110": "scale-100", "opacity-0": "opacity-100" }'>{{ Portfolio::setting('ivno.subheadline') }}</h2>
                <h2 class="text-xl lg:text-2xl font-medium text-center text-accent mx-auto mb-12">
                    {!! Portfolio::setting('ivno.description') !!}
                </h2>
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
                <div class="right basis-[30%] hidden xl:flex flex-col items-start justify-end">
                    @foreach ($splitItems[1] as $item)
                        <div class="flex bg-accent p-4 text-accent overflow-hidden truncate rounded-full z-10 duration-300 ease-out delay-150 transform opacity-0" data-replace='{ "opacity-0": "opacity-100" }'>{!! $item !!}</div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
