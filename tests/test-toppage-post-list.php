<?php
/**
 * トップのマガジンに指定の該当のカテゴリーの記事一覧を追加する処理のテスト
 *
 * @package JIN_CHILD_YHEI
 * @see https://github.com/yheihei/wp-ramen-jin-base/issues/1
 */

/**
 * Class トップのマガジンにカテゴリー指定で記事一覧を表示するメソッドのテスト
 *
 * @package Jin_Child
 */
class TopMagazinePostListTest extends WP_UnitTestCase {
	/**
	 * 記事一覧を表示したいカテゴリID
	 *
	 * @var int
	 */
	public $postlist_category_id1;
	/**
	 * 記事一覧を表示したいカテゴリID その2
	 *
	 * @var int
	 */
	public $postlist_category_id2;
	/**
	 * 記事一覧を表示したくないカテゴリID
	 *
	 * @var int
	 */
	public $other_category_id;

	/**
	 * テスト前の初期化処理
	 */
	public function setUp() {
		$this->postlist_category_id1 = wp_create_category( '記事一覧を表示したいカテゴリー1' );
		$this->postlist_category_id2 = wp_create_category( '記事一覧を表示したいカテゴリー2' );
		$this->other_category_id     = wp_create_category( 'その他のカテゴリー' );
		update_option(
			JIN_YHEI_TOP_MAGAZINE_CATEGORY_SHOWING_POST_LISTS,
			"{$this->postlist_category_id1},{$this->postlist_category_id2}"
		);
	}

	/**
	 * マガジンリストで記事一覧表示したいカテゴリーIDが判定できる
	 *
	 * @test
	 */
	public function マガジンリストで記事一覧表示したいカテゴリーIDが判定できる() {
		$this->assertEquals( true, is_magazine_post_list_category( $this->postlist_category_id1 ) );
	}

	/**
	 * マガジンリストで記事一覧表示でないカテゴリーIDが判定できる
	 *
	 * @test
	 */
	public function マガジンリストで記事一覧表示でないカテゴリーIDが判定できる() {
		$this->assertEquals( false, is_magazine_post_list_category( $this->other_category_id ) );
	}
}
