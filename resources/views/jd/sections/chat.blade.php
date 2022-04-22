@extends('app.section.body', compact('section'))

@section('content')
    <div class="relative text-center text-accent text-lg xl:text-2xl tracking-[.25em] z-10">
        {!! $section->items !!}
    </div>
@overwrite
