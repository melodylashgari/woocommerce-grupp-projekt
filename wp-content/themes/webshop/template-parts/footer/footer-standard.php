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
        <a href="">Privacy policy</a>
        <a href="">Terms and Agreements</a>
        <a href="">Affiliates</a>
    </div>
    <h1 class="red"> <?php echo get_bloginfo('name'); ?> </h1>
</footer>