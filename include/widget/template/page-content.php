<?php
/**
 * 固定ページを表示するテンプレート
 * 呼び先から、ページIDを指定されて動作する
 *
 * @package Jin_Child
 */

$content_post_id = get_query_var( 'post_id', 0 );
$content_post    = get_post( $content_post_id );
?>
<article class="cps-post">
	<div class="cps-post-main-box">
		<div class="cps-post-main <?php if( ! get_theme_mod('h2_style_icon') == ""){ echo get_theme_mod('h2_style_icon'); } ?> <?php if( ! get_theme_mod('h3_style_icon') == ""){ echo get_theme_mod('h3_style_icon'); } ?> <?php if( ! get_theme_mod('h4_style_icon') == ""){ echo get_theme_mod('h4_style_icon'); } ?> <?php if( ! get_option('hl_custom_check')){is_h2_style();echo " "; is_h3_style();echo " "; is_h4_style(); }else{echo "hl-custom";} ?> entry-content <?php echo esc_html(get_option('font_size'));?> <?php echo esc_html(get_option('font_size_sp'));?>" itemprop="articleBody">
			<?php echo $content_post->post_content ?? '' ?>
		</div>
	</div>
</article>
