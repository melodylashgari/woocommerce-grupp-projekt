woocommerce.php



<?php get_header(); ?>

<?= get_template_part('template-parts/header/header-category') ?>

<div class="woocommerce-content">
    <?= woocommerce_content(); ?>
</div>

<!-- Om vi är inne på en produkt kategori sida visas rekommendationer-->
<?php if (is_product_taxonomy()) : ?>


    <div class="recommendation-container">
        <div>
            <h1> Två andra kategorier </h1>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque suscipit neque lorem,
                nec congue ligula ornare vel. Sed bibendum dignissim rutrum.
            </p>
        </div>
        
        <div class="recommendation-block-container">
        <div class="recommendation-block">
            <div>
                <?= the_post_thumbnail('thumbnail'); ?>
            </div>
            <article class="recommendation-info">
                <?= the_title(); ?>
                <?= the_excerpt(); ?>
                <a href="<?= the_permalink(); ?>"> Visa mer </a>
            </article>
        </div>
        
        
        <div class="recommendation-block">
            <div>
                <?= the_post_thumbnail('thumbnail'); ?>
            </div>
            <article class="recommendation-info">
                <?= the_title(); ?>
                <?= the_excerpt(); ?>
                <a href="<?= the_permalink(); ?>"> Visa mer </a>
            </article>
        </div>
            </div>
            </div>
    </div>

<?php endif; ?>

<?php
get_footer();
