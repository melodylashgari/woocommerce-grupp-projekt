<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="page-header">
        <header>
            <?php get_template_part('template-parts/header/header-standard') ?>
        </header>

    </div>

    <?php wp_body_open(); ?>

    