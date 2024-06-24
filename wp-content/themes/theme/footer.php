<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Company
 */

$logo = wp_get_attachment_image_url(theme('logo_footer'), 'full');
$phones = @settings('phones');
$emails = @settings('emails');
$socials = @settings('socials');
$addresses = @settings('addresses');

$footer_additional_text = theme('footer_additional_text');
?>

<footer id="footer" class="site-footer">
    <div class="footer">
        <div class="footer__top">
            <div class="container">
                <div class="footer__top-content">
                    <div class="menus">
                        <div class="menu">
                            <h5 class="menu__title">Меню</h5>

                            <?php
                            wp_nav_menu([
                                'theme_location' => 'footMenu',
                                'container' => false,
                                'menu' => 'Главное-футер',
                                'menu_class' => 'menuFooter',
                                'echo' => true,
                                'fallback_cb' => 'wp_page_menu',
                                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'depth' => 2,
                            ]);
                            ?>
                        </div>

                        <div class="menu">
                            <h5 class="menu__title">Каталог</h5>

                            <?php
                            wp_nav_menu([
                                'theme_location' => 'footMenu',
                                'container' => false,
                                'menu' => 'Каталог-футер',
                                'menu_class' => 'menuFooter',
                                'echo' => true,
                                'fallback_cb' => 'wp_page_menu',
                                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'depth' => 2,
                            ]);
                            ?>
                        </div>
                    </div>

                    <div class="contacts">
                        <div class="contacts__wrapper">
                            <h5 class="contacts__title">
                                Контакты
                            </h5>

                            <?php if ($phones) { ?>
                                <div class="contact">
                                    <div class="contact__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             viewBox="0 0 16 16" fill="none">
                                            <path d="M6.3353 2.83815C6.13282 2.33193 5.64254 2 5.09733 2H3.26316C2.56554 2 2 2.56556 2 3.26318C2 9.19298 6.80719 14 12.737 14C13.4346 14 14 13.4345 14 12.7369L13.9999 10.9027C13.9999 10.3575 13.6679 9.86724 13.1617 9.66476L11.4048 8.96192C10.95 8.78003 10.4324 8.86201 10.0561 9.17554L9.60205 9.55382C9.07228 9.99529 8.29332 9.95999 7.8057 9.47236L6.52758 8.19434C6.03995 7.70671 6.00482 6.92769 6.44629 6.39792L6.82454 5.94398C7.13807 5.56775 7.22001 5.04995 7.03813 4.59524L6.3353 2.83815Z"
                                                  stroke="var(--accent)" stroke-width="1.5" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                        </svg>
                                    </div>

                                    <div class="contact__wrapper">
                                        <div class="p3 contact__title">Номер телефона</div>

                                        <?php foreach ($phones as $item) {
                                            $value = $item['value'];
                                            ?>
                                            <a href="tel:<?= $value; ?>" class="item phone">
                                                <?= $value; ?>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if ($emails) { ?>
                                <div class="contact">
                                    <div class="contact__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             viewBox="0 0 16 16" fill="none">
                                            <path d="M2.66667 6.66666L8.15238 10.6667L13.3333 6.66666M4.13346 14H11.8668C12.6135 14 12.9866 14 13.2719 13.8546C13.5227 13.7268 13.727 13.5228 13.8548 13.2719C14.0001 12.9867 14 12.6134 14 11.8667V7.69148C14 7.31514 14 7.12694 13.9521 6.9532C13.9098 6.79927 13.8399 6.65418 13.7463 6.52488C13.6405 6.37894 13.4939 6.2613 13.2001 6.02609L9.46745 3.03751C9.00398 2.66643 8.77205 2.48095 8.51432 2.4073C8.28692 2.34231 8.04646 2.33895 7.81735 2.39761C7.55769 2.4641 7.32091 2.64319 6.84734 3.00129L2.84668 6.02648C2.53619 6.26126 2.38082 6.37861 2.26888 6.52698C2.16973 6.6584 2.09585 6.80706 2.05083 6.9654C2 7.14418 2 7.33875 2 7.72802V11.8666C2 12.6133 2 12.9867 2.14532 13.2719C2.27316 13.5228 2.47698 13.7268 2.72786 13.8546C3.01308 14 3.38673 14 4.13346 14Z"
                                                  stroke="var(--accent)" stroke-width="1.5" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                        </svg>
                                    </div>

                                    <div class="contact__wrapper">
                                        <div class="p3 contact__title">Электронная почта</div>

                                        <?php foreach ($emails as $item) {
                                            $value = $item['value'];
                                            ?>
                                            <a href="mailto:<?= $value; ?>" class="item email">
                                                <?= $value; ?>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>

<!--                            --><?php //if ($addresses) { ?>
<!--                                <div class="contact">-->
<!--                                    <div class="contact__icon">-->
<!---->
<!--                                    </div>-->
<!---->
<!--                                    <div class="contact__wrapper">-->
<!--                                        <div class="p3 contact__title">Адрес</div>-->
<!---->
<!--                                        --><?php //foreach ($addresses as $item) {
//                                            $value = $item['value'];
//                                            ?>
<!--                                            <div class="item">-->
<!--                                                --><?php //= $value; ?>
<!--                                            </div>-->
<!--                                        --><?php //} ?>
<!--                                    </div>-->
<!--                                </div>-->
<!--                            --><?php //} ?>
                            
                            <?php if ($socials) {?>
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

                        <div class="additional">
                            <div class="btn" data-modal="question">Задать вопрос</div>

                            <?php if ($logo) { ?>
                                <a href="/" class="footer__logo">
                                    <img src="<?= $logo; ?>" alt="">
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer__bottom">
            <div class="container">
                <div class="footer__bottom-content">
                    <a href="/privacy-policy" class="policy">Политика конфиденциальности</a>

                    <a href="https://grampus-studio.ru/?utm_source=client&utm_keyword=<?= get_site_url(); ?>;"
                       class="p3 grampus">
                        Cайт разработан

                        <?= inline('assets/images/GRAMPUS.svg'); ?>
                    </a>

                    <?php if ($footer_additional_text) { ?>
                        <div class="p3 footer__additional-text"><?= $footer_additional_text; ?></div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="modal-question" class="theme-modal">
    <div class="close-modal">
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
            <g clip-path="url(#clip0_554_125010)">
                <path d="M9.47297 0L6 3.47295L2.52705 0L0 2.52705L3.47297 6L0 9.47295L2.52703 12L6 8.52703L9.47297 12L12 9.47295L8.52703 5.99998L12 2.52703L9.47297 0Z"
                      fill="#C9CCCE"/>
            </g>
            <defs>
                <clipPath id="clip0_554_125010">
                    <rect width="12" height="12" fill="white"/>
                </clipPath>
            </defs>
        </svg>
    </div>
    <div class="form__holder">
        <h3 class="form-title">Задать вопрос</h3>

        <?php get_form('question-modal') ?>
    </div>
</div>

<div id="modal-callback" class="theme-modal">
    <div class="close-modal">
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
            <g clip-path="url(#clip0_554_125010)">
                <path d="M9.47297 0L6 3.47295L2.52705 0L0 2.52705L3.47297 6L0 9.47295L2.52703 12L6 8.52703L9.47297 12L12 9.47295L8.52703 5.99998L12 2.52703L9.47297 0Z"
                      fill="#C9CCCE"/>
            </g>
            <defs>
                <clipPath id="clip0_554_125010">
                    <rect width="12" height="12" fill="white"/>
                </clipPath>
            </defs>
        </svg>
    </div>
    <div class="form__holder">
        <h3 class="form-title">Обратная связь</h3>

        <?php get_form('callback-modal') ?>
    </div>
</div>

<div id="modal-success" class="theme-modal">
    <div class="close-modal">×</div>

    <h2 class="block-title">
        Спасибо!
    </h2>

    <h3>
        Ваша заявка отправлена
    </h3>
</div>

<div id="modal-error" class="theme-modal">
    <div class="close-modal">×</div>

    <h2 class="block-title">
        Ошибка!
    </h2>

    <h3>
        Во время отправки произошла ошибка, пожалуйста, попробуйте позже!
    </h3>
</div>

<?php wp_footer(); ?>

</body>
</html>