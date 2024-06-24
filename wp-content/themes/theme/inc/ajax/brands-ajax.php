<?php
$item = $args['item'];
$thumbnail = get_the_post_thumbnail_url($item, 'full');
?>
<div class="archive__item brand" data-fancybox='gallery' data-src='<?= $thumbnail; ?>'>
    <img src="<?= $thumbnail; ?>" alt="">
</div>
