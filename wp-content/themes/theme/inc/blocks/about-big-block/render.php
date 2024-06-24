<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$block_title = get_field('block_title');
$text = get_field('text');
$image = wp_get_attachment_image_url(get_field('image'), 'full');
?>
<?php if ($text) { ?>
    <div id="about-big-block" class="<?= $classes; ?> <?= $align; ?>">
        <?php if ($block_title) { ?>
            <h2 class="block-title"><?= $block_title; ?></h2>
        <?php } ?>

        <div class="block__content">
            <div class="p2 text-block block__text">
                <?= $text; ?>
            </div>


            <?php if ($image) { ?>
                <div class="block__image">
                    <img src="<?= $image; ?>" alt="">
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>