<?php
/**
 * Plugin name: My Snow Monkey Lite
 * Plugin URI: https://github.com/Olein-jp/my-snow-monkey-lite
 * Author: Koji Kuno
 * Author URI: https://olein-design.com
 * Description: Snow Monkey をカスタマイズするためのプラグイン雛形ライト版です。WordPress や Snow Monkey を活用した制作にお困りの方は有償相談を承っております。ぜひご活用ください。
 * Version: 1.0.0
 *
 * @package my-snow-monkey
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Snow Monkey 以外のテーマを利用している場合は有効化してもカスタマイズが反映されないようにする
 */
$theme = wp_get_theme( get_template() );
if ( 'snow-monkey' !== $theme->template && 'snow-monkey/resources' !== $theme->template ) {
	return;
}

/**
 * Directory url of this plugin
 *
 * @var string
 */
define( 'MY_SNOW_MONKEY_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

/**
 * Directory path of this plugin
 *
 * @var string
 */
define( 'MY_SNOW_MONKEY_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

/**
 * Register style
 */
add_action(
	'wp_enqueue_scripts',
	function() {
		wp_enqueue_style(
			'my-snow-monkey-lite-style',
			MY_SNOW_MONKEY_URL . '/assets/css/style.css',
			[ Framework\Helper::get_main_style_handle() ],
			filemtime( MY_SNOW_MONKEY_PATH . '/assets/css/style.css' )
		);

		wp_enqueue_script(
			'my-snow-monkey-lite-scripts',
			MY_SNOW_MONKEY_URL . '/assets/js/scripts.js',
			null,
			filemtime( MY_SNOW_MONKEY_PATH . '/assets/js/scripts.js' ),
			true
		);
	}
);

/**
 * Register Style for Editor
 */
add_action(
	'after_setup_theme',
	function() {
		add_theme_support( 'editor-styles' );

		add_editor_style( MY_SNOW_MONKEY_URL . '/assets/css/editor-style.css' );
	}
);
