<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Theme
 */

$title = get_the_title();
$date = get_field('date');
$term = get_the_terms($post, 'news_categories')[0];
$page_image = wp_get_attachment_image_url(get_field('page_image'), 'full');
$description = get_field('description');

if ($page_image) {
    $image = $page_image;
} else {
    $image = get_the_post_thumbnail_url($post, 'full');
}

$gallery = get_field('gallery');

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

            <div class="single-news__main-block block-margin">
                <div class="main-block__text">
                    <?php if ($date || $term) { ?>
                        <div class="main-block__info">
                            <?php if ($date) { ?>
                                <div class="date p3"><?= $date; ?></div>
                            <?php } ?>

                            <?php if ($date && $term) { ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6"
                                     fill="none">
                                    <circle cx="3" cy="3" r="3" fill="var(--accent)"/>
                                </svg>
                            <?php } ?>

                            <?php if ($term) {
                                $link = get_term_link($term);
                                $name = $term->name;
                                ?>
                                <a href="<?= $link; ?>" class="term p3">
                                    <?= $name; ?>
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <?php if ($description) { ?>
                        <div class="p3 text-block"><?= $description; ?></div>
                    <?php } ?>
                </div>

                <?php if ($page_image) { ?>
                    <div class="main-block__image">
                        <div class="image-wrapper">
                            <img src="<?= $page_image; ?>" alt="">
                        </div>
                    </div>
                <?php } ?>
            </div>

            <?php if ($gallery) {?>
                <div class="single-news__gallery block-margin">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($gallery as $item) {
                                $image = wp_get_attachment_image_url($item, 'full');
                                ?>
                                <div class="swiper-slide">
                                    <img src="<?= $image; ?>" data-fancybox='gallery' data-src='<?= $image; ?>' alt="">
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
            <?php } ?>

            <a class="link block-margin" onclick="javascript:history.back(); return false;">
                <?= inline('assets/images/arrow-back.svg'); ?>

                Вернуться назад
            </a>

            <div class="content">
                <?php the_content(); ?>
            </div>
        </div>
    </main><!-- #main -->

<?php
get_footer();
