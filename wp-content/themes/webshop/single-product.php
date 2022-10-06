Shop page

<?php get_header(); ?>

<?= get_template_part('template-parts/header/header-category') ?>

<div class="woocommerce-content">
    <?= woocommerce_content(); ?>
</div>


<!-- Något vi gillar -->
<?php get_template_part('/template-parts/like') ?>
   
<?php
get_footer();
?>

