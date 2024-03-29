<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


/**
 * Enqueue Theme Scripts
 *
 */
if ( !function_exists( 'mybooking_enqueue_scripts' ) ) {
  /**
   * Loads the parent theme scripts and enqueues the child one
   *
   * Add scripts to js/custom-scripts if they are few and simple tweaks, or
   * split them on several files if you need to add extra libraries. Then edit
   * the function to match the new ones and enqueue them all.
   *
   */
  function mybooking_enqueue_scripts() {

    // Load Parent JS
    wp_register_script( 'mybooking-scripts', trailingslashit( get_template_directory_uri() ) . 'js/theme.min.js' );
    // Enqueue Child JS
    wp_enqueue_script( 'mybooking-child-scripts', trailingslashit( get_stylesheet_directory_uri() ) . 'js/custom-scripts.js', array( 'mybooking-scripts' ) );
    // Enqueue iframeSizer content window
    wp_enqueue_script( 'iframesizercontentwindow', trailingslashit( get_stylesheet_directory_uri() ) . 'js/iframeSizer.contentWindow.min.js' );
    // Enqueue mybooking widget
    wp_enqueue_script( 'mybooking-widget', trailingslashit( get_stylesheet_directory_uri() ) . 'js/mybooking-widget.js' );

  }
}
add_action( 'wp_enqueue_scripts', 'mybooking_enqueue_scripts', 10 );


/**
 * Enqueue Theme Styles
 *
 */
if ( !function_exists( 'mybooking_enqueue_styles' ) ) {
  /**
   * Loads the parent theme stylesheet and enqueues the child one
   *
   * Add styles to root stylesheet if they are few and simple tweaks, or split
   * them on several files if you need to apply complex customization. Then edit
   * the function to match the new ones and enqueue them all.
   *
   */
  function mybooking_enqueue_styles() {

    // Load Parent CSS
    wp_register_style( 'mybooking-styles', trailingslashit( get_template_directory_uri() ) . 'css/theme.min.css' );
    // Enqueue Child CSS
    wp_enqueue_style( 'mybooking-child-styles', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'mybooking-styles' ) );
  }
}
add_action( 'wp_enqueue_scripts', 'mybooking_enqueue_styles', 10 );


/**
 * Enqueue Editor Styles
 *
 */
if ( !function_exists( 'mybooking_enqueue_block_editor_styles' ) ) {
  /**
   * Loads the parent editor stylesheet and enqueues the child one.
   *
   * Note that the child editor-style.css file is empty by default and you must
   * replicate the styles you could add there in theme stylesheet/s to get
   * the same on rendered blocks on frontend.
   *
   */
  function mybooking_enqueue_block_editor_styles() {

    // Load Parent Editor CSS
    wp_register_style( 'mybooking-editor-styles', trailingslashit( get_template_directory_uri() ) . 'css/editor-style.css' );
    // Enqueue Child Editor CSS
    wp_enqueue_style( 'mybooking-child-editor-styles', trailingslashit( get_stylesheet_directory_uri() ) . 'css/editor-style.css', array( 'mybooking-editor-styles' ) );
  }
}
add_action( 'enqueue_block_editor_assets', 'mybooking_enqueue_block_editor_styles', 10 );


/**
 * Custom palette
 *
 */
if ( ! function_exists( 'mybooking_child_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 */
	function mybooking_child_setup() {

		add_theme_support( 'editor-color-palette', array(
      // Brand
			array(
				'name'  => _x( 'custom_color_name','gutenberg_palette','client_text_domain' ),
				'slug'  => 'color_slug',
				'color'	=> 'color_name',
			),
            
			/* Add more custom colors here */
            
			// Basics - Don't delete this!
			array(
				'name'  => _x( 'White','gutenberg_palette','mybooking' ),
				'slug'  => 'white',
				'color'	=> '#FFFFFF',
			),
			array(
				'name'  => _x( 'Black','gutenberg_palette','mybooking' ),
				'slug'  => 'black',
				'color'	=> '#000000',
			)

		) );

	}
}
add_action( 'after_setup_theme', 'mybooking_child_setup', 30 );


/**
 * Disable the custom color picker
 *
 */
if ( ! function_exists( 'mybooking_disable_custom_colors' ) ) {
  /**
   * Disables color picker on Gutenberg editor.
   *
   * Avoids clients to fall in rainbow-effect in order to mantain visual
   * coherence and sticks them to the custom palette. Note that this function is
   * hooked into the after_setup_theme hook.
   *
   */
  function mybooking_disable_custom_colors() {

    add_theme_support( 'disable-custom-colors' );
  }
}
add_action( 'after_setup_theme', 'mybooking_disable_custom_colors' );


if ( ! function_exists( 'mybooking_custom_polylang_langswitcher' ) ) {
  /**
  * Polylang Shortcode - https://wordpress.org/plugins/polylang/
  * Add this code in your functions.php
  * Put shortcode [polylang_langswitcher] to post/page for display flags
  *
  * @return string
  */
  function mybooking_custom_polylang_langswitcher() {
    $output = '';
    if ( function_exists( 'pll_the_languages' ) ) {
      $args   = [
        'show_flags' => 1,
        'show_names' => 0,
        'echo'       => 0
      ];
      $output = '<div class="mbe_polylang_langswitcher_container"><ul class="mbe_polylang_langswitcher">'.pll_the_languages( $args ). '</ul></div><br class="mbe_polylang_separator">';
    }

    return $output;
  }
}
add_shortcode( 'mybooking_polylang_langswitcher', 'mybooking_custom_polylang_langswitcher' );