<?php /*
Template Name: single-gallery
*/ ?>

<?php get_header('page'); ?>

<main>

<?php if(have_posts()): while(have_posts()):the_post(); ?>
<p><?php the_content(); ?></p>
<?php endwhile; endif; ?>

シングルギャラリー

<?php get_sidebar('gallery'); ?>

</main>

<?php get_footer(); ?>
