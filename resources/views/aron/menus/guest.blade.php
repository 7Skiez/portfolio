<nav class="flex items-center justify-end flex-1 w-full h-full space-x-4 space-x-reverse">
    
    <div class="flex justify-center space-x-10 space-x-reverse grow">
        @foreach ($menuItems as $item)
            <a @click="bt" href="#{{ $item['section_id'] }}" class="text-xl leading-6 text-accent font-['Peyda'] text-opacity-80 transition duration-150 ease-in-out hover:text-opacity-100 focus:text-opacity-100">
                {{ $item['section_id'] }}
            </a>
        @endforeach
    </div>

    {{-- <button class="flex items-center justify-center main-border main-text border-2 py-1.5 px-8 rounded font-['Peyda'] text-md font-medium">
        <span class="absolute">
            حساب آزمایشی
        </span>
        <div class="w-full h-full p-3 main-gradient opacity-10"></div>
    </button> --}}

    
    <button class="flex items-center justify-center h-10 main-border border-2 main-text rounded font-['Peyda'] text-xl font-medium">
        <span class="absolute">
            حساب آزمایشی
        </span>
        <div class="w-full h-full px-8 main-gradient opacity-10 text-transparent">حساب آزمایشی</div>
    </button>

    <button class="main-gradient h-10 px-8 main-border border-2 rounded font-['Peyda'] text-md font-extrabold">
        ثبت نام
    </button>

</nav>
