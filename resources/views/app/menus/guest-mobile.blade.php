<div x-show="mobileMenuOpen" x-transition:enter="duration-300 ease-out -translate-y-full" x-transition:enter-start="-translate-y-full" x-transition:enter-end="-translate-y-full" x-transition:leave="transition duration-75 ease-in -translate-y-full" x-transition:leave-start="-translate-y-full" x-transition:leave-end="-translate-y-full" class="absolute inset-x-0 top-0 transition origin-top transform hidden -z-20" data-replace='{"hidden": "md:hidden"}' @click.outside="mobileMenuOpen = false">
    <div class="fade-edge bg-accent">
        <div class="pt-16 pb-24 space-y-6">
            <nav class="grid row-gap-8">
                @foreach ($menuItems as $item)
                    <a @click="bt; mobileMenuOpen = false" href="#{{ $item['section_id'] }}" class="flex items-center text-base font-medium leading-6 text-accent px-12 py-3 space-x-3 transition duration-150 ease-in-out rounded-md">
                        {{ $item['title'] }}
                    </a>
                @endforeach
            </nav>
        </div>
    </div>
</div>