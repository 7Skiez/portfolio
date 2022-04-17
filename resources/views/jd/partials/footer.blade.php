@if ($ivno)
    <footer x-data="{ 'showModal': false }" @keydown.escape="showModal = false">
        <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto backdrop-blur-lg bg-black/30 transition-none transform opacity-0 invisible" data-replace='{"invisible": "visible", "opacity-0": "opacity-100", "transition-none": "transition-all"}' x-show="showModal">
            <div class="flex justify-center backdrop-blur-lg bg-accent px-6 pb-4 pt-20 rounded-3xl" @click.away="showModal = false" x-transition:enter="motion-safe:ease-out duration-500" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100">
                <div class="flex flex-col items-center py-3">

                    <img src="{{ image(\App\Models\User::first()->avatar) }}" alt="Developer" class="absolute -translate-y-1/2 top-0 w-36 h-36 object-scale-down rounded-full">

                    <div class="flex flex-col grow items-center justify-center text-center">
                        <p class="text-base text-accent font-normal opacity-80 mb-3">Mohammad Javad Rakhisi</p>
                        <p class="text-xs text-accent font-normal opacity-50">Web Developer</p>
                    </div>

                    <div class="absolute bottom-0 translate-y-1/2 flex w-full justify-center">
                        <div class="flex justify-around w-4/5">

                            <a href="https://www.linkedin.com/in/mohammad-javad-r-876077b6" target="_blank" class="backdrop-blur-lg hover:bg-[#1877f2] w-9 h-9 fill-[#1877f2] hover:fill-white border-blue-200 rounded-full flex items-center justify-center shadow-xl hover:shadow-blue-500/50 cursor-pointer duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 30 30">
                                    <path d="M9,25H4V10h5V25z M6.501,8C5.118,8,4,6.879,4,5.499S5.12,3,6.501,3C7.879,3,9,4.121,9,5.499C9,6.879,7.879,8,6.501,8z M27,25h-4.807v-7.3c0-1.741-0.033-3.98-2.499-3.98c-2.503,0-2.888,1.896-2.888,3.854V25H12V9.989h4.614v2.051h0.065 c0.642-1.18,2.211-2.424,4.551-2.424c4.87,0,5.77,3.109,5.77,7.151C27,16.767,27,25,27,25z" />
                                </svg>
                            </a>

                            <a href="https://github.com/7Skiez" target="_blank" class="backdrop-blur-lg hover:bg-[#1d9bf0] w-9 h-9 fill-[#1d9bf0] hover:fill-white border-blue-200 rounded-full flex items-center justify-center shadow-xl hover:shadow-sky-500/50 cursor-pointer duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 30 30">
                                    <path
                                        d="M15,3C8.373,3,3,8.373,3,15c0,5.623,3.872,10.328,9.092,11.63C12.036,26.468,12,26.28,12,26.047v-2.051 c-0.487,0-1.303,0-1.508,0c-0.821,0-1.551-0.353-1.905-1.009c-0.393-0.729-0.461-1.844-1.435-2.526 c-0.289-0.227-0.069-0.486,0.264-0.451c0.615,0.174,1.125,0.596,1.605,1.222c0.478,0.627,0.703,0.769,1.596,0.769 c0.433,0,1.081-0.025,1.691-0.121c0.328-0.833,0.895-1.6,1.588-1.962c-3.996-0.411-5.903-2.399-5.903-5.098 c0-1.162,0.495-2.286,1.336-3.233C9.053,10.647,8.706,8.73,9.435,8c1.798,0,2.885,1.166,3.146,1.481C13.477,9.174,14.461,9,15.495,9 c1.036,0,2.024,0.174,2.922,0.483C18.675,9.17,19.763,8,21.565,8c0.732,0.731,0.381,2.656,0.102,3.594 c0.836,0.945,1.328,2.066,1.328,3.226c0,2.697-1.904,4.684-5.894,5.097C18.199,20.49,19,22.1,19,23.313v2.734 c0,0.104-0.023,0.179-0.035,0.268C23.641,24.676,27,20.236,27,15C27,8.373,21.627,3,15,3z" />
                                </svg>
                            </a>

                            <a href="https://www.instagram.com/7skiez" target="_blank" class="backdrop-blur-lg hover:bg-[#bc2a8d] w-9 h-9 fill-[#bc2a8d] hover:fill-white border-pink-200 rounded-full flex items-center justify-center shadow-xl hover:shadow-pink-500/50 cursor-pointer duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 23 24">
                                    <path d="M11.999 7.377a4.623 4.623 0 1 0 0 9.248 4.623 4.623 0 0 0 0-9.248zm0 7.627a3.004 3.004 0 1 1 0-6.008 3.004 3.004 0 0 1 0 6.008z"></path>
                                    <circle cx="16.806" cy="7.207" r="1.078"></circle>
                                    <path
                                        d="M20.533 6.111A4.605 4.605 0 0 0 17.9 3.479a6.606 6.606 0 0 0-2.186-.42c-.963-.042-1.268-.054-3.71-.054s-2.755 0-3.71.054a6.554 6.554 0 0 0-2.184.42 4.6 4.6 0 0 0-2.633 2.632 6.585 6.585 0 0 0-.419 2.186c-.043.962-.056 1.267-.056 3.71 0 2.442 0 2.753.056 3.71.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.042 1.268.055 3.71.055s2.755 0 3.71-.055a6.615 6.615 0 0 0 2.186-.419 4.613 4.613 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.186.043-.962.056-1.267.056-3.71s0-2.753-.056-3.71a6.581 6.581 0 0 0-.421-2.217zm-1.218 9.532a5.043 5.043 0 0 1-.311 1.688 2.987 2.987 0 0 1-1.712 1.711 4.985 4.985 0 0 1-1.67.311c-.95.044-1.218.055-3.654.055-2.438 0-2.687 0-3.655-.055a4.96 4.96 0 0 1-1.669-.311 2.985 2.985 0 0 1-1.719-1.711 5.08 5.08 0 0 1-.311-1.669c-.043-.95-.053-1.218-.053-3.654 0-2.437 0-2.686.053-3.655a5.038 5.038 0 0 1 .311-1.687c.305-.789.93-1.41 1.719-1.712a5.01 5.01 0 0 1 1.669-.311c.951-.043 1.218-.055 3.655-.055s2.687 0 3.654.055a4.96 4.96 0 0 1 1.67.311 2.991 2.991 0 0 1 1.712 1.712 5.08 5.08 0 0 1 .311 1.669c.043.951.054 1.218.054 3.655 0 2.436 0 2.698-.043 3.654h-.011z" />
                                </svg>
                            </a>

                            <a href="mailto:id4mjr@gmail.com" target="_blank" class="backdrop-blur-lg hover:bg-[#25D366] w-9 h-9 fill-[#25D366] hover:fill-white border-green-200 rounded-full flex items-center justify-center shadow-xl hover:shadow-green-500/50 cursor-pointer duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="-2 -2 28 28">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 12.713l-11.985-9.713h23.971l-11.986 9.713zm-5.425-1.822l-6.575-5.329v12.501l6.575-7.172zm10.85 0l6.575 7.172v-12.501l-6.575 5.329zm-1.557 1.261l-3.868 3.135-3.868-3.135-8.11 8.848h23.956l-8.11-8.848z" />
                                </svg>
                            </a>

                            <a href="https://t.me/sevenskies" target="_blank" class="backdrop-blur-lg hover:bg-[#229ED9] w-9 h-9 fill-[#229ED9] hover:fill-white border-sky-200 rounded-full flex items-center justify-center shadow-xl hover:shadow-sky-500/50 cursor-pointer duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="m20.665 3.717-17.73 6.837c-1.21.486-1.203 1.161-.222 1.462l4.552 1.42 10.532-6.645c.498-.303.953-.14.579.192l-8.533 7.701h-.002l.002.001-.314 4.692c.46 0 .663-.211.921-.46l2.211-2.15 4.599 3.397c.848.467 1.457.227 1.668-.785l3.019-14.228c.309-1.239-.473-1.8-1.282-1.434z"></path>
                                </svg>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center items-end w-full bg-glow h-max max-h-[25rem] xl:max-h-[60rem] overflow-hidden text-center mx-auto -mt-48">
            <img class="max-w-fit select-none opacity-10 pointer-events-none object-scale-down" src="{{ image(setting('ivno.footer_image')) }}" alt="footer image">
            <p class="absolute text-xs text-accent mb-2">Made With ❤️ By <a @click="showModal = true" class="font-bold text-base bg-gradient text-gradient cursor-pointer">MosbatSaz</a> Team | {{ date('Y') }}</p>
        </div>
    </footer>
