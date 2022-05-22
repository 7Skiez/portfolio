@extends('app.partials.footer')

@section('javascript')
    <script src="{{ mix('js/manifest.js', config('ownerUsername')) }}"></script>
    <script src="{{ mix('js/vendor.js', config('ownerUsername')) }}"></script>
    <script src="{{ mix('js/app.js', config('ownerUsername')) }}"></script>
@endsection