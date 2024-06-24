<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$block_title = $args['block_title'] ?? get_field('block_title');
$show_all = $args['show_all'] ?? get_field('show_all');
if ($show_all) {
    $brands = get_posts(array(
        'numberposts' => -1,
        'post_type' => 'brands'
    ));
} else {
    $brands = $args['brands'] ?? get_field('brands');
}
?>
<?php if ($brands) { ?>
    <div id="brands-block" class="block-margin <?= $classes; ?> <?= $align; ?>">
        <?php if ($block_title) { ?>
            <h2 class="block-title">
                <?= $block_title; ?>
            </h2>
        <?php } ?>

        <div class="swiper">
            <div class="swiper-wrapper">
                <?php foreach ($brands as $item) {
                    $image = get_the_post_thumbnail_url($item, 'full');
                    ?>
                    <div class="swiper-slide">
                        <div class="brand">
                            <img src="<?= $image; ?>" data-fancybox='gallery' data-src='<?= $image; ?>' alt="">
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