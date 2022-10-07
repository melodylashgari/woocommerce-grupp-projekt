<div class="collections-block">
    <div class="category-block">
        <div class="collection-block-header">
            <h2 class="categories-heading"> <?= the_field('categories_heading'); ?></h2>
            <p class="categories-description"> <?= the_field('categories_description'); ?></p>
        </div>
        <section class="categories-block">
            <div class="categories-container">
                <?php if (have_rows('categories')) : ?>
                    <ul class="list-group">
                        <?php while (have_rows('categories')) : the_row();
                            $image = get_sub_field('category_image');
                            $link = get_sub_field('category_link')
                        ?>
                            <li class="list-group-item">
                                <img class="category-image" src="<?php echo $image ?>">
                                <h4 class="category-name"><?php the_sub_field('category_name'); ?></h4>
                                <p class="category-description"><?php the_sub_field('category_description'); ?></p>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </section>
    </div>
</div>
