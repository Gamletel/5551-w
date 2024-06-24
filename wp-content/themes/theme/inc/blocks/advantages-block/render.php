<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align   = (isset($block['align']) && !empty($block['align'])) ? 'align'.$block['align'] : '';

$hasBG = $args['hasBG'] ?? get_field('hasBG');
$advantages = $args['advantages'] ?? get_field('advantages');
?>
<?php if ($advantages) {?>
    <div id="advantages-block" class="<?php if($hasBG){ echo 'hasBG'; } ?> <?=$classes;?> <?=$align;?>">
        <div class="container">
            <div class="advantages">
                <?php foreach ($advantages as $advantage) { 
                    $icon = wp_get_attachment_image_url($advantage['icon'], 'full');
                    $title = $advantage['title'];
                    ?>
                    <div class="advantage">
                        <?php if ($icon) {?>
                            <div class="advantage__icon">
                                <img src="<?= $icon; ?>" alt="" class="style-svg">
                            </div>
                        <?php } ?>
                        
                        <?php if ($title) {?>
                            <h6 class="advantage__title">
                                <?= $title; ?>
                            </h6>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>