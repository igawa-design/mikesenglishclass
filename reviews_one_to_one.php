<!--sc file='reviews_one_to_one'-->

<section id="anchor_Reviews" class="section w100">
<h3 class="sec_h3_one_to_one"><em class="em_ja">生徒さんの声</em><em class="em_en">One-to-one lesson reviews</em></h3>
<div class="sec_box sec_box_one_to_one">
<div class="sec_box_inner box_articles">

<div id="masonry">

<?php
$args=array(
  'tax_query' => array(
    array(
      'taxonomy' => 'reviews-cat', //タクソノミーを指定
      'field' => 'slug', //ターム名をスラッグで指定する
      'terms' => array( 'one-to-one' ) //表示したいタームをスラッグで指定
    ),
  ),
  'post_type' => 'reviews', //カスタム投稿名
  'posts_per_page'=> 10 //表示件数（-1で全ての記事を表示）
  );
?>

<?php $loop = new WP_Query($args); ?>
<?php if($loop->have_posts()): ?>
<?php while($loop->have_posts()) : $loop->the_post(); ?>

<article class="article">
<h4 class="article_h4"><?php echo get_the_title(); ?></h4>
<div class="post">
<h5 class="article_cat">
<small class="cat">
<?php
$terms = get_the_terms($post->ID,'reviews-cat');
foreach( $terms as $term ) {
echo '<a href="'.get_term_link($term->slug, 'reviews-cat').'">'.$term->name.'</a>';
}
?>
</small>
</h5>
<p><?php the_content(); ?></p>
</div><!--post-->
</article>

<?php endwhile; endif; ?>

</div><!--masonry-->

<p class="box_link_cat"><a class="link_cat" href="<?php echo home_url('reviews-cat/one-to-one'); ?>">See more reviews<span class="arrow"></span></a></p>
</div><!--sec_box_inner box_articles-->
</div><!--sec_box sec_box_one_to_one-->
</section><!--anchor_Reviews section -->
