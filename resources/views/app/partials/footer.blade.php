<footer x-data="{ 'showModal': false }" @keydown.escape="showModal = false">
    
    @yield('footer')

</footer>

<script src="{{ asset('js/app.js') }}"></script>

@if (Portfolio::setting('site.google_analytics_tracking_id', ''))
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ Portfolio::setting('site.google_analytics_tracking_id') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', '{{ Portfolio::setting('site.google_analytics_tracking_id') }}');
    </script>
@endif