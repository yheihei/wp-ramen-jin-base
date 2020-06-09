<?php
/**
 * トップのマガジンの子カテゴリー一覧表示テンプレート
 * 表示するカテゴリーの情報を呼び元から受け取って動作する
 *
 * @package JIN_CHILD_YHEI
 * @see https://github.com/yheihei/wp-ramen-jin-base/issues/5
 */

// カテゴリー情報を取得.
$featured_child_category = get_query_var( 'featured_child_category', null );
if ( ! $featured_child_category ) {
	// カテゴリー情報が渡されなければ表示しない.
	return;
}
?>
<article class="post-list-item">
	<a class="post-list-link" rel="bookmark" href="<?php echo get_category_link( $featured_child_category->term_id ); ?>" itemprop='mainEntityOfPage'>
		<div class="post-list-inner">
			<div class="post-list-thumb" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
				<?php if ( ! is_mobile() ) : ?>
					<?php if ( cps_has_post_thumbnail( $featured_child_category->term_id ) ): ?>
						<?php cps_category_eyecatch_by_term_id($featured_child_category->term_id); ?>
						<meta itemprop="url" content="<?php cps_thumb_info('url'); ?>">
						<meta itemprop="width" content="640">
						<meta itemprop="height" content="360">
					<?php else : ?>
						<img src="<?php echo get_jin_noimage_url(); ?>" width="480" height="270" alt="no image" />
						<meta itemprop="url" content="<?php bloginfo('template_url'); ?>/img/noimg320.png">
						<meta itemprop="width" content="480">
						<meta itemprop="height" content="270">
					<?php endif; ?>
				<?php else : ?>
					<?php if( is_post_list_style() == "magazinestyle-sp1col" ): ?>
						<?php if ( cps_has_post_thumbnail( $featured_child_category->term_id ) ): ?>
							<?php cps_category_eyecatch_by_term_id($featured_child_category->term_id); ?>
							<meta itemprop="url" content="<?php cps_thumb_info('url'); ?>">
							<meta itemprop="width" content="640">
							<meta itemprop="height" content="360">
						<?php else: ?>
							<img src="<?php echo get_jin_noimage_url(); ?>" width="480" height="270" alt="no image" />
							<meta itemprop="url" content="<?php bloginfo('template_url'); ?>/img/noimg320.png">
							<meta itemprop="width" content="480">
							<meta itemprop="height" content="270">
						<?php endif; ?>
					<?php else : ?>
						<?php if ( cps_has_post_thumbnail( $featured_child_category->term_id ) ): ?>
							<?php cps_category_eyecatch_by_term_id($featured_child_category->term_id); ?>
							<meta itemprop="url" content="<?php cps_thumb_info('url'); ?>">
							<meta itemprop="width" content="320">
							<meta itemprop="height" content="180">
						<?php else : ?>
							<img src="<?php echo get_jin_noimage_url(); ?>" width="480" height="270" alt="no image" />
							<meta itemprop="url" content="<?php bloginfo('template_url'); ?>/img/noimg320.png">
							<meta itemprop="width" content="320">
							<meta itemprop="height" content="180">
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
			</div>
			<div class="post-list-meta vcard">
				<h2 class="post-list-title entry-title" itemprop="headline"><?php echo $featured_child_category->name; ?></h2>
			</div>
		</div>
	</a>
</article>
