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
    return 10;
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
/* texten "under" you may like*/
/*
add_action('woocommerce_after_single_product_summary', 'add_rp_text');
function add_rp_text() {
    echo '<p class="rp_text"> Här är två liknande produkter som du kan gå in och titta på. </p>';
}
*/

/*--custom description och text under -- */
/*
add_filter( 'woocommerce_product_tabs', 'woo_custom_description_tab', 98 );
function woo_custom_description_tab( $tabs ) {

	$tabs['related_products']['callback'] = 'woo_custom_description_tab_content';	// Custom description callback

	return $tabs;
}

function woo_custom_description_tab_content() {
	echo '<h2>Custom Description</h2>';
	echo '<p>Here\'s a custom description</p>';
}
*/


/* + och - fungerar ej */
add_action('woocommerce_after_quantity_input_field', 'ts_quantity_plus_sign');

function ts_quantity_plus_sign()
{
    echo '<button type="button" class="plus" >+</button>';
}

add_action('woocommerce_before_quantity_input_field', 'ts_quantity_minus_sign');
function ts_quantity_minus_sign()
{
    echo '<button type="button" class="minus" >-</button>';
}


/* Ta bort kategori (under) */
remove_action(
    'woocommerce_single_product_summary',
    'woocommerce_template_single_meta',
    40
);

/* lägg till kategori över produktnamn*/
add_action('woocommerce_single_product_summary', 'add_category_before_product_title', 4);
function add_category_before_product_title()
{
    global $post;
    $terms = get_the_terms($post->ID, 'product_cat');
    $title = '';
    foreach ($terms as $term) {
        $title = $term->name . ' ';
    }
    echo "<h5 class='product_title entry-title'>" . $title . "</h5>";
}

/* category överst på sidan - lägg till produktnamn*/
add_action('woocommerce_before_single_product', 'woocommerce_template_single_title', 7);
add_action('woocommerce_before_single_product', 'custom_product_category_title', 6);
function custom_product_category_title()
{
    global $post;
    $terms = get_the_terms($post->ID, 'product_cat');


    $product = '';
    $title = '';
    foreach ($terms as $term) {
        $title = $term->name . ' ';
    }

    echo "<p class='product_title entry-title'>" . $title . " / " . $product . " </p>";
}

/* byta namn på description tag */
add_filter('woocommerce_product_description_tab_title', 'bbloomer_rename_description_product_tab_label');

function bbloomer_rename_description_product_tab_label()
{
    return 'Beskrivning';
}


add_filter('woocommerce_product_tabs', 'my_remove_product_tabs', 98);

function my_remove_product_tabs($tabs)
{
    unset($tabs['additional_information']); // To remove the additional information tab
    return $tabs;
}

remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
/* egen related products */
/*
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
*/
/**
 * Change number of related products output
 */
function woo_related_products_limit()
{
    global $product;

    $args['posts_per_page'] = 6;
    return $args;
}
add_filter('woocommerce_output_related_products_args', 'jk_related_products_args', 20);
function jk_related_products_args($args)
{
    $args['posts_per_page'] = 2; // 2 related products
    $args['row'] = 1; // arranged in row
    return $args;
}


/* ta bort SKU nummer*/
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
        acf_register_block_type(array(

            'name'              => 'Visioner',
            'title'             => __('Visioner'),
            'description'       => __('Block Visioner.'),
            'render_template'   => 'template-parts/blocks/block-vision.php',
            'category'          => 'formatting',
            'icon'              => 'slides', // You can find icons on wordpress page (search: wordpress icon)
            'keywords'          => array('category-recommend '), // So you can search it in the admin page

        ));
        acf_register_block_type(array(
            'name'              => 'Butiker',
            'title'             => __('Butiker'),
            'description'       => __('Block Butiker.'),
            'render_template'   => 'template-parts/blocks/butiker.php',
            'category'          => 'formatting',
            'icon'              => 'slides', // You can find icons on wordpress page (search: wordpress icon)
            'keywords'          => array('butiker'), // So you can search it in the admin page

        ));
        acf_register_block_type(array(
            'name'              => 'Hero',
            'title'             => __('Hero'),
            'description'       => __('Block Front Page Hero.'),
            'render_template'   => 'template-parts/blocks/front-page-hero.php',
            'category'          => 'formatting',
            'icon'              => 'slides', // You can find icons on wordpress page (search: wordpress icon)
            'keywords'          => array('front-page-hero'), // So you can search it in the admin page
        ));
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
    function add_google_fonts()
    {
        wp_enqueue_style(' add_google_fonts ', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700&display=swap', false);
    }
    add_action('wp_enqueue_scripts', 'add_google_fonts');
function mytheme_add_woocommerce_support() {
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');

