<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    @if(isset($seo->title) || isset($seo->subheadline))
        <title>{{ $seo->title . ' - ' . $seo->subheadline }}</title>
    @else
        <title>{{ setting('site.title', 'Laravel Wave') .' - ' .setting('site.description', 'The Software as a Service Starter Kit built on Laravel & Voyager') }}</title>
    @endif

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge"> <!-- † -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url" content="{{ url('/') }}">

    <link rel="icon" href="{{ image(setting('site.favicon')) }}" type="image/x-icon">

    {{-- Social Share Open Graph Meta Tags --}}
    @if(isset($seo->title) && isset($seo->description) && isset($seo->image))
        <meta property="og:title" content="{{ $seo->title }}">
        <meta property="og:url" content="{{ Request::url() }}">
        <meta property="og:image" content="{{ $seo->image }}">
        <meta property="og:type" content="@if(isset($seo->type)) {{ $seo->type }}@else{{ 'article' }} @endif">
        <meta property="og:description" content="{{ $seo->description }}">
        <meta property="og:site_name" content="{{ setting('site.title') }}">

        <meta itemprop="name" content="{{ $seo->title }}">
        <meta itemprop="description" content="{{ $seo->description }}">
        <meta itemprop="image" content="{{ $seo->image }}">

        @if(isset($seo->image_w) && isset($seo->image_h))
            <meta property="og:image:width" content="{{ $seo->image_w }}">
            <meta property="og:image:height" content="{{ $seo->image_h }}">
        @endif
    @endif

    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow">

    @if(isset($seo->description))
        <meta name="description" content="{{ $seo->description }}">
    @endif

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/styles/base16/material-darker.min.css" integrity="sha512-4AE4hJungkjpCKswHkPiPHZFbc94aVAm7fx7vr9k8szz1PZ5fgIisTbKnE4IibTQ3Ut+wkObezOMl5e1F5qDmA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @if($ivno)
        <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
        <link href="http://fonts.cdnfonts.com/css/georgia" rel="stylesheet">
    @endif
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/fontawesome.min.css" integrity="sha512-r9kUVFtJ0e+8WIL8sjTUlHGbTLwlOClXhVqGgu4sb7ILdkBvM2uI+n/Fz3FN8u3VqJX7l9HLiXqXxkx2mZpkvQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <style>
        @if($jd)
            .bg-color {
                background-color: {{ setting('jd_bg_color') }}
            }
        @endif
        @if($ivno)
            .bg-color {
                background: radial-gradient(rgba(0, 0, 0, 0.9) 2px, {{ setting('ivno.bg_color') }} 10%);
                background-size: 28px 28px;
            }
            .bg-gradient {
                background-image: {{ setting('ivno.main_gradient') }}
            }
            .bg-accent {
                background-color: {{ setting('ivno.accent_bg_color') }}
            }
            .text-accent {
                color: {{ setting('ivno.accent_text_color') }}
            }
            .bg-glow {
                background-image: {{ setting('ivno.footer_bg_glow') }}
            }
            text {
                background: {{ setting('ivno.accent_bg_color') }};
                fill: {{ setting('ivno.accent_text_color') }};
                border-radius: 1.2rem;
                padding: 0.577rem 0.825rem
            }
        @endif
    </style>
</head>

<body class="flex flex-col min-h-screen bg-color @if(config('wave.dev_bar')){{ 'pb-10' }}@endif @if($ivno){{ "font-['Montserrat']" }}@endif cursor-default">

    @if($jd)
        <div class="animation-wrapper">
            <div class="particle particle-1"></div>
            <div class="particle particle-2"></div>
            <div class="particle particle-3"></div>
            <div class="particle particle-4"></div>
        </div>
    @endif

    @include('partials.header')
        
    <main class="flex-grow overflow-x-hidden z-10">
        @include('partials.hero')
        @foreach (myMenu('ivno', '_json') as $i => $section)
        
            <?php $dataType = $section->icon_class; ?>

            @if(isset($portfolio->{$dataType}) && $section->featured)
                @if(is_countable($portfolio->{$dataType}))
                    @if(count($portfolio->{$dataType}))
                        @include('partials.' . $dataType)
                    @endif
                @else
                     @include('partials.' . $dataType)
                @endif
            @endif
        @endforeach
    </main>

    @include('partials.footer')
    
    <!-- Full Screen Loader -->
        <div id="fullscreenLoader" class="fixed inset-0 top-0 left-0 z-50 flex flex-col items-center justify-center hidden w-full h-full bg-gray-900 opacity-50">
            <svg class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <p id="fullscreenLoaderMessage" class="mt-4 text-sm font-medium text-white uppercase"></p>
        </div>
    <!-- End Full Loader -->

</body>

</html>
