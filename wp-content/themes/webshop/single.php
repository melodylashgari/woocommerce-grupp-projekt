Shop page

<?php
get_header();
?>

<div class="single-news">
    <h4><?php the_time(get_option('date_format')); ?></h4> 
    <br>
    <h1><?php the_title(); ?></h1>
    <br>
    <div class="single-img">   
    <?php $image = get_field('nyhets_bild'); ?>
    <?php if( !empty($image) ): ?>
        <img src="<?php echo $image['url']; ?>" />
    <?php endif; ?>
    </div>     
    <div class="single-page-content">
        <?php the_content( ); ?>
    </div>
    <br>
    <a href="/index.php/nyheter">< Tillbaka till nyheter</a>

</div>
<?php get_footer(); ?>