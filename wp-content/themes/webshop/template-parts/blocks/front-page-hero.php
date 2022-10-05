<div class="hero-block">
    <?php
    $image = get_field('hero_image');
    $size = 'large'; // (thumbnail, medium, large, full or custom size)

    if ($image) {
        echo wp_get_attachment_image($image, $size);
    } ?> 
    
    <h1 class="hero-text"><?= the_field('hero_heading'); ?></h1>
</div>
