// Изменение количества товаров в корзине
var tct = null;

function cChangeValue(iid, m) {
    var i = jQuery('#input-' + iid);
    var productAmount = jQuery('#' + iid);
    var cv = i.val();
    if (m == 1) {
        cv--;
        i.val(cv);
        productAmount.html(cv);
    }
    if (m == 0) {
        cv++;
        i.val(cv);
        productAmount.html(cv);
    }
    if (tct) {
        var q = tct;
        clearTimeout(q);
    }
    tct = setTimeout(function () {
        i.trigger('change');
        clearTimeout(tct);
    }, 300);
}

jQuery(document).ready(function ($) {
    console.log('test');

    $('input[type=tel]').inputmask({"mask": "+7 999 999-99-99"}); //specifying options

    window.formPhoneValidator = function (input) {
        let tempInput = input.toString().replaceAll('_', '');
        tempInput = tempInput.replaceAll(' ', '');
        tempInput = tempInput.replaceAll('-', '');

        return tempInput.length === 12;
    }

    //Показываем подподкатегории
    const productsCategories = $('.product-category.product');
    productsCategories.each(function () {
        let parent = $(this);
        let linkBtn = $(this).find('.link');
        let subcats = $(this).find('.subcats');
        let closeSubcats = $(this).find('.close-subcats');
        closeSubcats.click(function () {
            subcats.removeClass('selected');
        })

        linkBtn.click(function () {
            parent.siblings().find('.subcats').removeClass('selected');
            subcats.toggleClass('selected');
        })
    })

    // Убираем кнопку добавления товара в корзину при выборе доп. опций
    let hasSelectedAdditionalOptions = false;
    const variationAddToCart = $('.product-type-variable .woocommerce-variation-add-to-cart');
    const callbackBtn = $('<div class="btn callback-btn" data-modal="callback">Запросить</div>');
    const qtyWrapper = variationAddToCart.find('.qty-wrapper');
    const addToCartBtn = variationAddToCart.find('.single_add_to_cart_button');
    const additionalOptions = $('.single-product .additional-option');
    const additionalPrice = $('<h3 class="product-additional-price">Цена по запросу</h3>')

    variationAddToCart.prepend(callbackBtn);
    callbackBtn.hide();

    additionalOptions.each(function () {
        $(this).click(function () {
            let productPrice = $('.product-type-variable .woocommerce-variation-price .price');
            let priceText = productPrice.find('.product-price');
            let option = $(this);
            let checkbox = $(this).find('.additional-option__checkbox');
            if (checkbox.is(':checked')) {
                option.addClass('selected');
            } else {
                option.removeClass('selected');
            }

            hasSelectedAdditionalOptions = false;
            additionalOptions.each(function () {
                if ($(this).hasClass('selected')) {
                    hasSelectedAdditionalOptions = true;
                } else {
                    if (hasSelectedAdditionalOptions === true) {
                        return;
                    } else {
                        hasSelectedAdditionalOptions = false;
                    }
                }
            })

            switch (hasSelectedAdditionalOptions) {
                case true:
                    callbackBtn.show();
                    qtyWrapper.hide();
                    addToCartBtn.hide();
                    priceText.hide();
                    productPrice.prepend(additionalPrice);
                    break;

                case false:
                    callbackBtn.hide();
                    qtyWrapper.show();
                    addToCartBtn.show();
                    priceText.show();
                    additionalPrice.remove();
                    break;
            }
        })
    })

    // Меняем класс selected при нажатии на radio-btn на странице checkout
    $('.who-section .woocommerce-input-wrapper').children('label:first-child').addClass('selected');
    const whoSectionLabels = $('.who-section label');
    whoSectionLabels.each(function () {
        $(this).click(function () {
            $(this).addClass('selected').siblings().removeClass('selected');
        })
    })
    const additionalShippingSection = $('#shipping_method li');
    additionalShippingSection.each(function () {
        $(this).click(function () {
            additionalShippingSection.each(function () {
                $(this).find('label').removeClass('selected');
            })
            $(this).find('label').addClass('selected');
        })
    })

    // Меняем класс selected при нажатии на фильтр товаров
    const filterGroups = $('.filters-widget .group');
    filterGroups.each(function () {
        let checkbox = $(this).find('input[type=checkbox]');
        let label = $(this).find('.group-label');

        if (checkbox.is(':checked')) {
            label.addClass('selected');
        }
    })
    const filterGroupLabels = $('.group-label');
    filterGroupLabels.each(function () {
        $(this).click(function () {
            $(this).toggleClass('selected');
        })
    })

    // Открытие и закрытие фильтра товаров
    const filtersWidget = $('.filters-widget');
    const openFilter = $('#open-filter');
    const closeFilter = $('#close-filter');
    openFilter.click(function () {
        filtersWidget.toggleClass('opened');
    })
    closeFilter.click(function () {
        filtersWidget.removeClass('opened');
    })

    const singleWorkSwiper = new Swiper('.single-works .single-works__swiper', {
        spaceBetween: 20,
        navigation: {
            prevEl: '.single-works .single-works__swiper-additionals .swiper-btn-prev',
            nextEl: '.single-works .single-works__swiper-additionals .swiper-btn-next',
        },
        pagination: {
            el: '.single-works .single-works__swiper-additionals .swiper-pagination'
        },
        breakpoints: {
            320: {
                slidesPerView: 2,
            },
            498: {
                slidesPerView: 3,
            },
            789: {
                slidesPerView: 4,
            }
        }
    })

    const singleNewsSwiper = new Swiper('.single-news .single-news__gallery .swiper', {
        slidesPerView: 2,
        spaceBetween: 20,
        navigation: {
            prevEl: '.single-news .single-news__gallery .swiper-btn-prev',
            nextEl: '.single-news .single-news__gallery .swiper-btn-next',
        },
        pagination: {
            el: '.single-news .single-news__gallery .swiper-pagination',
        },
    })

    const swiperCard = new Swiper('.single-product .product-swipers .main-swiper', {
        direction: 'horizontal',
        loop: true,
        slidesPerView: 1,
        spaceBetween: 20,
        navigation: {
            nextEl: '.swiper-mini-btn-next',
            prevEl: '.swiper-mini-btn-prev',
        },
        autoplay: {
            delay: 3000,
        },
        thumbs: {
            swiper: {
                el: '.single-product .product-swipers .thumbs-swiper',
                slidesPerView: 4,
                direction: 'horizontal',
                spaceBetween: 10,
                breakpoints: {
                    // when window width is >= 320px
                    320: {
                        slidesPerView: 3,
                    },
                    // when window width is >= 480px
                    480: {
                        slidesPerView: 4,
                    },
                    // when window width is >= 640px
                    640: {
                        slidesPerView: 5,
                    }
                }
            }
        }
    });

    /*
    * Табы товара
    * */
    const productTabs = $('.single-product .product__bottom-block .tab');
    const productTabBlocks = $('.single-product .product__bottom-block .tab-block');

    $(productTabs[0]).removeClass('disabled');

    $(productTabBlocks[0]).show().siblings('.tab-block').hide();

    productTabs.each(function () {
        $(this).click(function () {
            let tab = $(this);
            let dataTab = $(this).data('tab');

            productTabBlocks.each(function () {
                let blockDataTab = $(this).data('tab');
                if (blockDataTab === dataTab) {
                    $(this).show();
                    tab.removeClass('disabled').siblings().addClass('disabled');
                } else {
                    $(this).hide();
                }
            })
        })
    })

    // $(document).scroll(function() {
    //     if ($(this).scrollTop() >= 50) {
    //     $('#header').addClass('painted');
    //     // console.log('scroll')
    //     }else{
    //     $('#header').removeClass('painted');
    //     }
    // });
    //

    // $("li.nav-menu-element a").click(function() { // ID откуда кливаем
    // 	let hash = $(this).attr('href');
    // 	if(hash.length > 1) {
    // 		$(this).parent().addClass('active');
    // 		$(this).parent().siblings().removeClass('active');
    // 		$('html, body').animate({
    //             scrollTop: $(hash).offset().top - 120 // класс объекта к которому приезжаем
    //         }, 1000); // Скорость прокрутки
    // 	}
    // });


    /*============ FUNCTIONS ===========*/

    // function getCallbackForm(modal, props) {
    //     let id = props['data-modal'].value;
    //     if($(modal).find('.form__holder').html() == '') {
    //         $.ajax({
    //             url: `/wp-admin/admin-ajax.php?action=get_modal_form&modal=${id}`,
    //             method: 'GET',
    //             success: function (data){
    //                 $(modal).find('.form__holder').html(data);
    //                 let form = $(modal).find('form').get(0);

    //                 ThemeModal.reinitForms(form);
    //                 ThemeModal.getInstance().openModal(id);
    //             },
    //             error: function (data) {
    //                 ThemeModal.getInstance().openModal('error');
    //             }
    //         });
    //     }else{
    //         ThemeModal.getInstance().openModal(id);
    //     }
    // }

    let mobileMenu = new MobileMenu(); // Вызов объекта класса мобильного меню
    mobileMenu.init(); // Инициализация мобильного меню
    let themeModal = new ThemeModal({}); // Вызов объекта класса модалок

    // themeModal.modalsView['callback'] = {
    // 	callback: getCallbackForm
    // };
    themeModal.init(); // Инициализация модалок

});
