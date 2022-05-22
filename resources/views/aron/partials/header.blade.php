<header x-data="{ mobileMenuOpen: false }" class="fixed w-full z-30">

    {{-- <div class=""> --}}
        <div class="flex items-center w-full px-12 h-16 justify-start z-40 mx-auto">
            
            <div class="inline-flex">
                <a href="#hero" class="flex items-center justify-center space-x-3 transition-all duration-1000 ease-out transform">
                    @if(settingImage('logo'))
                        <img class="w-24 max-h-40 object-scale-down @if(Portfolio::setting('ivno.logo_rotation')) animate-rotation @endif" src="{{ settingImage('logo') }}" alt="ivno.logo">
                    @else
                        <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_598_61732)"><path d="M19 15.6076L20.0769 21.7614L10.2307 22.6844L8.48713 18.6332C13.2051 18.0178 15.6153 17.3512 19 15.6076Z" fill="url(#paint0_linear_598_61732)"/><path d="M15.9745 26.5309L22.1282 25.4539L23.0514 35.3001L19.0001 37.0437C18.3846 32.3258 17.718 29.9155 15.9745 26.5309Z" fill="url(#paint1_linear_598_61732)"/><path d="M29.9231 18.6332L23.7693 19.7101L22.8462 9.86402L26.8975 8.12041C27.5129 12.8384 28.1796 15.2486 29.9231 18.6332Z" fill="url(#paint2_linear_598_61732)"/><path d="M26.8974 29.5565L25.8205 23.4027L35.6667 22.4797L37.4102 26.5309C32.6923 27.1463 30.2821 27.8129 26.8974 29.5565Z" fill="url(#paint3_linear_598_61732)"/><path d="M23.0327 26.7547C25.3268 26.7547 27.1865 24.895 27.1865 22.6009C27.1865 20.3068 25.3268 18.447 23.0327 18.447L8.67371 18.447C6.3796 18.447 4.51986 20.3068 4.51986 22.6009C4.51986 24.895 6.3796 26.7547 8.67371 26.7547L23.0327 26.7547Z" fill="url(#paint4_linear_598_61732)"/><path d="M27.1539 22.5684C27.1539 20.2743 25.2941 18.4146 23 18.4146C20.7059 18.4146 18.8462 20.2743 18.8462 22.5684L18.8462 36.9274C18.8462 39.2215 20.7059 41.0812 23 41.0812C25.2942 41.0812 27.1539 39.2215 27.1539 36.9274L27.1539 22.5684Z" fill="url(#paint5_linear_598_61732)"/><path d="M37.3266 26.7547C39.6207 26.7547 41.4805 24.895 41.4805 22.6009C41.4805 20.3068 39.6207 18.447 37.3266 18.447L22.9677 18.447C20.6735 18.447 18.8138 20.3068 18.8138 22.6009C18.8138 24.895 20.6735 26.7547 22.9677 26.7547L37.3266 26.7547Z" fill="url(#paint6_linear_598_61732)"/><path d="M27.1539 8.27445C27.1539 5.98035 25.2941 4.12061 23 4.12061C20.7059 4.12061 18.8462 5.98035 18.8462 8.27445L18.8462 22.6334C18.8462 24.9275 20.7059 26.7873 23 26.7873C25.2941 26.7873 27.1539 24.9275 27.1539 22.6334L27.1539 8.27445Z" fill="url(#paint7_linear_598_61732)"/></g><defs><linearGradient id="paint0_linear_598_61732" x1="14.6923" y1="27.146" x2="14.1299" y2="11.9056" gradientUnits="userSpaceOnUse"><stop stop-color="#2D0E68"/><stop offset="0.142708" stop-color="#5334DA"/><stop offset="0.569791" stop-color="#5396EC"/><stop offset="1" stop-color="#54FFFF"/></linearGradient><linearGradient id="paint1_linear_598_61732" x1="20.1539" y1="38.1976" x2="20.7165" y2="22.9571" gradientUnits="userSpaceOnUse"><stop stop-color="#2D0E68"/><stop offset="0.142708" stop-color="#5334DA"/><stop offset="0.569791" stop-color="#5396EC"/><stop offset="1" stop-color="#54FFFF"/></linearGradient><linearGradient id="paint2_linear_598_61732" x1="26.3077" y1="22.2486" x2="26.8703" y2="7.00814" gradientUnits="userSpaceOnUse"><stop stop-color="#2D0E68"/><stop offset="0.142708" stop-color="#5334DA"/><stop offset="0.569791" stop-color="#5396EC"/><stop offset="1" stop-color="#54FFFF"/></linearGradient><linearGradient id="paint3_linear_598_61732" x1="30.641" y1="33.3001" x2="30.0784" y2="18.0597" gradientUnits="userSpaceOnUse"><stop stop-color="#2D0E68"/><stop offset="0.142708" stop-color="#5334DA"/><stop offset="0.569791" stop-color="#5396EC"/><stop offset="1" stop-color="#54FFFF"/></linearGradient><linearGradient id="paint4_linear_598_61732" x1="4.51986" y1="26.7547" x2="9.88848" y2="12.107" gradientUnits="userSpaceOnUse"><stop stop-color="#5334DA"/><stop offset="1" stop-color="#54FFFF"/></linearGradient><linearGradient id="paint5_linear_598_61732" x1="27.1539" y1="41.0812" x2="12.5062" y2="35.7126" gradientUnits="userSpaceOnUse"><stop stop-color="#5334DA"/><stop offset="1" stop-color="#54FFFF"/></linearGradient><linearGradient id="paint6_linear_598_61732" x1="18.8138" y1="26.7547" x2="24.1824" y2="12.107" gradientUnits="userSpaceOnUse"><stop stop-color="#5334DA"/><stop offset="1" stop-color="#54FFFF"/></linearGradient><linearGradient id="paint7_linear_598_61732" x1="27.1539" y1="26.7873" x2="12.5062" y2="21.4187" gradientUnits="userSpaceOnUse"><stop stop-color="#5334DA"/><stop offset="1" stop-color="#54FFFF"/></linearGradient><clipPath id="clip0_598_61732"><rect width="32" height="32" fill="white" transform="translate(23) rotate(45)"/></clipPath></defs></svg>
                    @endif
                </a>
            </div>
            
            @include('aron.menus.guest')

            <div class="flex justify-end flex-grow -my-2 -mr-2 md:hidden">
                <button @click="mobileMenuOpen = true" type="button" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md select-none">
                    <svg class="w-6 h-6" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"></path></svg>
                </button>
            </div>
        </div>
    {{-- </div> --}}

        @include('aron.menus.guest-mobile')
        
        <div class="absolute overlay -z-10 inset-0 w-full h-full bg-accent backdrop-blur-lg"></div>
</header>
