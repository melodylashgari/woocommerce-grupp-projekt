<?php get_header(); ?>




<!-- Om oss -->
<?php if(is_page(72)): ;?>
	<?php
		$page_title = get_field('page_title');
		$image = get_field('image');
		$size = 'large';
		$om_oss_title = get_field('om_oss_title');
		$om_oss_text = ('om_oss_text');
	?>
	<div class="om-oss">
		<h1> <?php the_field('page_title'); ?></h1>
		
		<div class="about-img">
			<?php if (!empty($image)): ?>
				<img src="<?php echo esc_url($image['url']); ?>" />
			<?php endif; ?>
		</div>
		<div class="about-content">
			<strong> <?php the_field('om_oss_title') ?> </strong>
			<br>
			<?php the_field('om_oss_text') ?>
		</div>
	</div>
<?php endif; ?>

<!-- kontakta oss -->
<?php if(is_page(118)): ;?>
	<div class="kontakta-oss">
		
		<?php the_content( ); ?>
		
	</div>
<?php endif; ?>

<ul class="products">
	<?php
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => 12
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				wc_get_template_part( 'content', 'product' );
			endwhile;
		} else {
			echo __( 'No products found' );
		}
		wp_reset_postdata();
	?>
</ul>


<?php 
get_footer();
?>