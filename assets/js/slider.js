import Swiper from 'swiper/bundle'
import '../styles/libraries/swiper-bundle.min.css'
import '../styles/slider.css'

//**********HERO_SLIDE**********
const hero_swiper = new Swiper(".hero__slider", {
    // autoplay: {
    //     delay: 3000,
    // },
    effect: 'fade',
});

//**********NEW_SLIDE**********
const new_swiper = new Swiper(".new__slider", {
    spaceBetween: 40,
    slidesPerView: 4,
    loop: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

//**********GALLERY_SLIDE**********

const swiper_prev = new Swiper('.swiper-preview', {
    direction: 'vertical',
    slidesPerView: 3,
    spaceBetween: 22,
    mousewheel: true,
    navigation: {
        nextEl: '.preview-button__next',
        prevEl: '.preview-button__prev',
    },
});

const swiper_main = new Swiper('.swiper-main', {
    spaceBetween: 10,
    thumbs: {
        swiper: swiper_prev,
    },
});


