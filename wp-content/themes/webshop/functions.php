<?php

add_action('wp_enqueue_scripts', 'anotheremptytheme_enqueue');

function anotheremptytheme_enqueue()
{
    wp_enqueue_style('style', get_stylesheet_uri());
}

// Enables "featured image" + category thumbnails
add_theme_support('post-thumbnails');
add_theme_support('category-thumbnails');



// Creates the availability to add a menu in admin.

if (!function_exists('mytheme_register_nav_menu')) {

    function mytheme_register_nav_menu()

    {
        register_nav_menus(array(

            'primary_menu' => __('Primary Menu', 'Header-menu'),

            'footer_menu'  => __('Footer Menu', 'Footermenu'),

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


// Options page (t.ex. ändra hela sidans heading color)

if (function_exists('acf_add_options_page')) {

    acf_add_options_page();
}

/* texten i single product */
add_filter('gettext', 'change_rp_text', 10, 3);
add_filter('ngettext', 'change_rp_text', 10, 3);

function change_rp_text($translated, $text, $domain)
{
    if ($text === 'Related products' && $domain === 'woocommerce') {
        $translated = esc_html__('You may also like',  $domain);
    }
    return $translated;
}



add_filter( 'woocommerce_product_tabs', 'my_remove_product_tabs', 98 );
 
function my_remove_product_tabs( $tabs ) {
  unset( $tabs['additional_information'] ); // To remove the additional information tab
  return $tabs;
}

remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

add_action('woocommerce_after_single_product_summary', 'related_upsell_products', 15);

function related_upsell_products()
{
    global $product;

    if (isset($product) && is_product()) {
        $upsells = version_compare(WC_VERSION, '3.0', '<') ? $product->get_upsells() : $product->get_upsell_ids();

        if (count($upsells) > 0) {
            woocommerce_upsell_display();
        } else {
            woocommerce_upsell_display();
            woocommerce_output_related_products();
        }
    }
}

/**
 * Change number of related products output
 */ 
function woo_related_products_limit() 
    {
        global $product;
      
        $args['posts_per_page'] = 6;
        return $args;
    }
    add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
    function jk_related_products_args( $args ) 
    {
      $args['posts_per_page'] = 2; // 2 related products
      $args['row'] = 1; // arranged in row
      return $args;
    }


 /*--custom description och text under -- */
 /*
add_filter( 'woocommerce_product_tabs', 'woo_custom_description_tab', 98 );
function woo_custom_description_tab( $tabs ) {

	$tabs['description']['callback'] = 'woo_custom_description_tab_content';	// Custom description callback

	return $tabs;
}

function woo_custom_description_tab_content() {
	echo '<h2>Custom Description</h2>';
	echo '<p>Here\'s a custom description</p>';
}
*/

/* ta bort SKUn ummer*/
add_filter('wc_product_sku_enabled', '__return_false');


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


            <div class="page-title" >
                <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
            </div>


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

/**
 * Proper ob_end_flush() for all levels
 *
 * This replaces the WordPress `wp_ob_end_flush_all()` function
 * with a replacement that doesn't cause PHP notices.
 */
remove_action('shutdown', 'wp_ob_end_flush_all', 1);
add_action('shutdown', function () {
    while (@ob_end_flush());
});

add_filter('woocommerce_show_page_title', 'remove_category_title_from_product_archive');
function remove_category_title_from_product_archive($title)
{
    if (!is_product_category()) {
        $title = false;
    }
    return $title;
}

/* Google font */

function add_google_fonts() {

wp_enqueue_style( ' add_google_fonts ', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700&display=swap', false );}

add_action( 'wp_enqueue_scripts', 'add_google_fonts' );

