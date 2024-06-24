jQuery(document).ready(function($){

    const brandsSwiper = new Swiper('#brands-block .swiper',{
        spaceBetween: 20,
        navigation:{
            prevEl: '#brands-block .swiper-btn-prev',
            nextEl: '#brands-block .swiper-btn-next',
        },
        pagination:{
            el: '#brands-block .swiper-pagination'
        },
        breakpoints:{
            320:{
                slidesPerView: 2,
            },
            498:{
                slidesPerView: 3,
            },
            576:{
              slidesPerView: 4,
            },
            769:{
                slidesPerView: 5,
            },
            992:{
                slidesPerView: 6,
            }
        }
    })

});