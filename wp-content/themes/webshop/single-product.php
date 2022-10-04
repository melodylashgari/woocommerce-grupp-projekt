Shop page

<?php
get_header();
?>
<div class="single-product">


	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
        <?php 
        
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'single-post-thumbnail' );?>
                          <div class="single-product-content">
                          
            <img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
			<?php wc_get_template_part( 'content', 'single-product' ); ?>
            </div>
	<?php endwhile; // end of the loop. ?>

	

    </div>
    <div class="single-product">

   
<!--katergorinamn-->

<!-- produktnamn-->
<h1><?php the_title(); ?></h1>

<!-- pris -->

<!-- image -->
<div class="single-product-img">   
<?php $image = get_field('product-image'); ?>
<?php if( !empty($image) ): ?>
    <img src="<?php echo $image['url']; ?>" />
<?php endif; ?>
</div>     

<div class="single-page-content">
    <?php the_content( ); ?>
</div>

<!-- variation -->

<!-- + - -->

<!--add to cart button -->


<!-- beskrivning -->

</div> 
<?php
get_footer();
?>