@endif

<script src="{{ asset('js/app.js') }}"></script>

@if ($jd)

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/highlight.min.js" integrity="sha512-Pbb8o120v5/hN/a6LjF4N4Lxou+xYZ0QcVF8J6TWhBbHmctQWd8O6xTDmHpE/91OjPzCk4JRoiJsexHYg4SotQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script>
        hljs.highlightAll();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.min.js" integrity="sha512-fHXRw0CXruAoINU11+hgqYvY/PcsOWzmj0QmcSOtjlJcqITbPyypc8cYpidjPurWpCnlB8VKfRwx6PIpASCUkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/progressbar.js/1.1.0/progressbar.min.js" integrity="sha512-EZhmSl/hiKyEHklogkakFnSYa5mWsLmTC4ZfvVzhqYNLPbXKAXsjUYRf2O9OlzQN33H0xBVfGSEIUeqt9astHQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        var skills = document.getElementsByClassName('skill')
        @foreach ($skills as $index => $skill)
            var waypoint = new Waypoint({
            element: skills[{{ $index }}],
            handler: function(direction) {
            var Gradient = '<defs>
                <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%" gradientUnits="userSpaceOnUse">
                    <stop offset="0%" stop-color="#CC0D69" />
                    <stop offset="50%" stop-color="#CC0D69" />
                    <stop offset="100%" stop-color="#830DCC" />
                </linearGradient>
            </defs>';
            var bar = new ProgressBar.Line('#container-{{ $index }}', {
            strokeWidth: 8,
            easing: 'easeInOut',
            duration: 1400,
            delay: 0+{{ $index * 100 }},
            color: 'url(#gradient)',
            trailColor: 'rgba(255,255,255,0.15)',
            trailWidth: this.strokeWidth,
            svgStyle: null
            });
            bar.svg.insertAdjacentHTML('afterbegin', Gradient);
            bar.animate({{ $skill->percentage }}); // Number from 0.0 to 1.0
            this.destroy()
            },
            offset: '95%'
            })
        @endforeach
    </script>
@endif

@yield('javascript')

@if (setting('site.google_analytics_tracking_id', ''))
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ setting('site.google_analytics_tracking_id') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', '{{ setting('site.google_analytics_tracking_id') }}');
    </script>
@endif
