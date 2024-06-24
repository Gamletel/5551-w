jQuery(document).ready(function($){

    const worksSwiper = new Swiper('#works-block .swiper',{
        spaceBetween: 20,
        breakpoints:{
            320:{
                slidesPerView: 1,
            },
            769:{
                slidesPerView: 2,
            }
        },
        navigation:{
            prevEl: '#works-block .swiper-btn-prev',
            nextEl: '#works-block .swiper-btn-next',
        },
        pagination:{
            el: '#works-block .swiper-pagination',
        }
    })

});