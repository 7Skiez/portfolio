@extends('app.partials.footer')

@section('footer')

    @include('app.partials.credit')

    <div class="relative flex justify-center items-end w-full bg-glow overflow-hidden text-center mx-auto -mt-48">
        <img class="max-w-fit select-none opacity-10 pointer-events-none object-scale-down" src="{{ settingImage('footer_image') }}" alt="footer image">
        <div class="w-full h-[50rem]"></div>
        <p class="absolute text-xs text-accent mb-2">Made With ❤️ By

            <span class="font-bold text-base bg-gradient text-gradient cursor-pointer">

                <span class="plus-add">Mosbat</span>

                <span class="plus-container"></span>
                
                <span @click="showModal = true">Saz</span>
                
            </span>

         Team | {{ date('Y') }}</p>
    </div>

@endsection

@section('javascript')
    <script src="{{ asset(config('ownerUsername').'/js/app.js') }}"></script>
@endsection