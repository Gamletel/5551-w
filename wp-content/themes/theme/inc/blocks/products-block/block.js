jQuery(document).ready(function($){

    const productsBlock = new Swiper('#products-block .swiper',{
        slidesPerView: 4,
        spaceBetween: 20,
        autoHeight: true,

        navigation:{
            prevEl: '#products-block .swiper-btn-prev',
            nextEl: '#products-block .swiper-btn-next',
        },

        pagination:{
            el: '#products-block .swiper-pagination',
        },

        breakpoints:{
            320:{
                slidesPerView: 1,
            },

            576:{
                slidesPerView: 2,
            },

            992:{
                slidesPerView: 3,
            },

            1221:{
                slidesPerView: 4.
            }
        }
    })

});