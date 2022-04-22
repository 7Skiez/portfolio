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
                           <code class="flex-auto relative block overflow-auto p-4 bg-trans">{{ Portfolio::setting('jd_description') }}</code>
                        </pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
