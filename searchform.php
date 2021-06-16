<form method="get" id="searchform" action="<?php echo home_url('/'); ?>">
<input type="hidden" value="<?php echo get_post_type(); ?>" name="post_type" id="post_type">
<input type="text" placeholder="何かお探しですか？" name="s" id="s">
<input type="submit" id="searchsubmit" value="検索する">
</form>
