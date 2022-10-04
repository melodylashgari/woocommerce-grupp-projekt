<?php 
/* Template Name: Kontakta oss*/
?>
<?php
get_header();
?>

<?php if(is_page(181)): ;?>
	<div class="kontakta-oss">
		
		<?php the_content( ); ?>
		
	</div>
	<?php get_template_part('template-parts/blocks/produktkategorier'); ?>

<?php endif; ?>

<?php
get_footer();
?>