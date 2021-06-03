<?php /*
Template Name: archive-gallery
*/ ?>

<?php get_header('page'); ?>

<main>
	<section id="archive" class="section">
<h2><em>ギャラリー 一覧 </em><span lang="en">photo gallery</span></h2>

<div id="masonry">
<?php
$args = array(
				'post_type' => array('gallery'),
    'paged' => $paged,
    'posts_per_page' => 10
    );
?>

<?php $loop = new WP_Query($args); ?>
<?php if($loop->have_posts()): ?>
<?php while($loop->have_posts()) : $loop->the_post(); ?>

<div class="pic">
<div class="post">
<?php the_content(); ?>
<?php if($dis=get_post_meta($post->ID,"画像1",true)){ ?>
<img src="<?php $Image = wp_get_attachment_image_src(get_post_meta($post->ID, '画像1', true), 'slide-img'); echo $Image[0]; ?>">
<?php }else{ ?>
<?php } ?>
</div><!--post-->
</div><!--pic-->

<?php endwhile; ?>

<?php else : ?>
<h2 id="not_found"><em>新しい写真はありません。</em><span lang="en">Not Found</span></h2>
<p><a href="<?php echo home_url('gallery'); ?>"><span lang="en">Back To gallery</span> - ギャラリー一覧へ戻る - </a></p>
<?php endif; ?>
</div><!--masonry-->

<div id="pagination" class="archive">
<?php if(function_exists('wp_pagenavi')) wp_pagenavi(array('query' => $loop)); ?>
</div><!--pagination archive-->
</section><!--archive section-->

<?php get_sidebar('gallery'); ?>

</main>

<?php get_footer(); ?>
