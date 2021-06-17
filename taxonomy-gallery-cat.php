<?php /*
Template Name: taxonomy-gallery-cat
*/ ?>

<?php get_header('page'); ?>

<main>
<figure class="fig main_view">
<figcaption class="figcaption">Gallery</figcaption>
<picture>
	<source media="(max-width: 767px)" srcset="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/GALLERY/gallery_1400x1050.jpg">
	<source media="(min-width: 768px)" srcset="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/GALLERY/gallery_1920x1440.jpg">
	<img alt="英会話スクールでの生徒さんとの写真。マンツーマンでの英語・英会話のコーチングをしています。" width="1400" height="1050" loading="lazy" src="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/GALLERY/gallery_1400x1050.jpg">
	</picture>
</figure>

<section class="section w100">
<h2 class="sec_h2">ギャラリー 一覧</h2>
<p class="sec_txt_lead gallery_lead">Photo Gallery</p>
<h3 class="sec_h3 sec_h3_02"><img class="sec_icon" alt="マイク英会話教室札幌のギャラリー一覧" width="50" height="50" loading="lazy" src="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/icon_sec_gallery.svg"></h3>
</section><!-- section w100 -->

<div class="archive section">
<div class="sec_box sec_box_garelly">
<div class="sec_box_inner">























</div><!--sec_box_inner-->
</div><!--sec_box sec_box_garelly-->

<div class="sec_box sec_box_garelly">
<div class="sec_box_inner">
<h2 id="not_found"><em>新しい写真はありません。</em><span lang="en">Not Found</span></h2>
<p><a href="<?php echo home_url('gallery'); ?>"><span lang="en">Back To Photo Gallery</span> - ギャラリー 一覧へ戻る - </a></p>
<?php endif; ?>
</div><!--masonry-->

<?php if(function_exists('wp_pagenavi')) wp_pagenavi(array('query' => $loop)); ?>

</div><!--sec_box_inner-->
</div><!--sec_box sec_box_garelly-->
</section><!--archive section-->

<?php get_sidebar('gallery'); ?>

</main>

<?php get_footer(); ?>
