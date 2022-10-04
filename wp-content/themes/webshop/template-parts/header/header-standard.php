<header class="header-site">
    <div class="header-menu">
        <div> <?php wp_nav_menu(array('theme_location' => 'primary',)) ?> </div>
    </div>
    <div class="header-title">
        <a href=" <?= get_home_url(); ?> ">
            <h2 class="heading"> <?php echo get_bloginfo('name'); ?> </h2>
        </a>
    </div>
    <div class="header-login">
        <a href="" class="header-login-button">Logga in</a>
    </div>
    <div class="header-options">
        <a href="<?php echo home_url(); ?>/varukorg" title="Cart Page"><?= get_template_part('template-parts/svg/cartimg') ?></a>
        <a href="<?php echo home_url(); ?>/search" title="Search Page"><?= get_template_part('template-parts/svg/img') ?></a>
    </div>
</header>