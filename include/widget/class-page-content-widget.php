<?php
/**
 * 固定ページを表示するウィジェット.
 * IDを指定すると、特定の固定ページをウィジェット内で表示する
 *
 * @package Jin_Child
 */

/**
 * 固定ページを表示するウィジェットクラス
 */
class Page_Content_Widget extends WP_Widget {
	/**
	 * Widgetを登録する
	 */
	public function __construct() {
		parent::__construct(
			'yhei_page_widget',
			'固定ページ表示',
			array( 'description' => '固定ページのIDを指定してコンテンツを表示します' )
		);
	}

	/**
	 * Widget のhtmlを出力する
	 *
	 * @param array $args      'register_sidebar'で設定した「before_title, after_title, before_widget, after_widget」が入る.
	 * @param array $instance  Widgetの設定項目.
	 */
	public function widget( $args, $instance ) {
		$page_id = $instance['page_id'];
		set_query_var( 'post_id', $page_id );
		get_template_part( 'include/widget/template/page', 'content' );
	}

	/**
	 * Widget管理画面を出力する
	 *
	 * @param array $instance 設定項目.
	 * @return string|void
	 */
	public function form( $instance ) {
		$page_id      = $instance['page_id'];
		$page_id_name = $this->get_field_name( 'page_id' );
		$page_id_id   = $this->get_field_id( 'page_id' );
		?>
		<p>
				<label for="<?php echo esc_attr( $page_id_id ); ?>">固定ページID:</label>
				<input class="widefat"
							id="<?php echo esc_attr( $page_id_id ); ?>"
							name="<?php echo esc_attr( $page_id_name ); ?>"
							type="text" value="<?php echo esc_attr( $page_id ); ?>">
		</p>
		<?php
	}

	/**
	 * 新しい設定データが適切なデータかどうかをチェックする。
	 * 必ず$instanceを返す。さもなければ設定データは保存（更新）されない。
	 *
	 * @param array $new_instance  form()から入力された新しい設定データ.
	 * @param array $old_instance  前回の設定データ.
	 * @return array|bool               保存（更新）する設定データ。falseを返すと更新しない.
	 */
	public function update( $new_instance, $old_instance ) {
		return $this->is_valid_id( $new_instance['page_id'] ?? '' ) ? $new_instance : false;
	}

	/**
	 * 入力された固定ページIDが有効なIDかどうか
	 *
	 * @param string $id 固定ページのID.
	 * @return bool
	 */
	public function is_valid_id( $id ) {
		return intval( $id ) ? true : false;
	}
}
