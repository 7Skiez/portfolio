@extends('app.partials.styles')

@section('links')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Raleway:wght@800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Raleway:wght@800&display=swap" media="print" onload="this.media='all'" />
    <noscript>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Raleway:wght@800&display=swap" rel="stylesheet">
    </noscript>
@endsection

@section('styles')
    html,body{
        font-family: 'Montserrat', sans-serif;
        background-color: black;
    }
    .bg-color {
        background-color: {{ Portfolio::setting(config('ownerUsername').'.bg_color') }}
    }
    .text-glow {
        background-color: {{ Portfolio::setting(config('ownerUsername').'.text_glow') }}
    }
    .main-text {
        color: {{ Portfolio::setting(config('ownerUsername').'.text_glow') }}
    }
    .main-border {
        border-color: {{ Portfolio::setting(config('ownerUsername').'.text_glow') }}
    }
    .accent-text-color {
        background-color: {{ Portfolio::setting(config('ownerUsername').'.accent_text_color') }}
    }
    .main-gradient {
        background: {{ Portfolio::setting(config('ownerUsername').'.main_gradient') }}
    }
    .text-texture {
        background-image: url('{{ settingImage('text_texture') }}')
    }
@endsection