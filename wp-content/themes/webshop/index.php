index.php
<!DOCTYPE html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>" type="text/css" />
    <?php wp_head(); ?>
</head>

<body>
    <?= get_header(); 
    if (have_posts()) : ?>

    <header>
        <h1 class="header-sök"> SÖK </h1>
        <?= get_search_form(); ?>
    </header>

    <div class="post-block-container">
        <?php while (have_posts()) :  the_post(); ?>

            <?php get_template_part('template-parts/post-block'); ?>

        <?php endwhile; ?>
    </div>
<?php
endif; ?>
    <?php wp_footer(); ?>
</body>

</html>