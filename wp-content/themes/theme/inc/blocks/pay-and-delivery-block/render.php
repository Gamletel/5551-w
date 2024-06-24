<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align   = (isset($block['align']) && !empty($block['align'])) ? 'align'.$block['align'] : '';

$pay = get_field('pay');
$delivery = get_field('delivery');
?>
<div id="pay-and-delivery-block" class="block-margin <?=$classes;?> <?=$align;?>">
    <?php if ($pay) {
        $block_title = $pay['title'];
        $text = $pay['text'];
        $icons = $pay['icons'];
        ?>
        <div class="block__content pay">
            <?php if ($block_title) {?>
                <h3 class="title"><?= $block_title; ?></h3>
            <?php } ?>
            
            <?php if ($text) {?>
                <div class="p2 text-block">
                    <?= $text; ?>
                </div>
            <?php } ?>

            <?php if ($icons) {?>
                <div class="icons">
                    <?php foreach ($icons as $item) {
                        $icon = wp_get_attachment_image_url($item, 'full');
                        ?>
                        <img src="<?= $icon; ?>" alt="" class="icon">
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>

    <?php if ($delivery) {
        $block_title = $delivery['title'];
        $text = $delivery['text'];
        $icons = $delivery['icons'];
        ?>
        <div class="block__content">
            <?php if ($block_title) {?>
                <h3 class="title"><?= $block_title; ?></h3>
            <?php } ?>

            <?php if ($text) {?>
                <div class="p2 text-block">
                    <?= $text; ?>
                </div>
            <?php } ?>

            <?php if ($icons) {?>
                <div class="icons">
                    <?php foreach ($icons as $item) {
                        $icon = wp_get_attachment_image_url($item, 'full');
                        ?>
                        <img src="<?= $icon; ?>" alt="" class="icon">
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>