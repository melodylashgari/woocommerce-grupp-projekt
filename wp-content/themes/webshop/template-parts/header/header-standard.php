<header class="header-site">
<div> <?php wp_nav_menu(array('theme_location' => 'primary',)) ?> </div>
    <a href=" <?= get_home_url(); ?> ">
        <h2 class="heading"> <?php echo get_bloginfo('name'); ?> </h2>
    </a>
    <a href="<?php echo home_url(); ?>/search" title="Search Page"><?= get_template_part('template-parts/svg/img') ?></a>
</header>