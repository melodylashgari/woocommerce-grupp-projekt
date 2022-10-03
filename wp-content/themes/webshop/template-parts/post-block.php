    <div class="post-block-container">
        <div class="post-block">
            <div>
                <?php the_post_thumbnail('thumbnail'); ?>
            </div>
            <article class="post-block-info">
                <?php the_title(); ?>
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>"> Visa mer</a>
            </article>
        </div>
        <?php wp_reset_postdata(); ?>
        <br>
    </div>