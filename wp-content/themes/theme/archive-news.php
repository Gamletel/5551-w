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

$terms = get_terms([
   'taxonomy'=>'news_categories',
   'hide_empty'=>false,
]);

$archive_link = get_post_type_archive_link('news');
get_header();
?>

	<main id="primary" class="archive archive-news">
		<div class="container">
			<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
				<?php if(function_exists('bcn_display'))
				{
					bcn_display();
				}?>
			</div>

			<h1 class="page-title">
				<?= $title; ?>
			</h1>

            <?php if (is_array($terms)) {?>
                <div class="terms">
                    <a href="<?= $archive_link; ?>" class="term p2 active">Все</a>

                    <?php foreach ($terms as $term) {
                        $link = get_term_link($term);
                        $name = $term->name;
                        ?>
                        <a href="<?= $link; ?>" class="term p2"><?= $name; ?></a>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if ( have_posts() ) { ?>

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
    
			<?php
				
				pagination();
	
            }else {
	
	            get_template_part('template-parts/content', 'none');
	
            }
			?>
		</div>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
