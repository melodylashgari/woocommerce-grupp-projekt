<a href="<?php the_permalink( ); ?>">
    
    <div class="news-image">
        <?php $image = get_field('nyhets_bild'); ?>
        <?php if( !empty($image) ): ?>
            <img src="<?php echo $image['url']; ?>" />
        <?php endif; ?>
    </div>

    <div class="news-content">
        <h3><?php the_title(); ?></h3> <br>
    
        <br>
        <div><?php the_excerpt(); ?></div>
        <br>
        <p class="read"> Read more </p>
    </div>

</a>