<?php
/**
 * Register and unregister and position all the widgets.
 *
 * @package genesischild
 */

add_action( 'widgets_init', 'gc_extra_widgets' );
/**
 * Register new Widget areas and position them.
 */
function gc_extra_widgets() {
	genesis_register_sidebar( array(
		'id'            => 'preheaderleft',
		'name'          => __( 'PreHeaderLeft', 'genesischild' ),
		'description'   => __( 'This is the preheader left area', 'genesischild' ),
	) );
	genesis_register_sidebar( array(
		'id'            => 'preheaderright',
		'name'          => __( 'PreHeaderRight', 'genesischild' ),
		'description'   => __( 'This is the preheader right area', 'genesischild' ),
	) );
	genesis_register_sidebar( array(
		'id'            => 'hero',
		'name'          => __( 'Hero Home Page', 'genesischild' ),
		'description'   => __( 'This is the Hero Home Page area', 'genesischild' ),
	) );
	genesis_register_sidebar( array(
		'id'            => 'optin',
		'name'          => __( 'Optin', 'genesischild' ),
		'description'   => __( 'This is the optin area', 'genesischild' ),
	) );
	genesis_register_sidebar( array(
		'id'            => 'home-top',
		'name'          => __( 'Home Top', 'genesischild' ),
		'description'   => __( 'This is the home top area', 'genesischild' ),
	) );
	genesis_register_sidebar( array(
		'id'            => 'home-middle',
		'name'          => __( 'Home Middle', 'genesischild' ),
		'description'   => __( 'This is the home middle area', 'genesischild' ),
	) );
	genesis_register_sidebar( array(
		'id'            => 'home-bottom',
		'name'          => __( 'Home Bottom', 'genesischild' ),
		'description'   => __( 'This is the home bottom area', 'genesischild' ),
	) );
	genesis_register_sidebar( array(
		'id'            => 'before-entry',
		'name'          => __( 'Before Entry', 'genesischild' ),
		'description'   => __( 'This is the before content area', 'genesischild' ),
	) );
	genesis_register_sidebar( array(
		'id'            => 'footerwidgetheader',
		'name'          => __( 'Footer Widget Header', 'genesischild' ),
		'description'   => __( 'This is for the Footer Widget Headline', 'genesischild' ),
	) );
	genesis_register_sidebar( array(
		'id'            => 'footercontent',
		'name'          => __( 'Footer', 'genesischild' ),
		'description'   => __( 'This is the general footer area', 'genesischild' ),
	) );
	genesis_register_sidebar( array(
		'id'            => 'postfooterleft',
		'name'          => __( 'Post Footer Left', 'genesischild' ),
		'description'   => __( 'This is the post footer left area', 'genesischild' ),
	) );
	genesis_register_sidebar( array(
		'id'            => 'postfooterright',
		'name'          => __( 'Post Footer Right', 'genesischild' ),
		'description'   => __( 'This is the post footer right area', 'genesischild' ),
	) );
}

add_action( 'genesis_before_header','gc_preheader_widget' );
/**
 * Position the PreHeader Area.
 */
function gc_preheader_widget() {
	if ( is_active_sidebar( 'preheaderleft' ) || is_active_sidebar( 'preheaderright' ) ) {
		echo '<section class="preheadercontainer"><div class="wrap">';
		genesis_widget_area( 'preheaderleft' , array(
			'before' => '<aside class="preheaderleft first one-half">',
			'after'  => '</aside>',
		) );
		genesis_widget_area( 'preheaderright' , array(
			'before' => '<aside class="preheaderright one-half">',
			'after'  => '</aside>',
		) );
		echo '</div></section>';
	}
}


/**
 * Position the Hero Area.
 * Hooked in front-page.php
 */
function gc_hero_widget() {
	genesis_widget_area( 'hero', array(
		'before' => '<section class="herocontainer"><div class="hero home-content wrap">',
		'after'  => '</div></section>',
	));
}

/**
 * Position the Optin Area.
 * Hooked in front-page.php
 */
function gc_optin_widget() {
	genesis_widget_area( 'optin', array(
		'before' => '<aside class="optincontainer"><div class="optin home-content wrap">',
		'after'  => '</div></aside>',
	));
}

/**
 * Position the Home Area.
 * Hooked in front-page.php
 */
function gc_homecontent_widget() {
	genesis_widget_area( 'home-top', array(
		'before' => '<div class="home-top-container"><div class="home-top home-content wrap">',
		'after'  => '</div></div>',
	) );
	genesis_widget_area( 'home-middle', array(
		'before' => '<div class="home-middle-container"><div class="home-middle home-content wrap">',
		'after'  => '</div></div>',
	) );
	genesis_widget_area( 'home-bottom', array(
		'before' => '<div class="home-bottom-container"><div class="home-bottom home-content wrap">',
		'after'  => '</div></div>',
	) );
}

add_action( 'genesis_before_footer','gc_footerwidgetheader', 5 );
/**
 * Position Footer Widget Header.
 */
function gc_footerwidgetheader() {
	if ( is_active_sidebar( 'footerwidgetheader' ) ) {
		echo '<div class="footerwidgetheader-container"><div class="wrap">';
		genesis_widget_area( 'footerwidgetheader' );
		echo '</div></div>';
	}
}

// Footer Widgets - change number to suit.
add_theme_support( 'genesis-footer-widgets', 3 );


remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer','gc_footer_widget' );
/**
 * Position the Footer Area.
 */
function gc_footer_widget() {
	genesis_widget_area( 'footercontent', array(
		'before' => '<div class="footercontent">',
		'after'  => '</div>',
	));
}

add_action( 'genesis_after_footer','gc_postfooter_widget' );
/**
 * Position the PostFooter Area.
 */
function gc_postfooter_widget() {
	if ( is_active_sidebar( 'postfooterleft' ) || is_active_sidebar( 'postfooterright' ) ) {
		echo '<div class="postfootercontainer"><div class="wrap">';
		genesis_widget_area( 'postfooterleft' , array(
			'before' => '<aside class="first one-half postfooterleft">',
			'after'  => '</aside>',
		));
		genesis_widget_area( 'postfooterright' , array(
			'before' => '<aside class="one-half postfooterright">',
			'after'  => '</aside>',
		));
		echo '</div></div>';
	}
}

add_action( 'genesis_before_loop','gc_before_entry_widget' );
/**
 * Position the Before Content Area.
 */
function gc_before_entry_widget() {
	if ( is_single() ) {
		genesis_widget_area( 'before-entry', array(
			'before' => '<div class="before-entry widget-area">',
			'after'  => '</div>',
		) );
	}
}

// Add widget area after posts.
add_theme_support( 'genesis-after-entry-widget-area' );

add_action( 'widgets_init', 'gc_remove_some_widgets' );
/**
 * Remove Unwanted Widgts.
 */
function gc_remove_some_widgets() {
	// Example below, to action these uncomment the add_action above.
	unregister_sidebar( 'sidebar-alt' );
}
