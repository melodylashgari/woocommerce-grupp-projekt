    <div class="post-block-container">
        <div class="post-block">
            <article class="post-block-info">
                <h3><?php the_title(); ?></h3>
                <p class="block-excerpt"><?php the_excerpt(); ?></p>
                <a class="block-info-button" href="<?php the_permalink(); ?>"> VISA KOLLEKTIONEN </a>
            </article>
        </div>
        <hr>
        <?php wp_reset_postdata(); ?>
        <br>
    </div>