<div class="produktkategorier">
		<h1>Produktkategorier</h1>
		<p class="produkt-text">
				hej
		</p>
        <div class="produktkategorier-content">
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

	</div>