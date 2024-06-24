jQuery(document).ready(function($){

    const mainBannerSwiperText = new Swiper('#mainbanner-block .swiper-text',{
        slidesPerView: 1,
        navigation:{
            prevEl: '#mainbanner-block .swiper-text .swiper-btn-prev',
            nextEl: '#mainbanner-block .swiper-text .swiper-btn-next',
        }
    })

    const  mainBannerSwiperImages = new Swiper('#mainbanner-block .swiper-images',{
        slidesPerView: 1,
        navigation:{
            prevEl: '#mainbanner-block .swiper-images .swiper-btn-prev',
            nextEl: '#mainbanner-block .swiper-images .swiper-btn-next',
        }
    })

    mainBannerSwiperText.on('slideChange', function (){
        mainBannerSwiperImages.slideTo(mainBannerSwiperText.activeIndex);
    })

    mainBannerSwiperImages.on('slideChange', function (){
        mainBannerSwiperText.slideTo(mainBannerSwiperImages.activeIndex);
    })
});