<?php /*
Template Name: archive-reviews
*/ ?>

<?php get_header('page'); ?>

<main>
<section id="archive" class="section">
<div class="sec_box sec_box_reviews">
<div class="sec_box_inner">
<h2><em>レビュー一覧 </em><span lang="en">Reviews</span></h2>

<?php
$args = array(
				'post_type' => array('reviews'),
    'paged' => $paged,
    'posts_per_page' => 10
    );
?>

<?php $loop = new WP_Query($args); ?>
<?php if($loop->have_posts()): ?>
<?php while($loop->have_posts()) : $loop->the_post(); ?>

<article>
<h3><?php echo get_the_title(); ?></h3>
<div class="post">
<?php the_content(); ?>
<p class="category">
<?php
$terms = get_the_terms($post->ID,'reviews-cat');
foreach( $terms as $term ) {
echo '<a href="'.get_term_link($term->slug, 'reviews-cat').'">'.$term->name.'</a>';
}
?>
</p>
</div><!--post-->
</article>

<?php endwhile; ?>

<?php else : ?>

</div><!--sec_box_inner-->
</div><!--sec_box sec_box_reviews-->

<h2 id="not_found"><em>新しいレビューはありません。</em><span lang="en">Not Found</span></h2>
<p><a href="<?php echo home_url('reviews'); ?>"><span lang="en">Back To Reviews</span> - レビュー一覧へ戻る - </a></p>
<?php endif; ?>

<div id="pagination" class="archive">
<?php if(function_exists('wp_pagenavi')) wp_pagenavi(array('query' => $loop)); ?>
</div><!--pagination archive-->
</section><!--archive section-->

<?php get_sidebar('reviews'); ?>

</main>

<?php get_footer(); ?>
