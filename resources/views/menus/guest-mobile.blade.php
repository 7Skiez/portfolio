<div x-show="mobileMenuOpen" x-transition:enter="duration-300 ease-out -translate-y-full" x-transition:enter-start="-translate-y-full" x-transition:enter-end="-translate-y-full" x-transition:leave="transition duration-75 ease-in -translate-y-full" x-transition:leave-start="-translate-y-full" x-transition:leave-end="-translate-y-full" class="absolute inset-x-0 top-0 transition origin-top transform md:hidden -z-20" @click.outside="mobileMenuOpen = false">
    <div class="fade-edge bg-accent">
        <div class="pt-16 pb-24 space-y-6">
            <nav class="grid row-gap-8">
                @if ($jd && menu('Jdcode', '_json'))

                    @foreach (menu('Jdcode', '_json') as $item)
                        <a href="{{ $item->url }}" class="flex items-center px-8 py-3 space-x-3 transition duration-150 ease-in-out rounded-md hover:bg-gray-50">
                            <i class="fas fa-envelope"></i>
                            <div class="text-base font-medium leading-6 text-gray-900">
                                {{ $item->title }}
                            </div>
                        </a>
                    @endforeach
                @endif

                @if ($ivno && menu('Ivno', '_json'))
                    @foreach (menu('Ivno', '_json') as $i => $section)
                        <a @click="debounce(blinkText, 300); mobileMenuOpen = false" href="#{{ $portfolioSections[$i]['id'] }}" class="flex items-center text-base font-medium leading-6 text-accent px-12 py-3 space-x-3 transition duration-150 ease-in-out rounded-md">
                            {{ $portfolioSections[$i]['title'] }}
                        </a>
                    @endforeach
                @endif
            </nav>
        </div>
    </div>
</div>
