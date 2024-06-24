jQuery(document).ready(function($){

    const newsSwiper = new Swiper('#news-block .swiper', {
        spaceBetween: 20,
        navigation:{
            prevEl: '#news-block .swiper-btn-prev',
            nextEl: '#news-block .swiper-btn-next',
        },
        pagination:{
            el: '#news-block .swiper-pagination',
        },
        breakpoints:{
            320:{
                slidesPerView: 1,
            },
            768:{
                slidesPerView: 2,
            }
        },
    })
});