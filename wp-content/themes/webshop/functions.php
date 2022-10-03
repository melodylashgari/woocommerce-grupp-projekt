<?php
add_action('wp_enqueue_scripts', 'anotheremptytheme_enqueue');

function anotheremptytheme_enqueue()
{
    wp_enqueue_style('style', get_stylesheet_uri());
}

// Enables "featured image"
add_theme_support('post-thumbnails');

// Creates the availability to add a menu in admin. 
if (!function_exists('mytheme_register_nav_menu')) {

    function mytheme_register_nav_menu()
    {
        register_nav_menus(array(
            'primary_menu' => __('Primary Menu', 'Header-menu'),
            'footer_menu'  => __('Footer Menu', ''),
        ));
    }
    add_action('after_setup_theme', 'mytheme_register_nav_menu', 0);
}

// Excerpt 
function wpdocs_custom_excerpt_length($length)
{
    return 2;
}
add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 5);

// Enables search function, added in footer
apply_filters('get_search_form', $form, $args);

// Options page (t.ex. ändra hela sidans heading color)
if (function_exists('acf_add_options_page')) {

    acf_add_options_page();
}

// ----- ACF -blocks/ Hero blocks ------
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types()
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'Single Category',
            'title'             => __('Single Category Page'),
            'description'       => __('Block Single Category.'),
            'render_template'   => 'template-parts/blocks/header-single-category.php',
            'category'          => 'formatting',
            'icon'              => 'slides', // You can find icons on wordpress page (search: wordpress icon)
            'keywords'          => array('header-single-category'), // So you can search it in the admin page 
        ));

        acf_register_block_type(array(
            'name'              => 'Category Recommendation',
            'title'             => __('Category Recommendation'),
            'description'       => __('Block Category Recommendation.'),
            'render_template'   => 'template-parts/blocks/category-recommend.php',
            'category'          => 'formatting',
            'icon'              => 'slides', // You can find icons on wordpress page (search: wordpress icon)
            'keywords'          => array('category-recommend '), // So you can search it in the admin page 
        ));
    }
    acf_register_block_type(array(
        'name'              => 'Visioner',
        'title'             => __('Visioner'),
        'description'       => __('Block Visioner.'),
        'render_template'   => 'template-parts/blocks/block-vision.php',
        'category'          => 'formatting',
        'icon'              => 'slides', // You can find icons on wordpress page (search: wordpress icon)
        'keywords'          => array('category-recommend '), // So you can search it in the admin page 
    ));
}

function add_woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'add_woocommerce_support');

function woocommerce_content()
{

    if (is_singular('product')) {

        while (have_posts()) :
            the_post();
            wc_get_template_part('content', 'single-product');
        endwhile;
    } else {
?>

        <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>

            <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

        <?php endif; ?>

        <?php do_action('woocommerce_archive_description'); ?>

        <?php if (woocommerce_product_loop()) : ?>

            <?php do_action('woocommerce_before_shop_loop'); ?>

            <?php woocommerce_product_loop_start(); ?>

            <?php if (wc_get_loop_prop('total')) : ?>
                <?php while (have_posts()) : ?>
                    <?php the_post(); ?>
                    <?php wc_get_template_part('content', 'product'); ?>
                <?php endwhile; ?>
            <?php endif; ?>

            <?php woocommerce_product_loop_end(); ?>

            <?php do_action('woocommerce_after_shop_loop'); ?>

<?php
        else :
            do_action('woocommerce_no_products_found');
        endif;
    }
}
