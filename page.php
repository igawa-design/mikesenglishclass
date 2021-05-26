<?php /*
Template Name: page
*/ ?>

<?php get_header('page'); ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<h2><?php echo get_the_title(); ?></h2>
<div class="post">
<?php the_content(); ?>
</div><!--post-->

<?php endwhile; ?>

<?php else : ?>
<h2 id="not_found"><em>ページが見つかりません。</em><span lang="en">Not Found</span></h2>
<p><a href="<?php echo home_url(); ?>"><span lang="en">Back To HOME</span> - HOMEへ戻る</a></p>
<?php endif; ?>

<?php get_footer(); ?>
