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

get_header();
?>

	<main id="primary" class="archive">
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

            <?php if ( have_posts() ) { ?>

				<div class="archive__holder works-holder">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
                        $date = get_field('date', $post);
                        $title = get_the_title();
                        $thumbnail = get_the_post_thumbnail_url($post, 'full');
                        $link = get_permalink();
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
