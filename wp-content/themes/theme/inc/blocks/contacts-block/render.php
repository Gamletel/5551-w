<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$block_title = get_field('block_title');
$addresses = @settings('addresses');
$phones = @settings('phones');
$emails = @settings('emails');
$custom_socials = get_field('custom_socials');
if ($custom_socials) {
    $socials = get_field('socials');
} else {
    $socials = @settings('socials');
}
$show_map = get_field('show_map');
?>
<div id="contacts-block" class="<?= $classes; ?> <?= $align; ?>">
    <div class="container">
        <?php if ($block_title) { ?>
            <h2 class="block-title"><?= $block_title; ?></h2>
        <?php } ?>

        <div class="contacts">
            <?php if ($addresses) { ?>
                <div class="item address">
                    <div class="item__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M3.33203 6.6154C3.33203 9.84994 6.16168 12.5248 7.41416 13.5503L7.41464 13.5507C7.59424 13.6978 7.68407 13.7713 7.81793 13.809C7.92206 13.8383 8.07523 13.8383 8.17936 13.809C8.31334 13.7713 8.40341 13.6976 8.58333 13.5503C9.83581 12.5248 12.6653 9.84992 12.6653 6.61538C12.6653 5.3913 12.1737 4.21737 11.2985 3.35181C10.4234 2.48626 9.2364 2 7.99872 2C6.76105 2 5.57404 2.48625 4.69887 3.35181C3.8237 4.21736 3.33203 5.39132 3.33203 6.6154Z"
                                  stroke="var(--accent)" stroke-width="1.5" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <path d="M9.91536 6.66667C9.91536 7.72521 9.05724 8.58333 7.9987 8.58333C6.94015 8.58333 6.08203 7.72521 6.08203 6.66667C6.08203 5.60812 6.94015 4.75 7.9987 4.75C9.05724 4.75 9.91536 5.60812 9.91536 6.66667Z"
                                  stroke="var(--accent)" stroke-width="1.5"/>
                        </svg>
                    </div>

                    <div class="item__holder">
                        <div class="p3 item__title">
                            Адрес
                        </div>

                        <div class="item__contacts">
                            <?php foreach ($addresses as $item) {
                                $value = $item['value'];
                                ?>
                                <div class="item__contact">
                                    <h6><?= $value; ?></h6>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if ($phones) { ?>
                <div class="item">
                    <div class="item__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M6.3353 2.83815C6.13282 2.33193 5.64254 2 5.09733 2H3.26316C2.56554 2 2 2.56556 2 3.26318C2 9.19298 6.80719 14 12.737 14C13.4346 14 14 13.4345 14 12.7369L13.9999 10.9027C13.9999 10.3575 13.6679 9.86724 13.1617 9.66476L11.4048 8.96192C10.95 8.78003 10.4324 8.86201 10.0561 9.17554L9.60205 9.55382C9.07228 9.99529 8.29332 9.95999 7.8057 9.47236L6.52758 8.19434C6.03995 7.70671 6.00482 6.92769 6.44629 6.39792L6.82454 5.94398C7.13807 5.56775 7.22001 5.04995 7.03813 4.59524L6.3353 2.83815Z"
                                  stroke="var(--accent)" stroke-width="1.5" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                    </div>

                    <div class="item__holder">
                        <div class="p3 item__title">
                            Номер телефона
                        </div>

                        <div class="item__contacts">
                            <?php foreach ($phones as $item) {
                                $value = $item['value'];
                                ?>
                                <a href="tel:<?= $value; ?>" class="item__contact phone">
                                    <h6><?= $value; ?></h6>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if ($emails) { ?>
                <div class="item">
                    <div class="item__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M2.66667 6.66666L8.15238 10.6667L13.3333 6.66666M4.13346 14H11.8668C12.6135 14 12.9866 14 13.2719 13.8546C13.5227 13.7268 13.727 13.5228 13.8548 13.2719C14.0001 12.9867 14 12.6134 14 11.8667V7.69148C14 7.31514 14 7.12694 13.9521 6.9532C13.9098 6.79927 13.8399 6.65418 13.7463 6.52488C13.6405 6.37894 13.4939 6.2613 13.2001 6.02609L9.46745 3.03751C9.00398 2.66643 8.77205 2.48095 8.51432 2.4073C8.28692 2.34231 8.04646 2.33895 7.81735 2.39761C7.55769 2.4641 7.32091 2.64319 6.84734 3.00129L2.84668 6.02648C2.53619 6.26126 2.38082 6.37861 2.26888 6.52698C2.16973 6.6584 2.09585 6.80706 2.05083 6.9654C2 7.14418 2 7.33875 2 7.72802V11.8666C2 12.6133 2 12.9867 2.14532 13.2719C2.27316 13.5228 2.47698 13.7268 2.72786 13.8546C3.01308 14 3.38673 14 4.13346 14Z"
                                  stroke="var(--accent)" stroke-width="1.5" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                    </div>

                    <div class="item__holder">
                        <div class="p3 item__title">
                            Электронная почта
                        </div>

                        <div class="item__contacts">
                            <?php foreach ($emails as $item) {
                                $value = $item['value'];
                                ?>
                                <a href="mailto:<?= $value; ?>" class="item__contact email">
                                    <h6><?= $value; ?></h6>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if ($socials) { ?>
                <div class="socials">
                    <?php foreach ($socials as $item) {
                        $value = $item['value'];
                        $icon = wp_get_attachment_image_url($item['icon'], 'full');
                        ?>
                        <a href="<?= $value; ?>" target="_blank" class="social">
                            <img src="<?= $icon; ?>" alt="" class="style-svg">
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php if ($show_map) { ?>
        <div class="map"><?= render_map(); ?></div>
    <?php } ?>
</div>