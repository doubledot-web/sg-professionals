<?php
add_action( 'widgets_init', 'register_sidebars_init' );

function register_sidebars_init() {
	register_sidebar(
		array(
			'id'            => 'primary-sidebar',
			'name'          => __( 'Primary Sidebar', 'safergambling' ),
			'description'   => __( 'The primary sidebar.', 'safergambling' ),
			'before_widget' => '<div id="%1$s" class="widget uk-margin %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Menu 1', 'safergambling' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'safergambling' ),
			'before_widget' => '<div class="footer-block widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="footer-title widget-heading uk-margin-bottom">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Menu 2', 'safergambling' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'safergambling' ),
			'before_widget' => '<div class="footer-block widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="footer-title widget-heading uk-margin-bottom">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Menu 3', 'safergambling' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'safergambling' ),
			'before_widget' => '<div class="footer-block widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="footer-title widget-heading uk-margin-bottom">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Info', 'safergambling' ),
			'id'            => 'footer-info',
			'description'   => esc_html__( 'Add widgets here.', 'safergambling' ),
			'before_widget' => '<div class="footer-block widget %2$s uk-text-center uk-text-left@s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="footer-title widget-heading uk-margin-bottom">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Mobile Menu Footer Left', 'safergambling' ),
			'id'            => 'mobile-menu-left',
			'description'   => esc_html__( 'Add widgets here.', 'safergambling' ),
			'before_widget' => '<div class="mobile-menu-footer widget %2$s uk-text-center uk-text-left@s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="mobile-menu-footer widget-heading uk-margin-bottom">',
			'after_title'   => '</h5>',
		)
	);
}
