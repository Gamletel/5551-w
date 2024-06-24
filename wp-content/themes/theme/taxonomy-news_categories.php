<?php

// the_post();
get_header();

$terms = get_terms([
    'taxonomy'=>'news_categories',
    'hide_empty'=>false,
]);

$archive_link = get_post_type_archive_link('news');


$item = get_queried_object();
$taxonomy = $item->taxonomy;
$term_id = $item->term_id;
$termSlug = $item->slug;

$subCats = get_terms([
    'taxonomy' => $taxonomy,
    'parent' => $term_id,
    'hide_empty' => false,
]);
?>
    <main id="main" class="base-page category-page archive-news">
        <div class="container">
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php if (function_exists('bcn_display')) {
                    bcn_display();
                } ?>
            </div>

            <h1 class="page-title">
                <?= $item->name; ?>
            </h1>

            <?php if (is_array($terms)) {?>
                <div class="terms">
                    <a href="<?= $archive_link; ?>" class="term p2">Все</a>

                    <?php foreach ($terms as $term) {
                        $link = get_term_link($term);
                        $name = $term->name;
                        $slug = $term->slug;
                        ?>
                        <a href="<?= $link; ?>" class="term p2 <?php if($slug == $termSlug){echo'active';} ?>"><?= $name; ?></a>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if ($subCats):
                $posts = null;
                ?>
                <div id="subcats-holder" class="subcats__holder">
                    <?php foreach ($subCats as $subCat) {
                        ?>
                        <a href="" class="cat__item">

                        </a>
                    <?php } ?>
                </div>
            <?php endif ?>

            <?php if ($posts) {
                global $post;
                ?>
                <div class="archive__holder news-holder block-margin">
                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();
                        $title = get_the_title($post);
                        $date = get_field('date', $post);
                        $thumbnail = get_the_post_thumbnail_url($post, 'full');
                        $link = get_permalink($post);
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
                    <?php endwhile; ?>
                </div>

                <?php pagination(); ?>
            <?php } elseif (!$subCats && !$posts) { ?>
                <h2 class="not_founded">
                    Товаров не найдено
                </h2>
            <?php } ?>
        </div>
    </main>
<?php get_footer(); ?>