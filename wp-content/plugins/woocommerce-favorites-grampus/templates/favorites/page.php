<?php
global $wp_query;

get_header();

$products = WCFAVORITES()->get_products();

$totalPrices = 0;
$totalOldPrices = 0;
?>
    <main id="primary" class="favorites-page woocommerce site-main block-margin">
        <div class="container">
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php if (function_exists('bcn_display')) {
                    bcn_display();
                } ?>
            </div>
            <h1 class="page-title">
                <?php the_title(); ?>
            </h1>
            <?php if ($products) { ?>
            <div class="favorites-wrapper">
                <div class="items-wrapper">
                    <?php foreach ($products as $item) {
                        $product = wc_get_product($item);
                        $thumbnail = get_the_post_thumbnail_url($item, 'full');
                        $title = get_the_title($item);

                        $minOrder = 1;
                        if ($product->is_type('simple')) {
//                                $totalPrices = $product->get_price() * $minOrder.'/шт';
                            $totalPrices = $product->get_price_html();
                        }
                        if ($product->is_type('variable')) {
                            $totalPrices = $product->get_price_html();
                        }
//                            if ($product->is_type('simple')) {
//                                if ($product->is_on_sale()) {
//                                    $totalOldPrices += $product->get_regular_price() * $minOrder;
//                                } else {
//                                    $totalOldPrices += $product->get_price() * $minOrder;
//                                }
//                            }

                        ?>
                        <div class="item-product <?php if ($product->is_on_sale()) { ?>on-sale<?php } else { ?>no-sale<?php } ?>">
                            <?php if ($thumbnail) { ?>
                                <img src="<?= $thumbnail; ?>" alt="" class="item__image">
                            <?php } ?>

                            <div class="item__title"><?= $title; ?></div>


                            <div class="item__additionals">
                                <?php if ($totalPrices) { ?>
                                    <?= $totalPrices; ?>
                                <?php } ?>

                                <div class="btns">
                                    <form action="<?= get_permalink(get_the_ID()); ?>" class="cart" method="post"
                                          enctype="multipart/form-data">
                                        <?php if ($product->get_price()) {
                                            do_action('woocommerce_before_add_to_cart_quantity');

                                            // woocommerce_quantity_input(
                                            //     array(
                                            //         'min_value' => $minOrder,
                                            //         'max_value' => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
                                            //         'input_value' => $minOrder,
                                            //     )
                                            // );

                                            do_action('woocommerce_after_add_to_cart_quantity');
                                        }
                                        ?>
                                        <button type="submit" name="add-to-cart"
                                                value="<?php echo esc_attr($product->get_id()); ?>"
                                                class="btn single_add_to_cart_button ajax_add_to_cart_button button alt"
                                                data-modal="fastbuy">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none">
                                                <path d="M3 3H3.26835C3.74213 3 3.97922 3 4.17246 3.08548C4.34283 3.16084 4.48871 3.2823 4.59375 3.43616C4.71289 3.61066 4.75578 3.84366 4.8418 4.30957L7.00004 16L17.4195 16C17.8739 16 18.1016 16 18.2896 15.9198C18.4554 15.8491 18.5989 15.7348 18.7051 15.5891C18.8255 15.424 18.8763 15.2025 18.9785 14.7597L20.5477 7.95972C20.7022 7.29025 20.7796 6.95561 20.6946 6.69263C20.6201 6.46207 20.4639 6.26634 20.256 6.14192C20.0189 6 19.6758 6 18.9887 6H5.5M18 21C17.4477 21 17 20.5523 17 20C17 19.4477 17.4477 19 18 19C18.5523 19 19 19.4477 19 20C19 20.5523 18.5523 21 18 21ZM8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20C9 20.5523 8.55228 21 8 21Z"
                                                      stroke="var(--Card)" stroke-width="2" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </form>

                                    <?php
                                    $in_favorites = WCFAVORITES()->check_item($product->get_id());
                                    $text = get_option('favorites_single_product_text', '');
                                    ?>
                                    <button type="button" data-product_id="<?= $product->get_id() ?>"
                                            class="favorites single_add_to_favorites_button ajax_add_to_favorites button alt <?php if ($in_favorites) {
                                                echo 'added';
                                            } ?>" aria-label="<?= $text ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path d="M12 8.19444C10 3.5 3 4 3 10C3 16.0001 12 21 12 21C12 21 21 16.0001 21 10C21 4 14 3.5 12 8.19444Z"
                                                  fill="var(--accent)" stroke="var(--accent)" stroke-width="1.5"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="info-holder">
                    <div class="info-wrapper">
                        <div class="item-info count">
                            <div class="item-title p2">
                                Товаров <br> в избранном
                            </div>

                            <h6 class="item-value">
                                <?= WCFAVORITES()->count_items(); ?>
                            </h6>
                        </div>

                        <form action="<?= get_permalink(get_the_ID()); ?>">
                            <button type="submit" class="clear-fav p3" name="clear-fav">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"
                                     fill="none">
                                    <g clip-path="url(#clip0_240_32067)">
                                        <path d="M7.89414 0L5 2.89412L2.10588 0L0 2.10588L2.89414 5L0 7.89412L2.10586 9.99998L5 7.10586L7.89414 10L10 7.89412L7.10586 4.99998L10 2.10586L7.89414 0Z"
                                              fill="var(--Main-text)"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_240_32067">
                                            <rect width="10" height="10" fill="var(--Card)"/>
                                        </clipPath>
                                    </defs>
                                </svg>

                                Очистить избранное
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php } else { ?>
            <div class="not-founded">
                Товаров в избранном нет!
            </div>
        <?php } ?>
    </main>

    <script>
        jQuery(function ($) {
            $('body').on('removed_from_favorites', function () {

                location.reload();
            });
        });
    </script>
<?php
get_footer();