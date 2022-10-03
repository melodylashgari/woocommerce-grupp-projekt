woocommerce.php



<?php get_header(); ?>

<?= get_template_part('template-parts/header/header-category') ?>

<div class="woocommerce-content">
    <?= woocommerce_content(); ?>
</div>

<!-- Om vi är inne på en produkt kategori sida  -->
<?php 
if (is_product_taxonomy()) : 
?>
Test 
Det här är en produktsida
<?php endif; ?> 

<?php
get_footer();
