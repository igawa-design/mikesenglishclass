<section id="anchor_Reviews" class="section w100">
<h3 class="sec_h3_translations"><span class="sec_h3_ja">英訳利用者の声</span><span class="sec_h3_en">Translation reviews</span></h3>
<div class="sec_box sec_box_translations">
<div class="sec_box_inner box_articles">

<?php
$args=array(
  'tax_query' => array(
    array(
      'taxonomy' => 'reviews-cat', //タクソノミーを指定
      'field' => 'slug', //ターム名をスラッグで指定する
      'terms' => array( 'translations' ) //表示したいタームをスラッグで指定
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
<p><?php the_content(); ?></p>
<small class="article_cat">
<?php
$terms = get_the_terms($post->ID,'reviews-cat');
foreach( $terms as $term ) {
echo '<a href="'.get_term_link($term->slug, 'reviews-cat').'" class="cat">'.$term->name.'</a>';
}
?>
</small>
</div><!--post-->
</article>

<?php endwhile; endif; ?>

<p class="box_link_cat"><a class="link_cat" href="<?php echo home_url('reviews/reviews/translations'); ?>">See more reviews<span class="arrow"></span></a></p>
</div><!--sec_box_inner box_articles-->
</div><!--sec_box sec_box_translations-->
</section><!--anchor_Reviews section -->
