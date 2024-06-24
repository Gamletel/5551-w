<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';


$block_title = $args['block_title'] ?? get_field('block_title');
$text = $args['text'] ?? get_field('text');
$image = $args['image'] ?? get_field('image');
$image_url = wp_get_attachment_image_url($image, 'full');
?>
<div id="text-block" class="block-margin <?= $classes; ?> <?= $align; ?>">
    <div class="block__content">
        <?php if ($image) { ?>
            <div class="block__image">
                <img src="<?= $image_url; ?>" alt="">
            </div>
        <?php } ?>

        <?php if ($block_title || $text) { ?>
            <div class="block__text">
                <?php if ($block_title) { ?>
                    <h3 class="block__title"><?= $block_title; ?></h3>
                <?php } ?>

                <?php if ($text) { ?>
                    <div class="text-block p2"><?= $text; ?></div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>