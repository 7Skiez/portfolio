<footer id="footer" x-data="{ 'showModal': false }" @keydown.escape="showModal = false">
    @yield('footer')
</footer>

@yield('javascript')

@if (Portfolio::setting(config('ownerUsername').'.google_analytics_tracking_id', ''))
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ Portfolio::setting(config('ownerUsername').'.google_analytics_tracking_id') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', '{{ Portfolio::setting(config('ownerUsername').'.google_analytics_tracking_id') }}');
    </script>
@endif