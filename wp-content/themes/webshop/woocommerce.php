A
<?php get_header(); ?>

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
                    <div class="recommendation-image">
                        <?php
                        // get the thumbnail id using the queried category term_id
                        $thumbnail_id = get_term_meta(19, 'thumbnail_id', true);

                        // get the image URL
                        $image = wp_get_attachment_url($thumbnail_id);

                        // print the IMG HTML
                        echo "<img src='{$image}' alt='' width='300' height='200' />";
                        ?>
                    </div>
                    <article class="recommendation-info">
                        <?php echo get_the_category_by_ID('19'); ?>
                        <?php echo category_description('19'); ?>
                        <a href="<?= get_category_link(19); ?>"> Visa mer </a>
                    </article>
                </div>

                <div class="recommendation-block">
                    <div class="recommendation-image">
                        <?php
                        // get the thumbnail id using the queried category term_id
                        $thumbnail_id = get_term_meta(30, 'thumbnail_id', true);

                        // get the image URL
                        $image = wp_get_attachment_url($thumbnail_id);

                        // print the IMG HTML
                        echo "<img src='{$image}' alt='' width='300' height='200' />";
                        ?>
                    </div>
                    <article class="recommendation-info">
                        <?php echo get_the_category_by_ID('30'); ?>
                        <?php echo category_description('30'); ?>
                        <a href="<?= get_category_link(30); ?>"> Visa mer </a>
                    </article>
                </div>
            </div>
        </div>
        </div>
    <?php endif; ?>

    <!-- Något vi gillar -->
    <?php get_template_part('/template-parts/like') ?>


<?php
get_footer();
