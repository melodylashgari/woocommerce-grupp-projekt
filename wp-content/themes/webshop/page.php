page.php Frontpage
<?php
/*
Template Name: Frontpage
*/
?>

<?php get_header(); ?>

<?= the_content(); ?>

<?= get_template_part('template-parts/header/header-category') ?>

<!-- Visions acf-block  -->

<?= get_template_part('template-parts/blocks/block-vision') ?>

<!-- Collection 1  -->

<!-- Kategorier  -->

<!-- En random produkt 1  -->

<!-- En random produkt 2  -->

<?php
get_footer();