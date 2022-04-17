@extends('app.layouts.main')

@section('styles')
    <!-- Styles -->
    @if($ivno)
        <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
        <link href="http://fonts.cdnfonts.com/css/georgia" rel="stylesheet">
    @endif
@endsection

@section('sections')

    <div class="animation-wrapper">
        <div class="particle particle-1"></div>
        <div class="particle particle-2"></div>
        <div class="particle particle-3"></div>
        <div class="particle particle-4"></div>
    </div>

    @include('partials.header')

    <main class="flex-grow overflow-x-hidden z-10">
    @include('sections.hero')
    @foreach (myMenu('ivno', '_json') as $i => $section)

        <?php $dataType = $section->icon_class; ?>

        @if(isset($portfolio->{$dataType}) && $section->featured)
            @if(is_countable($portfolio->{$dataType}))
                @if(count($portfolio->{$dataType}))
                    @include('sections.' . $dataType)
                @endif
            @else
                @include('sections.' . $dataType)
            @endif
        @endif
    @endforeach
    </main>
@endsection

@section('javascript')
    
@endsection
