<?php if (is_product()) : ?>

    <div class="rp-container">
        <div class="rp-content">
            <h1 class="like-title">You may also like</h1>
            <br>
            <p class="product-p">Två liknande produkter du kanske är intresserad av.</p>
        </div>
        <div class="rec-block">
        <?php 
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => 2
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
    </div>

    <div class="like">
        <div class="like-content">

        <p>Något vi gillar</p>
        <br>
        <h1><?php echo get_the_category_by_ID('31'); ?></h1>

        <p>
            Ont om ledig plats hemma? <br>
            Vi har små vaser som trots sin storlek gör ett stort intryck på ditt hem!
        </p>
        <a href="<?= get_category_link(31); ?>"> <button class="btn"> Läs mer </button></a>
    </div>


        <div class="like-img">
            <?php
                // get the thumbnail id using the queried category term_id
                $thumbnail_id = get_term_meta(31, 'thumbnail_id', true);

                // get the image URL
                $image = wp_get_attachment_url($thumbnail_id);

                // print the IMG HTML
                echo "<img src='{$image}' alt='' width='100%' height='100%' />";
            ?>
        </div>
    </div>
<?php endif; ?>