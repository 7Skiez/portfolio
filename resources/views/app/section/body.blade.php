@extends('app.section.wrapper', compact('section'))

@section('body')

    <div class="relative flex flex-col xl:flex-row justify-center items-center w-full">

        @yield('content')

    </div>

@overwrite
