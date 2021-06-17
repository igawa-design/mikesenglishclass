<?php /*
Template Name: single-reviews
*/ ?>

<?php get_header('page'); ?>

<main>

<?php if(have_posts()): while(have_posts()):the_post(); ?>
<p><?php the_content(); ?></p>
<?php endwhile; endif; ?>

シングルレビュー
<?php get_sidebar('reviews'); ?>

</main>

<?php get_footer(); ?>
