<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

defined('ABSPATH') || exit;

$block_title = get_field('block_title');
$show_banner = get_field('show_banner');
if ($show_banner) {
    $banner = get_field('banner');
}

$query = new WP_Query(array(
    'numberposts' => -1,
    'post_type' => 'product',
    'posts_per_page'=>2,
));
?>
<div id="products-with-filter-block" class="tax-product_cat block-margin <?= $classes; ?> <?= $align; ?>">
    <div class="woocommerce-products-content">
        <?php
        if (is_active_sidebar('sidebar-shop')) {
            dynamic_sidebar('sidebar-shop');
        }
        ?>

        <div class="archive__holder">
            <?php
            if (woocommerce_product_loop()) {

                /**
                 * Hook: woocommerce_before_shop_loop.
                 *
                 * @hooked woocommerce_output_all_notices - 10
                 * @hooked woocommerce_result_count - 20
                 * @hooked woocommerce_catalog_ordering - 30
                 */
                do_action('woocommerce_before_shop_loop');

                woocommerce_product_loop_start();

                while ($query->have_posts()) {
                    $query->the_post();

                    /**
                     * Hook: woocommerce_shop_loop.
                     */
                    do_action('woocommerce_shop_loop');

                    wc_get_template_part('content', 'product');
                }

                woocommerce_product_loop_end();

                /**
                 * Hook: woocommerce_after_shop_loop.
                 *
                 * @hooked woocommerce_pagination - 10
                 */
                do_action('woocommerce_after_shop_loop');
                the_posts_pagination();
//                pagination();

                wp_reset_postdata();
            } else {
                /**
                 * Hook: woocommerce_no_products_found.
                 *
                 * @hooked wc_no_products_found - 10
                 */
                do_action('woocommerce_no_products_found');
            } ?>
        </div>
    </div>

    <?php

    ?>
</div>