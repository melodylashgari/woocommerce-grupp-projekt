<?php 
/* Template Name: Om oss*/
?>

<?php get_header(); ?> 

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

<?php get_footer(); ?> 
