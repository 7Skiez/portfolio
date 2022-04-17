@extends('app.partials.footer')

@section('footer')

    @include('app.partials.credit')

    <div class="relative flex justify-center items-end w-full bg-glow h-max max-h-[25rem] xl:max-h-[60rem] overflow-hidden text-center mx-auto -mt-48">
        <img class="max-w-fit select-none opacity-10 pointer-events-none object-scale-down" src="{{ image(setting('ivno.footer_image')) }}" alt="footer image">
        <p class="absolute text-xs text-accent mb-2">Made With ❤️ By <a @click="showModal = true" class="font-bold text-base bg-gradient text-gradient cursor-pointer">MosbatSaz</a> Team | {{ date('Y') }}</p>
    </div>

@endsection
