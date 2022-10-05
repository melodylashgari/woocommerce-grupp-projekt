<?php 
/* Template Name: Nyheter */
?>

<?php
    get_header();
?>
   
    <div class="alla-nyheter">
        <?php
        //the query
        $the_query = new WP_Query(array(
            'category_name' => 'nyheter',
            'posts_per_page' => 6,
        ));
        ?>
        <h2 class="nyheter">Nyheter</h2>
        <p class="news-info">Här visas våra senaste nyheter. Läs och håll dig uppdaterad..</p>
        <div class="news-line">
        <?php if ($the_query->have_posts()) : ?>
          
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            
            <div class="post-news">   
                <?php get_template_part('template-parts/post-news') ?>
            </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata( ); ?>
        <?php endif; ?>
        </div>
    </div>     
        
    <?php
        get_footer();
    ?>
