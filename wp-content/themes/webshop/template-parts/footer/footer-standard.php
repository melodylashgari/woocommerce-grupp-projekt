<footer class="footer-site">
    <nav class="footer-nav">
        <h3 class="nav3">Navigate</h3>
        <div class="nav-column"> 
        <a href="<?php the_permalink( ); ?>">
            <?php wp_nav_menu(array('footer_menu' => 'Footer-menu',)) ?> 
        </a>
        </div>
    </nav>
    <div class="info">
        <h3 class="info3">Information</h3>
        <a href="<?php echo get_permalink(3) ?> ">Privacy policy</a>
        <a href="<?php echo get_permalink(299) ?> ">Terms and Agreements</a>
        <a href="<?php echo get_permalink(303) ?>">Affiliates</a>
    </div>
    <h1 class="red">         <a href=" <?= get_home_url(); ?> ">
    <?php echo get_bloginfo('name'); ?> </a></h1>
</footer>