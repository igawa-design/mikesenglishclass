<?php /*
Template Name: page
*/ ?>

<?php get_header('page'); ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<?php remove_filter('the_content', 'wpautop'); ?>
<?php the_content(); ?>

<?php endwhile; ?>

<?php else : ?>
<h2 id="not_found"><em>ページが見つかりません。</em><span lang="en">Not Found</span></h2>
<p><a href="<?php echo home_url(); ?>"><span lang="en">Back To HOME</span> - HOMEへ戻る</a></p>
<?php endif; ?>

<?php get_footer(); ?>
