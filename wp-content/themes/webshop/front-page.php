frontpage
<?php get_header(); ?> 

<?php 
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        // Display post content
    endwhile;
endif; 
?>


<?php
get_footer(); 
?>