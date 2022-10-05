
<div class="recommendation-container">
        <div>
            <h1> Produktkategorier </h1>
            <br>
            <p class="product-p"> 
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque suscipit neque lorem,
                nec congue ligula ornare vel. Sed bibendum dignissim rutrum.
            </p>
        </div>
        <div class="recommendation-block-container">
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
