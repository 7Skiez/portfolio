import Swiper from "swiper/bundle";
import "swiper/css/bundle";

export function mySwiper(response) {
    
    if (!document.querySelector(".mySwiper")) return;

    var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        preloadImages: false,
        lazy: true,
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        watchSlidesProgress: true,
        coverflowEffect: {
            rotate: 0,
            stretch: 0,
            depth: 300,
            modifier: 1,
            slideShadows: false,
        },
        breakpoints: {
            // when window width is >= 0px
            0: {
                slidesPerView: 1.25,
                spaceBetween: 75,
            },
            // when window width is >= 640px
            640: {
                slidesPerView: 1.5,
                spaceBetween: 125,
            },
            // when window width is >= 1024px
            1024: {
                slidesPerView: 1.75,
                spaceBetween: 150,
            },
            // when window width is >= 1536px
            1536: {
                slidesPerView: 2.0,
                spaceBetween: 180,
            },

            1920: {
                slidesPerView: 2.2,
                spaceBetween: 200,
            },

            2250: {
                slidesPerView: 2.2,
                spaceBetween: 250,
            },

            2650: {
                slidesPerView: 2.2,
                spaceBetween: 300,
            },

            5700: {
                slidesPerView: 2.2,
                spaceBetween: 600,
            },
        },
        // slidesPerView: 2.2,
        // spaceBetween: 200,
        initialSlide: response.slider.activeSlide - 1,
        slideToClickedSlide: true,
        init: false,
    });

    const swiperSlides = document.getElementsByClassName("swiper-slide");
    const hide = () => {
        for (let index = 0; index < swiperSlides.length; index++) {
            swiperSlides[index].getElementsByClassName(
                "slide-details"
            )[0].style.display = "none";
        }
        swiperSlides[swiper.realIndex].getElementsByClassName(
            "slide-details"
        )[0].style.display = "block";
    };

    swiper.on("lazyImageReady", () => {
        document.querySelectorAll(".swiper-slide > div").forEach((i) => {
            i.classList.remove(
                ...["invisible", "opacity-0", "transition-none"]
            );
            i.classList.add(...["visible", "opacity-100", "transition-all"]);
        });

        document.querySelectorAll(".swiper-slide > div > img").forEach((i) => {
            i.classList.remove(...["translate-y-4", "transition-none"]);
            i.classList.add(...["translate-y-0", "transition-all"]);
        });

        document.querySelectorAll(".slide-details-container").forEach((i) => {
            i.classList.remove(
                ...["-translate-y-full", "invisible", "transition-none"]
            );
            i.classList.add(...["translate-y-0", "visible", "transition-all"]);
        });
    });

    swiper.on("init", () => hide());
    swiper.init();
    swiper.on("slideChange", () => hide());
}
