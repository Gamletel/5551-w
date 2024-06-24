<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$slides = get_field('slides');
$block_bg = wp_get_attachment_image_url(get_field('block_bg'), 'full');
$image_1 = wp_get_attachment_image_url(get_field('image_1'), 'full');
$image_2 = wp_get_attachment_image_url(get_field('image_2'), 'full');
?>
<?php if ($slides) { ?>
    <div id="mainbanner-block" class="<?= $classes; ?> <?= $align; ?>">
        <div class="block__text">
            <?php if ($block_bg) { ?>
                <img src="<?= $block_bg; ?>" alt="" class="block__bg">
            <?php } ?>

            <?php if ($image_1) { ?>
                <img src="<?= $image_1; ?>" alt="" class="image-1">
            <?php } ?>

            <?php if ($image_2) { ?>
                <img src="<?= $image_2; ?>" alt="" class="image-2">
            <?php } ?>

            <div class="swiper swiper-text">
                <div class="swiper-wrapper">
                    <?php
                    $titlePlaced = false;
                    foreach ($slides as $slide) {
                        $top_text = $slide['top_text'];
                        $title = $slide['title'];
                        $subtitle = $slide['subtitle'];
                        $btn = $slide['btn'];
                        ?>
                        <div class="swiper-slide">
                            <div class="slide__text">
                                <?php if ($top_text) { ?>
                                    <div class="top-text p2">
                                        <?= $top_text; ?>
                                    </div>
                                <?php } ?>

                                <?php if ($title) {
                                    if (!$titlePlaced) { ?>
                                        <h1 class="title">
                                            <?= $title; ?>
                                        </h1>
                                        <?php
                                        $titlePlaced = true;
                                    } else { ?>
                                        <h2 class="title">
                                            <?= $title; ?>
                                        </h2>
                                    <?php } ?>
                                <?php } ?>

                                <?php if ($subtitle) { ?>
                                    <div class="subtitle p2">
                                        <?= $subtitle; ?>
                                    </div>
                                <?php } ?>

                                <?php if ($btn) {
                                    $type = $btn['type'];
                                    $text = $btn['text'];

                                    switch ($type) {
                                        case 'none':
                                            break;
                                        case 'modal': ?>
                                            <div class="btn" data-modal="callback"><?= $text; ?></div>
                                            <?php break;
                                        case 'link':
                                            $link = $btn['link'];
                                            ?>
                                            <a href="<?= $link; ?>" class="btn"><?= $text; ?></a>
                                            <?php break;
                                    }
                                } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="swiper-btns">
                    <div class="swiper-btn-prev"><?= inline('assets/images/swiper-btn.svg'); ?></div>

                    <div class="swiper-btn-next"><?= inline('assets/images/swiper-btn.svg'); ?></div>
                </div>
            </div>
        </div>

        <div class="swiper swiper-images">
            <div class="swiper-wrapper">
                <?php foreach ($slides as $item) {
                    $image = wp_get_attachment_image_url($item['image'], 'full');
                    ?>
                    <div class="swiper-slide">
                        <img src="<?= $image; ?>" alt="">
                    </div>
                <?php } ?>
            </div>

            <div class="swiper-btns">
                <div class="swiper-btn-prev"><?= inline('assets/images/swiper-btn.svg'); ?></div>

                <div class="swiper-btn-next"><?= inline('assets/images/swiper-btn.svg'); ?></div>
            </div>
        </div>
    </div>
<?php } ?>