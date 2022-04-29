@extends('app.section.wrapper', compact('section'))

@section('body')

    <div class="flex justify-center items-center w-full">

        <div class="flex flex-wrap justify-center items-center w-full max-w-xs md:max-w-2xl xl:max-w-7xl">
            @yield('content')
        </div>

    </div>

@overwrite
