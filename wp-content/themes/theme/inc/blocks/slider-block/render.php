<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$block_title = $args['block_title'] ?? get_field('block_title');
$slides = $args['slides'] ?? get_field('slides');
?>
<?php if ($slides) { ?>
    <div id="slider-block" class="block-margin <?= $classes; ?> <?= $align; ?>">
        <?php if ($block_title) { ?>
            <h2 class="block-title"><?= $block_title; ?></h2>
        <?php } ?>

        <div class="swiper">
            <div class="swiper-wrapper">
                <?php foreach ($slides as $item) {
                    $title = $item['title'];
                    $image = wp_get_attachment_image_url($item['image'], 'full');
                    ?>
                    <div class="swiper-slide">
                        <div class="item" data-modal="callback">
                            <?php if ($image) { ?>
                                <div class="item__image">
                                    <img src="<?= $image; ?>" alt="">
                                </div>
                            <?php } ?>

                            <?php if ($title) { ?>
                                <h5 class="item__title"><?= $title; ?></h5>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="swiper-additionals">
            <div class="swiper-pagination white"></div>

            <div class="swiper-btns">
                <div class="swiper-btn-prev"><?= inline('assets/images/swiper-btn.svg'); ?></div>

                <div class="swiper-btn-next"><?= inline('assets/images/swiper-btn.svg'); ?></div>
            </div>
        </div>
    </div>
<?php } ?>
