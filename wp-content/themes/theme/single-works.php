<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Theme
 */
$title = get_the_title();
$thumbnail = get_the_post_thumbnail_url($post, 'full');
$gallery = get_field('gallery');
$description = get_field('description');
$characteristics = get_field('characteristics');
get_header();
?>

    <main id="primary" class="site-main">
        <div class="container">
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php if (function_exists('bcn_display')) {
                    bcn_display();
                } ?>
            </div>

            <h1 class="page-title"><?= $title; ?></h1>
        </div>

        <?php if (is_array($gallery)) { ?>
            <div class="single-works__gallery block-margin">
                <div class="swiper single-works__swiper alignfull">
                    <div class="swiper-wrapper">
                        <?php if ($thumbnail) { ?>
                            <div class="swiper-slide">
                                <img src="<?= $thumbnail; ?>" data-fancybox='gallery' data-src='<?= $thumbnail; ?>'
                                     alt="">
                            </div>
                        <?php } ?>

                        <?php foreach ($gallery as $item) {
                            $image = wp_get_attachment_image_url($item, 'full');
                            ?>
                            <div class="swiper-slide">
                                <img src="<?= $image; ?>" data-fancybox='gallery' data-src='<?= $image; ?>' alt="">
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="container">
                    <div class="swiper-additionals single-works__swiper-additionals">
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
                </div>
            </div>
        <?php } ?>

        <div class="container">
            <?php if ($description) { ?>
                <div class="single-works__description block-margin">
                    <div class="description__title">
                        <h3>Описание</h3>
                    </div>

                    <div class="description__text p2 text-block"><?= $description; ?></div>
                </div>
            <?php } ?>

            <?php if ($characteristics) {?>
                <div class="single-works__characteristics block-margin">
                    <div class="characteristics__title">
                        <h3>Характеристики</h3>
                    </div>

                    <div class="characteristics__wrapper">
                        <?php foreach ($characteristics as $item) {
                            $name = $item['name'];
                            $value = $item['value'];
                            ?>
                            <div class="characteristic">
                                <?php if ($name) {?>
                                    <div class="characteristic__name p2">
                                        <?= $name; ?>
                                    </div>
                                <?php } ?>
                                
                                <?php if ($value) {?>
                                    <div class="characteristic__value p2">
                                        <?= $value; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>

            <a class="link block-margin" onclick="javascript:history.back(); return false;">
                <?= inline('assets/images/arrow-back.svg'); ?>

                Вернуться назад
            </a>

            <div class="container">
                <div class="content">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </main><!-- #main -->

<?php
get_footer();
