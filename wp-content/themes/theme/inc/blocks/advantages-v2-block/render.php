<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$image_1 = $args['image_1'] ?? get_field('image_1');
$image_1_url = wp_get_attachment_image_url($image_1, 'full');
$image_2 = $args['image_2'] ?? get_field('image_2');
$image_2_url = wp_get_attachment_image_url($image_2, 'full');
$advantages = $args['advantages'] ?? get_field('advantages');
?>
<?php if ($advantages) { ?>
    <div id="advantages-v2-block" class="<?= $classes; ?> <?= $align; ?>">
        <div class="block__content">
            <?php if ($image_1) { ?>
                <img src="<?= $image_1_url; ?>" alt="" class="image-1">
            <?php } ?>

            <div class="advantages">
                <?php foreach ($advantages as $advantage) {
                    $text = $advantage['text'];
                    ?>
                    <div class="advantage p2">
                        <?= $text; ?>
                    </div>
                <?php } ?>
            </div>
        </div>

        <?php if ($image_2) { ?>
            <img src="<?= $image_2_url; ?>" alt="" class="image-2">
        <?php } ?>
    </div>
<?php } ?>