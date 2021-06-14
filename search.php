<?php /*
Template Name: search-post
*/ ?>

<?php get_header('page'); ?>

<main>
<figure class="fig main_view">
<figcaption class="figcaption">Reviews</figcaption>
<picture>
	<source media="(max-width: 767px)" srcset="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/REVIEWS/reviews_1400x1050.jpg">
	<source media="(min-width: 768px)" srcset="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/REVIEWS/reviews_1920x1440.jpg">
	<img alt="英会話スクールでの生徒さんとの写真。マンツーマンでの英語・英会話のコーチングをしています。" width="1400" height="1050" loading="lazy" src="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/REVIEWS/reviews_1400x1050.jpg">
	</picture>
</figure>

<section class="section w100">
<h2 class="sec_h2">レビュー 一覧</h2>
<p class="sec_txt_lead reviews_lead">Reviews</p>
<h3 class="sec_h3 sec_h3_02"><img class="sec_icon" alt="マイク英会話教室札幌のレビュー" width="50" height="50" loading="lazy" src="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/icon_sec_reviews.svg"></h3>
</section><!-- section w100 -->

<div id="archive" class="section">
<div class="sec_box sec_box_reviews">
<div class="sec_box_inner">

 <?php if (have_posts()): ?>
 <?php
   if (isset($_GET['s']) && empty($_GET['s'])) {
     echo '検索キーワード未入力'; // 検索キーワードが未入力の場合のテキストを指定
   } else {
     echo '“'.$_GET['s'] .'”の検索結果：'.$wp_query->found_posts .'件'; // 検索キーワードと該当件数を表示
   }
 ?>
 <ul>
 <?php while(have_posts()): the_post(); ?>
 <li>
 <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
 </li>
 <?php endwhile; ?>
 </ul>
 <?php else: ?>
 検索されたキーワードにマッチする記事はありませんでした
 <?php endif; ?>

</div><!--sec_box_inner-->
</div><!--sec_box sec_box_reviews-->
</div><!--archive section-->

<?php get_sidebar('reviews'); ?>

</main>

<?php get_footer(); ?>
