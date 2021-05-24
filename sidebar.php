<div id="sidebar">

<section id="CATEGORIES" class="SECTION">
<h2>Categories</h2>
<ul>
<?php wp_list_categories('title_li='); ?>
</ul>
</section><!--CATEGORIES SECTION-->

<section id="TAGS" class="SECTION">
<h2>Tags</h2>
<p><?php wp_tag_cloud('smallest=6 & largest=14'); ?></p>
</section><!--TAGS SECTION-->

<section id="SEARCH" class="SECTION">
<?php get_search_form(); ?>
</section><!--SEARCH SECTION-->

<section id="ARCHIVES" class="SECTION">
<h2>Archives</h2>
<ul>
<?php wp_get_archives('type=monthly&post_type=post'); ?>
</ul>
</section><!--ARCHIVES SECTION-->

</div><!--sidebar-->