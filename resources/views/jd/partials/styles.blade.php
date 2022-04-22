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
    .bg-glow {
        background-image: {{ Portfolio::setting(config('ownerUsername').'.footer_bg_glow') }}
    }
@endsection
