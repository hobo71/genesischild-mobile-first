<?php
/**
 * Load and order all scripts and styles in the head.
 *
 * @package genesischild
 */

// Remove the default Genesis main stylesheet to we can load it later.
remove_action( 'genesis_meta', 'genesis_load_stylesheet' );// Remove order of main style sheet.
// Load Genesis main style sheet later so we beat out all the other guys.
add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', 998 ); // Load main style sheet 2nd last.

add_action( 'wp_enqueue_scripts', 'gc_scripts_styles', 997 ); // All the rest load before.
/**
 * Script-tac-ulous -> All the Scripts and Styles Enqueued, scripts first - then styles.
 */
function gc_scripts_styles() {
	wp_enqueue_script( 'placeholder' , get_stylesheet_directory_uri() . '/js/placeholder.js', array( 'jquery' ), '1', true );
	// wp_enqueue_style( 'googlefonts' , '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,300,800', array(), '2', 'all' );
	wp_enqueue_style( 'fontawesome' , '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css', array() , '4.6.3', 'all' );
	wp_enqueue_style( 'dashicons' ); //Uncomment if DashIcons required in front end
}

//add_action( 'wp_enqueue_scripts', 'gc_ie_styles', 999 );	//IE conditional styles load last
/**
 * IE Conditional Styles - gotta load very last.
 */
function gc_ie_styles() {
	wp_register_style( 'ieall', get_stylesheet_directory_uri() . '/css/ieall.css' );//target IE9 and lower
	$GLOBALS['wp_styles']->add_data( 'ieall', 'conditional', 'IE' );

	wp_enqueue_style( 'ieall' );
}

//add_action( 'wp_enqueue_scripts', 'gc_backstretch_background_scripts' );
/**
 * Backstretch for Custom Background Image
 */
 function gc_backstretch_background_scripts() {
	//* Load scripts only if custom background is being used
	if ( ! get_background_image() )
		return;

	wp_enqueue_script( 'backstretch', get_stylesheet_directory_uri() . '/js/backstretch.min.js', array( 'jquery' ), '2.0.4', true );
	wp_enqueue_script( 'backstretch-image', get_stylesheet_directory_uri().'/js/backstretch-initialise.js' , array( 'jquery', 'backstretch' ), '1', true );
	wp_localize_script( 'backstretch-image', 'BackStretchImage', array( 'src' => get_background_image() ) );
}

//add_action( 'wp_enqueue_scripts', 'gc_fitvids_responsive_video' );
/**
 * Fitvids
 */
 function gc_fitvids_responsive_video() {
	wp_enqueue_script( 'fitvids', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery.fitvids.js', array( 'jquery' ), '1.1', true );
 	wp_enqueue_script( 'fitvids-init', get_bloginfo( 'stylesheet_directory' ) . '/js/fitvids-init.js', array( 'fitvids' ), '1.1', true );
}
