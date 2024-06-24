jQuery(document).ready(function($){

    const swiperBlockSlider = new Swiper('#slider-block .swiper',{
        spaceBetween: 20,
        loop: true,
        navigation:{
            prevEl: '#slider-block .swiper-btn-prev',
            nextEl: '#slider-block .swiper-btn-next',
        },

        pagination:{
            el:'#slider-block .swiper-pagination',
        },

        breakpoints:{
            320:{
                slidesPerView: 1,
            },
            480:{
                slidesPerView: 2,
            },
            769:{
                slidesPerView: 3,
            },
            992:{
                slidesPerView: 4,
            }
        }
    })

});