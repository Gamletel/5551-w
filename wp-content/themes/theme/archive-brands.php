<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Theme
 */

$post_type_obj = get_post_type_object($post_type);

$title = apply_filters('post_type_archive_title', $post_type_obj->labels->name, $post_type);

$cur_posts = 0;
$max_posts_on_load = 18;

get_header();
?>

    <main id="primary" class="archive archive-brands">
        <div class="container">
            <div class="archive-wrapper">
                <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                    <?php if (function_exists('bcn_display')) {
                        bcn_display();
                    } ?>
                </div>

                <h1 class="page-title">
                    <?= $title; ?>
                </h1>

                <?php if (have_posts()) { ?>

                    <div class="archive__holder brands">
                        <?php
                        /* Start the Loop */
                        while (have_posts() && $cur_posts != $max_posts_on_load) :
                            the_post();
                            $thumbnail = get_the_post_thumbnail_url($post, 'full');
                            ?>

                            <div class="archive__item brand" data-fancybox='gallery' data-src='<?= $thumbnail; ?>'>
                                <img src="<?= $thumbnail; ?>" alt="">
                            </div>

                            <?php
                            $cur_posts++;
                        endwhile; ?>
                    </div>

                    <div id="loadmore" class="btn btn-transparent">Показать еще</div>

                <?php } else {
                    get_template_part('template-parts/content', 'none');
                } ?>
            </div>

            <?php wc_get_template('archive-product.php'); ?>
        </div>

    </main><!-- #main -->

    <script>
        jQuery(document).ready(function ($) {
            $('#loadmore').click(function () {
                $(this).hide();
                $.ajax({
                    type: 'POST',
                    url: '/wp-admin/admin-ajax.php',
                    data: {
                        action: 'load_brands',
                    },
                    success: function (response) {
                        $('.archive-brands .brands').html(response);
                    }
                });
            })
        });
    </script>

<?php
// get_sidebar();
get_footer();
