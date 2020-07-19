<?php
/**
 * 固定ページを表示するウィジェット.
 * IDを指定すると、特定の固定ページをウィジェット内で表示する
 *
 * @package Jin_Child
 */

require_once dirname( __FILE__ ) . '/../include/widget/class-page-content-widget.php';

/**
 * 固定ページを表示するウィジェットのテストクラス
 */
class Y_固定ページを表示するウィジェット extends WP_UnitTestCase {
	/**
	 * ウィジェットオブジェクト
	 *
	 * @var string $widget
	 */
	private $widget;

	/**
	 * Setup.
	 */
	public function setUp() {
			$this->widget = new Page_Content_Widget();
	}
	/**
	 * ウィジェットクラスが作成できる.
	 *
	 * @test
	 */
	public function ウィジェットが生成できる() {
		$this->assertEquals( 'Page_Content_Widget', get_class( $this->widget ) );
	}

	/**
	 * 固定ページのIDが有効であると判定できる.
	 *
	 * @test
	 */
	public function 固定ページのIDが有効であると判定できる() {
		$this->assertEquals( true, $this->widget->is_valid_id( '1' ) );
	}

	/**
	 * 固定ページのIDが全角文字列の時無効であると判定できる.
	 *
	 * @test
	 */
	public function 固定ページのIDが全角文字列の時無効であると判定できる() {
		$this->assertEquals( false, $this->widget->is_valid_id( 'ほげ' ) );
	}

	/**
	 * 固定ページのIDが半角英数の時無効であると判定できる.
	 *
	 * @test
	 */
	public function 固定ページのIDが半角英数の時無効であると判定できる() {
		$this->assertEquals( false, $this->widget->is_valid_id( 'hoge' ) );
	}

	/**
	 * 無効な値をupdate関数に入れた時に無効であると判定できる.
	 *
	 * @test
	 */
	public function 無効な値をupdate関数に入れた時に無効であると判定できる() {
		$this->assertEquals( false, $this->widget->update( array(), array() ) );
	}
}
