<div class="front-page-block">

<?php if( get_field('image') ): ?>
    <img src="<?php the_field('image'); ?>" />
<?php endif; ?>


</div>

<div class="hero-heading">
<h1 class="hero-text"><?= the_field('heading'); ?></h1>
</div>