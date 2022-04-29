@extends('app.partials.hero')

@section('script')
    <?php
        $items = Portfolio::setting('ivno.hero_items');
        if (count($items)) {$splitItems = array_chunk($items, ceil(count($items) / 2));}
    ?>
@overwrite

@section('content')

    <div class="flex flex-row w-full justify-center">
        @if (isset($splitItems) && count($splitItems[0]))
            <div class="left basis-[30%] hidden xl:flex flex-col items-end justify-end">
                @foreach ($splitItems[0] as $item)
                    <div class="flex bg-accent p-4 text-accent overflow-hidden truncate rounded-full z-10 duration-300 ease-out delay-150 transform opacity-0" data-replace='{ "opacity-0": "opacity-100" }'>{!! $item !!}</div>
                @endforeach
            </div>
        @endif
        <div class="basis-auto lg:basis-2/5 flex flex-col items-center mx-8 lg:mx-16">

            <div class="relative flex justify-center items-center w-52 h-52 z-1 rounded-full overflow-hidden select-none">
                <img id="profile_bg_img" src="{{ settingImage('profile_bg_image') }}" alt="profile_bg_image" class="w-[110%] h-[110%] max-w-none object-scale-down duration-500">
                <img src="{{ image(config('owner')->avatar) }}" alt="IVNO" class="absolute w-52 h-52 object-cover z-10">
            </div>

            <h1 class="headline flex flex-row w-max items-baseline -mr-6 bg-gradient text-gradient my-8 invisible font-black text-6xl leading-10 tracking-[1.5rem] hover:tracking-wider transition-none duration-700 ease-out delay-150 transform translate-y-12 opacity-0 scale-10 sm:leading-none" data-replace='{ "transition-none": "transition-all", "invisible": "visible", "translate-y-12": "translate-y-0", "scale-110": "scale-100", "opacity-0": "opacity-100" }'>
                @foreach (Portfolio::setting('ivno.headline') as $combo)
                    <span>{{ $combo[0] }}</span><span>{{ $combo[1] }}</span>
                @endforeach
            </h1>
            
            <h2 class="invisible font-bold text-xl tracking-wide text-gray-500 mb-4 transition-none duration-700 ease-out transform translate-y-12 opacity-0" data-replace='{ "transition-none": "transition-all", "invisible": "visible", "translate-y-12": "translate-y-0", "opacity-0": "opacity-100" }'>{{ Portfolio::setting('ivno.subheadline') }}</h2>
            <h2 class="invisible font-medium text-xl lg:text-2xl text-center text-accent mx-auto mb-12 transition-none duration-700 ease-out transform translate-y-12 opacity-0" data-replace='{ "transition-none": "transition-all", "invisible": "visible", "translate-y-12": "translate-y-0", "opacity-0": "opacity-100" }'>
                {!! Portfolio::setting('ivno.description') !!}
            </h2>
            @if (count(config('owner')->certifications))
                <div class="flex flex-row flex-wrap justify-center">
                    @foreach (config('owner')->certifications as $cert)
                        <a href="{{ $cert->link }}" target="_blank" class="mx-2 my-2 hidden" data-replace='{"hidden": "block"}'>
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

@overwrite