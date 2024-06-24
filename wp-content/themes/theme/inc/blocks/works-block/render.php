<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$block_title = get_field('block_title');
$show_archive_link = get_field('show_archive_link');
$type = get_field('type');
$show_all = get_field('show_all');
if ($show_all) {
    $works = get_posts(array(
        'numberposts' => -1,
        'post_type' => 'works',
        'order' => 'ASC',
        'orderby' => 'date',
    ));
} else {
    $works = get_field('works');
}
?>
<div id="works-block" class="block-margin <?= $classes; ?> <?= $align; ?>">
    
    <div class="block-title-wrapper">
        <?php if ($block_title) { ?>
            <h2 class="block-title"><?= $block_title; ?></h2>
        <?php } ?>
        
        <?php if ($show_archive_link) {
            $archive_link = get_post_type_archive_link('works');
            ?>
            <a href="<?= $archive_link; ?>" class="link link-main-text">
                Все работы
                
                <?= inline('assets/images/arrow.svg'); ?>
            </a>
        <?php } ?>
    </div>
    

    <?php switch ($type) {
        case "swiper":
            ?>
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($works as $work) {
                        $date = get_field('date', $work);
                        $title = get_the_title($work);
                        $thumbnail = get_the_post_thumbnail_url($work, 'full');
                        $link = get_permalink($work);
                        ?>
                        <div class="swiper-slide">
                            <div class="work">
                                <div class="work__text">
                                    <?php if ($date) { ?>
                                        <div class="work__date"><?= $date; ?></div>
                                    <?php } ?>

                                    <h5 class="work__title"><?= $title; ?></h5>

                                    <a href="<?= $link; ?>" class="link link-main-text">
                                        Подробнее

                                        <?= inline('assets/images/arrow.svg'); ?>
                                    </a>
                                </div>

                                <?php if ($thumbnail) { ?>
                                    <img src="<?= $thumbnail; ?>" alt="" class="work__thumbnail">
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="swiper-additionals">
                <div class="swiper-pagination"></div>

                <div class="swiper-btns">
                    <div class="swiper-btn-prev">
                        <?= inline('assets/images/swiper-btn.svg'); ?>
                    </div>

                    <div class="swiper-btn-next">
                        <?= inline('assets/images/swiper-btn.svg'); ?>
                    </div>
                </div>
            </div>
            <?php break;
        case "default": ?>
        <div class="works-holder">
            <?php foreach ($works as $work) {
                $date = get_field('date', $work);
                $title = get_the_title($work);
                $thumbnail = get_the_post_thumbnail_url($work, 'full');
                $link = get_permalink($work);
                ?>
                <div class="swiper-slide">
                    <div class="work">
                        <div class="work__text">
                            <?php if ($date) {?>
                                <div class="work__date"><?= $date; ?></div>
                            <?php } ?>

                            <h5 class="work__title"><?= $title; ?></h5>

                            <a href="<?= $link; ?>" class="link link-main-text">
                                Подробнее

                                <?= inline('assets/images/arrow.svg'); ?>
                            </a>
                        </div>

                        <?php if ($thumbnail) {?>
                            <img src="<?= $thumbnail; ?>" alt="" class="work__thumbnail">
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
            <?php break;
    } ?>
</div>