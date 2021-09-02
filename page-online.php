<?php /*
Template Name: page
*/ ?>

<?php get_header('page'); ?>

<div id="container">
<section class="section">


<div class="sec_box sec_box_online">
<div class="sec_box_inner">
<h3 class="sec_h3_lead">お知らせ＜2021年8月更新＞</h3>
<p>マイク英会話教室札幌は本気で英語を習得したい方を応援します！</p>
<p>教室に直接通えない場合は、オンライン個人レッスンも行っております。</p>
<figure class="fig">
<figcaption class="figcaption fig_one_to_one">One-to-One Lessons</figcaption>
<picture class="sec_pic">
<source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/common/img/sec_one_to_one_01_1200x1600.jpg">
<source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/common/img/sec_one_to_one_01_1920x2559.jpg">
<img class="sec_img" alt="英会話スクールでの生徒さんとマイク先生の写真。マンツーマンでの英語・英会話コーチングです。" width="1400" height="1867" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/common/img/sec_one_to_one_01_1200x1600.jpg">
</picture>
</figure>
<p class="sec_txt_02">基本の英会話レッスンから、英語コーチング、本格的なアカデミック英語・ビジネス英語・書類作成の英語校正や英語翻訳・グローバルなアーティスト活動のための作詞のお手伝いなど、幅広く手がけてます。</p>
</div><!-- sec_box_inner -->
</div><!-- sec_box -->

<div class="sec_box sec_box_online">
<div class="sec_box_inner">

</div><!-- sec_box_inner -->
</div><!-- sec_box sec_box_contact -->
</section><!-- section -->
</div><!-- container -->
</main>

<?php get_footer(); ?>
