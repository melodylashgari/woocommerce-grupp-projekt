<?php 
/* Template Name: Om oss*/
?>

<?php get_header(); ?> 

<?php if(is_page(2)): ;?>
	<?php
		$page_title = get_field('sidtitel');
		$image = get_field('bild');
		$size = 'large';
		$om_oss_title = get_field('text_titel');
		$om_oss_text = ('text_under_titel');
	?>
	<div class="om-oss">
		<h1> <?php the_field('sidtitel'); ?></h1>
		
		<div class="about-img">
			<?php if (!empty($image)): ?>
				<img src="<?php echo esc_url($image['url']); ?>" />
			<?php endif; ?>
		</div>
		<div class="about-content">
			<strong> <?php the_field('text_titel') ?> </strong>
			<br>
			<br>
			<?php the_field('text_under_titel') ?>
		</div>
	</div>

	<?php get_template_part('template-parts/blocks/produktkategorier'); ?>

	<?php endif; ?>

<?php get_footer(); ?> 