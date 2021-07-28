<?php

//Remove head - wp_head不要部分削除 ////////////////////////////////////////////////

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head','rest_output_link_wp_head');
remove_action('wp_head','wp_oembed_add_discovery_links');
remove_action('wp_head','wp_oembed_add_host_js');
add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );

function remove_dns_prefetch( $hints, $relation_type ) {
	if ( 'dns-prefetch' === $relation_type ) {
		return array_diff( wp_dependencies_unique_hosts(), $hints );
	}
	return $hints;
}
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emojis' );

//Remove foot - wp_footer不要部分削除 //////////////////////////////////////////////

function register_javascript() {
	wp_deregister_script('wp-embed');
	wp_deregister_script('comment-reply');
}
add_action('wp_enqueue_scripts', 'register_javascript');

//post_has_archive ブログ投稿のアーカイブページ作成 ////////////////////////////////////

function post_has_archive($args, $post_type)
{
  if ('post' == $post_type) {
    $args['rewrite'] = true; // リライトを有効にする
    $args['has_archive'] = 'mikes-posts'; // 任意のスラッグ名
  }
  return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

//add_theme_support Featured image - アイキャッチ画像有効化 //////////////////////////

add_theme_support('post-thumbnails');

//custom_excerpt_length - 抜粋文字数の指定//////////////////////////////////////////

function custom_excerpt_length($length) {
     return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

//custom_excerpt_more - 文末表記の指定////////////////////////////////////////////

function new_excerpt_more($more) {
	return '[.....]';
}
add_filter('excerpt_more', 'new_excerpt_more');

//register_post_type カスタム投稿タイプの追加 ////////////////////////////////////////

function add_custom_post_type(){
  register_post_type(
  'reviews', // 1.投稿タイプ名
    array(   // 2.オプション
	    'label' => '生徒さんの声', // 投稿タイプの名前
					'description' => '生徒さんの声',
	    'public'        => true, // 利用する場合はtrueにする
	    'has_archive'   => true, // この投稿タイプのアーカイブを有効にする
	    'menu_position' => 5, // この投稿タイプが表示されるメニューの位置
	    'supports' => array( // サポートする機能
        'title',
        'editor',
    )
   )
  );
		register_post_type(
  'gallery', // 1.投稿タイプ名
    array(   // 2.オプション
	    'label' => 'フォトギャラリー', // 投稿タイプの名前
					'description' => 'フォトギャラリー',
	    'public'        => true, // 利用する場合はtrueにする
	    'has_archive'   => true, // この投稿タイプのアーカイブを有効にする
	    'menu_position' => 5, // この投稿タイプが表示されるメニューの位置
	    'supports' => array( // サポートする機能
        'title',
        'editor',
    )
   )
  );
}
add_action('init', 'add_custom_post_type');

//add_custom_taxonomy カスタムタクソノミーの追加 //////////////////////////////////////

function add_custom_taxonomy(){
  register_taxonomy(
    'reviews-cat', // 1.タクソノミーの名前
    'reviews',          // 2.利用する投稿タイプ
    	array(            // 3.オプション
		    'label' => 'カテゴリ', // タクソノミーの表示名
						'singular_label' => '生徒さんの声カテゴリ',
		    'hierarchical' => true, // 階層を持たせるかどうか
		    'public' => true, // 利用する場合はtrueにする
    )
  );
  register_taxonomy(
    'gallery-cat', // 1.タクソノミーの名前
    'gallery',     // 2.利用する投稿タイプ
    	array(       // 3.オプション
      'label' => 'カテゴリ', // タクソノミーの表示名
						'singular_label' => 'フォトギャラリーカテゴリ',
      'hierarchical' => false, // 階層を持たせるかどうか
      'public' => true, // 利用する場合はtrueにする
    )
  );
}
add_action('init', 'add_custom_taxonomy');

//custom_search カスタム投稿タイプ内のみの検索 ////////////////////////////////////////

function custom_search_template($template){
  if ( is_search() ){
    $post_types = get_query_var('post_type');
    foreach ( (array) $post_types as $post_type )
      $templates[] = "search-{$post_type}.php";
      $templates[] = 'search.php';
      $template = get_query_template('search',$templates);
     }
  return $template;
}
add_filter('template_include','custom_search_template');

//wps_highlight_results 検索結果でのキーワードのハイライト ////////////////////////////

function wps_highlight_results($text) {
if(is_search()){
	$sr = get_query_var('s');
	$keys = explode(" ",$sr);
	$text = preg_replace('/('.implode('|', $keys) .')/iu', '<span class="search-highlight">'.$sr.'</span>', $text);
}
	return $text;
}
add_filter('the_title', 'wps_highlight_results');
add_filter('the_content', 'wps_highlight_results');

//hide admin_bar - WP管理画面ログイン時ツールバー非表示 ////////////////////////////////

add_filter( 'show_admin_bar', '__return_false' );

//disable Gutenberg - Gutenberg（ブロックエディタ）無効化 ////////////////////////////

add_filter( 'use_block_editor_for_post', '__return_false' );

//「wp-block-library-css」を削除 / remove wp-block-library-css ////////////////////

add_action('wp_enqueue_scripts', 'remove_block_library_style');
 function remove_block_library_style(){
     wp_dequeue_style('wp-block-library');
     wp_dequeue_style('wp-block-library-theme');
 }

//add_shortcode, include php file - ショートコードでphpファイルを読み込み //////////////

function sc_php($atts = array()) {
 shortcode_atts(array(   // shortcode_atts でショートコードの属性名を指定
   'file' => 'default'   // 属性名とデフォルトの値
 ), $atts);   // 属性を格納する変数
 ob_start();  // バッファリング
 include(STYLESHEETPATH . "/$atts[file].php");  // CSSのあるパス = 子テーマのパスを指定
 return ob_get_clean();  //バッファの内容取得、出力バッファを削除
}

//ショートコード作成（sc というショートコードは、sc_php()という関数を呼び出すという意味）//////

add_shortcode('sc', 'sc_php');
