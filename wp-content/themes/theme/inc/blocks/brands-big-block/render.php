<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$block_title = get_field('block_title');
$cur_posts = 0;
$max_posts_on_load = 18;
$brands = get_posts(array(
    'numberposts' => -1,
    'post_type' => 'brands',
));
?>
<div id="brands-big-block" class="archive-brands block-margin <?= $classes; ?> <?= $align; ?>">

    <?php if ($block_title) { ?>
        <h2 class="block-title">
            <?= $block_title; ?>
        </h2>
    <?php } ?>

    <div class="archive__holder brands">
        <?php
        /* Start the Loop */
        foreach ($brands as $brand) {
            $thumbnail = get_the_post_thumbnail_url($brand, 'full');
            ?>
            <?php if ($cur_posts != $max_posts_on_load) { ?>
                <div class="archive__item brand" data-fancybox='gallery' data-src='<?= $thumbnail; ?>'>
                    <img src="<?= $thumbnail; ?>" alt="">
                </div>
            <?php $cur_posts++; }
        } ?>
    </div>

    <div id="loadmore" class="btn btn-transparent">Показать еще</div>

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
</div>