import Swiper from "swiper/bundle";
import "swiper/css/bundle";

export default {
    create: function (response) {
        if (!document.querySelector(".mySwiper")) return;

        // const breakpoints = () => {
        //     let breakpoints = {}
        //     for(let i=0; i < 20; i++) {
        //         breakpoints[i*200] = {
        //             slidesPerView: 1.25 + i*0.1,
        //             spaceBetween: 75 + 10*i
        //         }
        //     }
        //     return breakpoints
        // }

        var swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            preloadImages: true,
            lazy: {
                loadPrevNext: true,
                loadPrevNextAmount: 2,
            },
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
            initialSlide: response.slider.activeSlide - 1,
            slideToClickedSlide: true,
            init: false,
        });

        const swiperSlides = document.getElementsByClassName("swiper-slide");
        const hide = () => {
            for (let index = 0; index < swiperSlides.length; index++) {
                swiperSlides[index].getElementsByClassName(
                    "slide-details"
                )[0].style.maxHeight = "0";
            }
            swiperSlides[swiper.realIndex].getElementsByClassName(
                "slide-details"
            )[0].style.maxHeight = "300px";
        };

        swiper.on("lazyImageReady", () => {
            document.querySelectorAll(".swiper-slide > div").forEach((i) => {
                i.classList.remove(
                    ...["invisible", "opacity-0", "transition-none"]
                );
                i.classList.add(
                    ...["visible", "opacity-100", "transition-all"]
                );
            });

            document
                .querySelectorAll(".swiper-slide > div > img")
                .forEach((i) => {
                    i.classList.remove(...["translate-y-4", "transition-none"]);
                    i.classList.add(...["translate-y-0", "transition-all"]);
                });

            document
                .querySelectorAll(".slide-details-container")
                .forEach((i) => {
                    i.classList.remove(
                        ...["-translate-y-full", "invisible", "transition-none"]
                    );
                    i.classList.add(
                        ...["translate-y-0", "visible", "transition-all"]
                    );
                });
        });

        swiper.on("init", () => hide());
        swiper.init();
        swiper.on("slideChange", () => hide());
    }
};
