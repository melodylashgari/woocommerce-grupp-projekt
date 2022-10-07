<!-- hero-block -->
<div class="header-single-page" style="background-color: <?= get_field('color'); ?>;">
    <div>
        <?php
        $image = get_field('image');
        $size = 'full'; // (thumbnail, medium, large, full or custom size)
        if ($image) {
            echo wp_get_attachment_image($image, $size);
        } ?> </div>
    <div class="header-info">
        <h1 class="header-text"><?= the_field('heading'); ?></h1>
        
        <div class="header-subtext"><?= the_field('subheading'); ?></div>
    </div>
</div>