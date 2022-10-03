<!-- hero-block -->
<div style="background-color: <?= get_field('color'); ?>;">
    <div><?php
            $image = get_field('category-image');
            $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
            if ($image) {
                echo wp_get_attachment_image($image, $size);
            } ?> </div>
    <div>
        <h1>
            
        </h1>
        <div><?= the_field('category-description'); ?></div>
        <?php
        $link = get_field('category-link');
        if ($link) : ?>
            <a class="button" href="<?php echo esc_url($link); ?>">View Collection</a>
        <?php endif; ?>
    </div>
</div>