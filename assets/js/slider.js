import Swiper from 'swiper/bundle'
import '../styles/libraries/swiper-bundle.min.css'
import '../styles/slider.css'




const hero_swiper = new Swiper(".hero__slider", {
    // autoplay: {
    //     delay: 3000,
    // },
    effect: 'fade',
});

const new_swiper = new Swiper(".new__slider", {
    spaceBetween: 40,
    slidesPerView: 4,
    loop: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});



