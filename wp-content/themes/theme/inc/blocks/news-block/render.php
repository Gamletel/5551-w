<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$block_title = get_field('block_title');
$show_all = get_field('show_all');
if ($show_all) {
    $news = get_posts(array(
        'numberposts' => -1,
        'post_type' => 'news'
    ));
} else {
    $news = get_field('news');
}
?>
<div id="news-block" class="block-margin <?= $classes; ?> <?= $align; ?>">
    <?php if ($block_title) {?>
        <h2 class="block-title"><?= $block_title; ?></h2>
    <?php } ?>

    <div class="swiper">
        <div class="swiper-wrapper">
            <?php foreach ($news as $item) {
                $title = get_the_title($item);
                $date = get_field('date', $item);
                $thumbnail = get_the_post_thumbnail_url($item, 'full');
                $link = get_permalink($item);
                ?>
                <div class="swiper-slide">
                    <div class="news-item">
                        <div class="item__text">
                            <?php if ($date) {?>
                                <div class="item__date">
                                    <?= $date; ?>
                                </div>
                            <?php } ?>

                            <h5 class="item__title"><?= $title; ?></h5>

                            <a href="<?= $link; ?>" class="item__link link link-main-text">
                                Подробнее
                                
                                <?= inline('assets/images/arrow.svg'); ?>
                            </a>
                        </div>
                        
                        <?php if ($thumbnail) {?>
                            <img src="<?= $thumbnail; ?>" alt="" class="item__thumbnail">
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="swiper-additionals">
        <div class="swiper-pagination white"></div>
        
        <div class="swiper-btns">
            <div class="swiper-btn-prev">
                <?= inline('assets/images/swiper-btn.svg'); ?>
            </div>
            
            <div class="swiper-btn-next">
                <?= inline('assets/images/swiper-btn.svg'); ?>
            </div>
        </div>
    </div>
</div>