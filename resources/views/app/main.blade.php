<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>{{ $seo->title . ' - ' . $seo->subheadline }}</title>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge"> <!-- † -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url" content="{{ url('/') }}">

    <link rel="icon" href="{{ settingImage('logo') }}" type="image/x-icon">

    {{-- Social Share Open Graph Meta Tags --}}
    @if (isset($seo->title) && isset($seo->description) && isset($seo->image))
        <meta property="og:title" content="{{ $seo->title }}">
        <meta property="og:url" content="{{ Request::url() }}">
        <meta property="og:image" content="{{ $seo->image }}">
        <meta property="og:type" content="@if (isset($seo->type)) {{ $seo->type }}@else{{ 'article' }} @endif">
        <meta property="og:description" content="{{ $seo->description }}">
        <meta property="og:site_name" content="{{ $seo->title }}">

        <meta itemprop="name" content="{{ $seo->title }}">
        <meta itemprop="description" content="{{ $seo->description }}">
        <meta itemprop="image" content="{{ $seo->image }}">

        @if (isset($seo->image_w) && isset($seo->image_h))
            <meta property="og:image:width" content="{{ $seo->image_w }}">
            <meta property="og:image:height" content="{{ $seo->image_h }}">
        @endif
    @endif

    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow">

    @if (isset($seo->description))
        <meta name="description" content="{{ $seo->description }}">
    @endif

    @include(config('ownerUsername').'.partials.styles')

    <link href="{{ asset(config('ownerUsername').'/css/app.css') }}" rel="stylesheet">

</head>

<body class="flex flex-col min-h-screen bg-color cursor-default">

    @include(config('ownerUsername').'.partials.header')

    <main class="flex-grow overflow-x-hidden z-10">

        @include(config('ownerUsername').'.sections.hero')

        @foreach ($sections as $title => $section)
            @include(config('ownerUsername') . '.sections.' . $title)
        @endforeach
        
    </main>
    
    @include(config('ownerUsername').'.partials.footer')

</body>

</html>
