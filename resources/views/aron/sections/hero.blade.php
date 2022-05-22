<div class="relative flex flex-row justify-center items-end w-full">

    <div class="absolute left-0 -translate-x-full w-24 h-24 text-glow rounded-full blur-[96px]"></div>

    <div id="hero" class="flex flex-col w-full z-20 pt-36 pb-24 max-w-screen-2xl">

        <div class="flex flex-row w-full mb-24">

            <div class="basis-1/3 flex flex-col ml-16">

                <h2 class="invisible font-['Peyda'] font-normal text-[4.3rem] tracking-wide leading-[1em] text-accent transition-none duration-700 ease-out transform translate-y-12 opacity-0" data-replace='{ "transition-none": "transition-all", "invisible": "visible", "translate-y-12": "translate-y-0", "opacity-0": "opacity-100" }'>
                    {{ Portfolio::setting('aron.overline') }}
                </h2>

                {{-- <div class="py-8 w-max h-max"> --}}
                    <h1 class="font-['Peyda'] text-gradient text-texture py-8 bg-left invisible font-black text-[5rem] leading-10 transition-none duration-700 ease-out delay-150 transform translate-y-12 opacity-0 scale-10 sm:leading-none" data-replace='{ "transition-none": "transition-all", "invisible": "visible", "translate-y-12": "translate-y-0", "opacity-0": "opacity-100" }'>
                        {{ Portfolio::setting('aron.headline') }}
                        <span class="shine absolute py-8 inset-0 bg-clip-text">{{ Portfolio::setting('aron.headline') }}</span>
                    </h1>
                {{-- </div> --}}

                <h2 class="invisible font-['IRANYekan'] font-medium text-xl text-accent tracking-wide mx-auto mb-12 transition-none duration-700 ease-out transform translate-y-12 opacity-0" data-replace='{ "transition-none": "transition-all", "invisible": "visible", "translate-y-12": "translate-y-0", "opacity-0": "opacity-60" }'>
                    {!! Portfolio::setting('aron.description') !!}
                </h2>

                <div class="flex w-full space-x-4 space-x-reverse">
                    <button class="main-gradient p-3 flex-1 rounded font-['Peyda'] text-xl font-extrabold">
                        ثبت نام
                    </button>

                    <button class="flex items-center justify-center main-border main-text border-2 flex-1 rounded font-['Peyda'] text-xl font-medium">
                        <span class="absolute">
                            حساب آزمایشی
                        </span>
                        <div class="w-full h-full p-3 main-gradient opacity-10"></div>
                    </button>
                </div>
            </div>

        </div>

        <div class="flex flex-col w-full overflow-y-hidden">

            <div class="flex flex-row w-full pt-16 space-x-6 space-x-reverse">

                @foreach (Portfolio::setting('aron.hero_items') as $item)

                    <div class="flex flex-col flex-1 justify-center text-center items-center">

                        <div class="flex flex-col tracking-widest main-text">

                            <h2 class="flex text-5xl font-extrabold items-baseline justify-center text-transparent" data-replace='{"text-transparent": "text-inherit"}'>

                                <span class="text-2xl tracking-[-1em]" style="{{ str_contains($item[0], '*') ? 'order: -9999' : 'order: 9999; transform: translateX(-1em)' }}">
                                    {{ str_replace('*', '', htmlspecialchars_decode($item[1])) }}
                                </span>

                                <span class="number" style="order: 1">
                                    {{ str_replace('*', '', $item[0]) }}
                                </span>

                            </h2>

                            <h3 class="text-xl main-text">{{ $item[2] }}</h3>

                            <p class="text-accent font-['Peyda'] tracking-normal">{{ $item[3] }}</p>

                        </div>

                        <div class="w-[14.285%] aspect-square rounded-full text-glow blur-3xl"></div>

                    </div>
                @endforeach

            </div>

            <hr class="w-full main-border border-b-2 fade-edge" />
        </div>


    </div>


    <div class="absolute right-0 translate-x-full w-24 h-24 text-glow rounded-full blur-[96px]"></div>

</div>
