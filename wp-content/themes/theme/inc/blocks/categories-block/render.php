<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$product_categories = $args['terms'] ?? get_field('items');
?>

<?php if (is_array($product_categories) && $product_categories) {?>
<div id="categories-block" class="block-categories post-type-archive-product block-margin <?= $classes; ?> <?= $align; ?>">
    <?php
    wc_get_template('loop/loop-start.php');

    foreach ($product_categories as $category) {
        wc_get_template(
            'content-product_cat.php',
            array(
                'category' => $category,
            )
        );
    }

    wc_get_template('loop/loop-end.php');
    ?>
</div>
<?php } ?>