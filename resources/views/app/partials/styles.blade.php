@yield('links')

<style>
    
    @yield('styles')

    .bg-color {
        background: {{ Portfolio::setting(config('ownerUsername').'.bg_color') }};
        background-size: 28px 28px;
    }

    .bg-gradient {
        background-image: {{ Portfolio::setting(config('ownerUsername').'.main_gradient') }}
    }

    .bg-accent {
        background-color: {{ Portfolio::setting(config('ownerUsername').'.accent_bg_color') }}
    }

    .text-accent {
        --tw-text-opacity: 1;
        color: {{ substr(str_replace(',', ' ',Portfolio::setting(config('ownerUsername').'.accent_text_color')),0,-1) . " / var(--tw-text-opacity))" }}
    }

    text {
        background: {{ Portfolio::setting(config('ownerUsername').'.accent_bg_color') }};
        fill: {{ Portfolio::setting(config('ownerUsername').'.accent_text_color') }};
        border-radius: 1.2rem;
        padding: 0.577rem 0.825rem
    }
</style>
