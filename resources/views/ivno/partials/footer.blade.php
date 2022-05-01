@extends('app.partials.footer')

@section('footer')

    @include('app.partials.credit')

    <div class="relative flex justify-center items-end w-full bg-glow overflow-hidden text-center mx-auto -mt-48">
        <img class="max-w-fit select-none opacity-10 pointer-events-none object-scale-down" src="{{ settingImage('footer_image') }}" alt="footer image">
        <p class="absolute text-xs text-accent mb-2 select-none">
            Made With ❤️ By
            <span class="icon-container"></span>
            <span class="icon-add inline-block font-bold text-base bg-gradient text-gradient cursor-pointer hover:scale-[102%] active:scale-[98%] duration-75">
                MosbatSaz
            </span>
            <span @click="showModal = true" class="team inline-block hover:font-bold cursor-pointer" text="Team">Team</span> | {{ date('Y') }}
        </p>
    </div>

@endsection

@section('javascript')
    <script src="{{ mix('js/manifest.js', config('ownerUsername')) }}"></script>
    <script src="{{ mix('js/vendor.js', config('ownerUsername')) }}"></script>
    <script src="{{ mix('js/app.js', config('ownerUsername')) }}"></script>
@endsection