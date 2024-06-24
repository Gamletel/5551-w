<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme
 */

$logo = wp_get_attachment_image_url(theme('logo_header'), 'full');
$phones = @settings('phones');
$emails = @settings('emails');
$socials = @settings('socials');
$addresses = @settings('addresses');

$download_file = theme('download_file');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header id="header" class="site-header">
    <div class="header">
        <div class="container">
            <div class="header__wrapper">
                <?php if ($logo) { ?>
                    <a href="/" class="logo">
                        <img src="<?= $logo; ?>" alt="">
                    </a>
                <?php } ?>

                <div class="header__content">
                    <div class="header__top">
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'headMenu',
                            'container' => false,
                            'menu' => 'Главное',
                            'menu_class' => 'menuTop',
                            'echo' => true,
                            'fallback_cb' => 'wp_page_menu',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth' => 2,
                        ]);
                        ?>

                        <?php if ($phones || $socials) { ?>
                            <div class="header__contacts">
                                <?php if ($phones) {
                                    $value = $phones[0]['value'];
                                    ?>
                                    <a href="tel:<?= $value; ?>" class="phone p3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             viewBox="0 0 16 16"
                                             fill="none">
                                            <path d="M6.3353 2.83815C6.13282 2.33193 5.64254 2 5.09733 2H3.26316C2.56554 2 2 2.56556 2 3.26318C2 9.19298 6.80719 14 12.737 14C13.4346 14 14 13.4345 14 12.7369L13.9999 10.9027C13.9999 10.3575 13.6679 9.86724 13.1617 9.66476L11.4048 8.96192C10.95 8.78003 10.4324 8.86201 10.0561 9.17554L9.60205 9.55382C9.07228 9.99529 8.29332 9.95999 7.8057 9.47236L6.52758 8.19434C6.03995 7.70671 6.00482 6.92769 6.44629 6.39792L6.82454 5.94398C7.13807 5.56775 7.22001 5.04995 7.03813 4.59524L6.3353 2.83815Z"
                                                  stroke="#34A0E1" stroke-width="1.5" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                        </svg>

                                        <?= $value; ?>
                                    </a>
                                <?php } ?>

                                <?php if ($socials) { ?>
                                    <div class="socials">
                                        <?php foreach ($socials as $social) {
                                            $value = $social['value'];
                                            $icon = wp_get_attachment_image_url($social['icon'], 'full');
                                            ?>
                                            <a href="<?= $value; ?>" class="social">
                                                <img src="<?= $icon; ?>" alt="" class="style-svg">
                                            </a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="header__bottom">
                        <div class="burger open_menu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                        <div class="links">
                            <div class="link-holder">
                                <a href="/shop" class="catalog header__bottom-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17"
                                         fill="none">
                                        <path d="M11.3333 12.5C11.3333 12.8682 11.6318 13.1667 12 13.1667C12.3682 13.1667 12.6666 12.8682 12.6666 12.5C12.6666 12.1318 12.3682 11.8333 12 11.8333C11.6318 11.8333 11.3333 12.1318 11.3333 12.5Z"
                                              stroke="var(--Head)" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M7.33331 12.5C7.33331 12.8682 7.63179 13.1667 7.99998 13.1667C8.36817 13.1667 8.66665 12.8682 8.66665 12.5C8.66665 12.1318 8.36817 11.8333 7.99998 11.8333C7.63179 11.8333 7.33331 12.1318 7.33331 12.5Z"
                                              stroke="var(--Head)" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M3.33331 12.5C3.33331 12.8682 3.63179 13.1667 3.99998 13.1667C4.36817 13.1667 4.66665 12.8682 4.66665 12.5C4.66665 12.1318 4.36817 11.8333 3.99998 11.8333C3.63179 11.8333 3.33331 12.1318 3.33331 12.5Z"
                                              stroke="var(--Head)" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M11.3333 8.5C11.3333 8.86819 11.6318 9.16667 12 9.16667C12.3682 9.16667 12.6666 8.86819 12.6666 8.5C12.6666 8.13181 12.3682 7.83334 12 7.83334C11.6318 7.83334 11.3333 8.13181 11.3333 8.5Z"
                                              stroke="var(--Head)" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M7.33331 8.5C7.33331 8.86819 7.63179 9.16667 7.99998 9.16667C8.36817 9.16667 8.66665 8.86819 8.66665 8.5C8.66665 8.13181 8.36817 7.83334 7.99998 7.83334C7.63179 7.83334 7.33331 8.13181 7.33331 8.5Z"
                                              stroke="var(--Head)" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M3.33331 8.5C3.33331 8.86819 3.63179 9.16667 3.99998 9.16667C4.36817 9.16667 4.66665 8.86819 4.66665 8.5C4.66665 8.13181 4.36817 7.83334 3.99998 7.83334C3.63179 7.83334 3.33331 8.13181 3.33331 8.5Z"
                                              stroke="var(--Head)" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M11.3333 4.5C11.3333 4.86819 11.6318 5.16667 12 5.16667C12.3682 5.16667 12.6666 4.86819 12.6666 4.5C12.6666 4.13181 12.3682 3.83334 12 3.83334C11.6318 3.83334 11.3333 4.13181 11.3333 4.5Z"
                                              stroke="var(--Head)" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M7.33331 4.5C7.33331 4.86819 7.63179 5.16667 7.99998 5.16667C8.36817 5.16667 8.66665 4.86819 8.66665 4.5C8.66665 4.13181 8.36817 3.83334 7.99998 3.83334C7.63179 3.83334 7.33331 4.13181 7.33331 4.5Z"
                                              stroke="var(--Head)" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M3.33331 4.5C3.33331 4.86819 3.63179 5.16667 3.99998 5.16667C4.36817 5.16667 4.66665 4.86819 4.66665 4.5C4.66665 4.13181 4.36817 3.83334 3.99998 3.83334C3.63179 3.83334 3.33331 4.13181 3.33331 4.5Z"
                                              stroke="var(--Head)" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                    </svg>

                                    <h6>Каталог</h6>
                                </a>

                                <?php
                                wp_nav_menu([
                                    'theme_location' => 'mobileMenu',
                                    'container' => false,
                                    'menu' => 'Каталог',
                                    'menu_class' => 'catalogTop',
                                    'echo' => true,
                                    'fallback_cb' => 'wp_page_menu',
                                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'depth' => 2,
                                ]);
                                ?>
                            </div>


                            <a href="/" class="specials header__bottom-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17"
                                     fill="none">
                                    <path d="M1.55664 7.39117C1.34781 7.19805 1.46125 6.84892 1.74371 6.81543L5.74609 6.34089C5.86122 6.32724 5.96121 6.25471 6.00977 6.14944L7.69792 2.48953C7.81705 2.23124 8.18425 2.23121 8.30339 2.4895L9.99154 6.14949C10.0401 6.25476 10.1394 6.32725 10.2546 6.3409L14.2572 6.81543C14.5396 6.84892 14.653 7.19807 14.4442 7.39119L11.4853 10.1277C11.4002 10.2064 11.3622 10.3237 11.3848 10.4374L12.1701 14.3906C12.2255 14.6696 11.9286 14.8854 11.6804 14.7464L8.16352 12.7778C8.06236 12.7212 7.93914 12.7211 7.83798 12.7778L4.32072 14.7465C4.07252 14.8854 3.77529 14.6696 3.83073 14.3907L4.61625 10.4374C4.63884 10.3237 4.60089 10.2064 4.51578 10.1277L1.55664 7.39117Z"
                                          stroke="var(--Head)" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>

                                <h6>Cпецпредложения</h6>
                            </a>
                        </div>

                        <?= get_search_form(); ?>

                        <div class="wc-btns">
                            <a href="<?= wc_get_favorites_url(); ?>" class="favorite-btn wc-btn">
                                <?php
                                $favCount = WCFAVORITES()->count_items();
                                ?>
                                    <div class="number"><?= WCFAVORITES()->count_items(); ?></div>
                                <?php  ?>

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
                                    <path d="M12 8.19444C10 3.5 3 4 3 10C3 16.0001 12 21 12 21C12 21 21 16.0001 21 10C21 4 14 3.5 12 8.19444Z"
                                          stroke="var(--Head)" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </a>

                            <a href="<?= wc_get_cart_url(); ?>" class="cart-btn wc-btn">
                                <?php if (WC()->cart->get_cart_contents_count() > 0) { ?>
                                    <div id="cart-count" class="number"><?= WC()->cart->get_cart_contents_count(); ?></div>
                                <?php } ?>

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
                                    <path d="M3 3H3.26835C3.74213 3 3.97922 3 4.17246 3.08548C4.34283 3.16084 4.48871 3.2823 4.59375 3.43616C4.71289 3.61066 4.75578 3.84366 4.8418 4.30957L7.00004 16L17.4195 16C17.8739 16 18.1016 16 18.2896 15.9198C18.4554 15.8491 18.5989 15.7348 18.7051 15.5891C18.8255 15.424 18.8763 15.2025 18.9785 14.7597L20.5477 7.95972C20.7022 7.29025 20.7796 6.95561 20.6946 6.69263C20.6201 6.46207 20.4639 6.26634 20.256 6.14192C20.0189 6 19.6758 6 18.9887 6H5.5M18 21C17.4477 21 17 20.5523 17 20C17 19.4477 17.4477 19 18 19C18.5523 19 19 19.4477 19 20C19 20.5523 18.5523 21 18 21ZM8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20C9 20.5523 8.55228 21 8 21Z"
                                          stroke="var(--Head)" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="mobile-mnu">
        <div id="close-mnu">×</div>

        <a href="/" class="logo">
            <img src="<?= $logo; ?>" alt="">
        </a>

        <h5>Меню</h5>
        <?php
        wp_nav_menu([
            'theme_location' => 'mobileMenu',
            'container' => false,
            'menu' => 'Главное',
            'menu_class' => 'menuTop',
            'echo' => true,
            'fallback_cb' => 'wp_page_menu',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth' => 2,
        ]);
        ?>

        <h5>Каталог</h5>
        <?php
        wp_nav_menu([
            'theme_location' => 'mobileMenu',
            'container' => false,
            'menu' => 'Каталог',
            'menu_class' => 'menuTop',
            'echo' => true,
            'fallback_cb' => 'wp_page_menu',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth' => 2,
        ]);
        ?>

        <?php if ($phones) { ?>
            <div class="phones__holder">
                <?php foreach ($phones as $item) { ?>
                    <a href="tel:<?= $item['value']; ?>" class="phone__item">
                        <?= file_get_contents(TEMPLATEPATH . '/assets/images/phone.svg'); ?>
                        <?= $item['name']; ?>
                    </a>
                <?php } ?>
            </div>
        <?php } ?>

        <?php if (!empty($emails)): ?>
            <div class="email__holder">
                <?php foreach ($emails as $item) { ?>
                    <a href="mailto:<?= $item['value']; ?>" class="email__item">
                        <?= file_get_contents(TEMPLATEPATH . '/assets/images/mail.svg'); ?>
                        <?php echo $item['name']; ?>
                    </a>
                <?php } ?>
            </div>
        <?php endif ?>

        <?php if (!empty($adresses)): ?>
            <div class="adresses__holder">
                <?php foreach ($adresses as $adress) { ?>
                    <?= $adress['value']; ?>
                <?php } ?>
            </div>
        <?php endif ?>

        <?php if (!empty($socials)): ?>
            <div class="soc__holder">
                <?php foreach ($socials as $item) { ?>
                    <a href="<?= $item['value']; ?>" class="soc__item">
                        <?= get_image($item['icon'], [24, 24]); ?>
                    </a>
                <?php } ?>
            </div>
        <?php endif ?>
    </div>

    <?php if (!is_null($download_file)) {
        $image = wp_get_attachment_image_url($download_file['image']);
        $file = $download_file['file'];
        ?>
        <a href="<?= $file; ?>" id="download-file" download>
            <img src="<?= $image; ?>" class="style-svg" alt="">
        </a>
    <?php } ?>
</header><!-- #masthead -->
