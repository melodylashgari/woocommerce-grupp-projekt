<?php if (is_product()) : ?>

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