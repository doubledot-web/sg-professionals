<?php
/**
 * CLEAN UP WordPress
 */
function cnvs_cleanup_wp() {
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_generator' );

	// wp version from css and js
	add_filter( 'style_loader_src', 'cnvs_remove_wp_ver_css_js', 9999 );
	add_filter( 'script_loader_src', 'cnvs_remove_wp_ver_css_js', 9999 );

	// all actions related to emojis
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	// filter to remove TinyMCE emojis
	add_filter( 'tiny_mce_plugins', 'cnvs_disable_emojicons_tinymce' );

	// disable WordPress auto oEmbed scripts
	remove_action( 'rest_api_init', 'wp_oembed_register_route' );
	remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
}
add_action( 'init', 'cnvs_cleanup_wp' );

// Disable automatic updates
add_filter( 'auto_update_plugin', '__return_false' );
add_filter( 'auto_update_theme', '__return_false' );

function cnvs_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}

function cnvs_disable_emojicons_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
} // end of clean up



/**
 * ADD THEME SUPPORT AND THEME RELATED STUFF
 */
function cnvs_setup_theme() {
	/* https://codex.wordpress.org/Function_Reference/add_theme_support */
	add_theme_support( 'title-tag' );
	add_theme_support( 'menus' );
	add_theme_support( 'post-thumbnails' );
	// add_theme_support( 'automatic-feed-links' );
	// add_theme_support( 'post-formats', array() );
	// add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'meta', 'style', 'script' ) );
	add_theme_support( 'html5', array( 'gallery', 'caption', 'style', 'script' ) );

	$logo_defaults = array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	);

	add_theme_support( 'custom-logo', $logo_defaults );

	// Register menus
	register_nav_menus(
		array(
			'main-nav'   => __( 'The Main Menu', 'safergambling' ),
			'mobile-nav' => __( 'The Mobile Menu', 'safergambling' ),
		)
	);

	load_theme_textdomain( 'safergambling', get_template_directory() . '/library/languages' );

	add_filter( 'the_content', 'cnvs_filter_ptags_on_images' );
}
add_action( 'after_setup_theme', 'cnvs_setup_theme' );

function cnvs_filter_ptags_on_images( $content ) {
	return preg_replace( '/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content );
}



/**
 * Adds ACF driven theme Options Page in dashboard
 */
function cnvs_theme_options() {
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page(
			array(
				'page_title' => 'Theme Settings',
				'menu_title' => 'Theme Settings',
				'menu_slug'  => 'theme-settings',
				'capability' => 'edit_posts',
				'redirect'   => false,
				'icon_url'   => 'dashicons-layout',
				'position'   => '2.55',
			)
		);
	}
}
add_action( 'acf/init', 'cnvs_theme_options' );
// end theme support and theme related stuff



/**
 * Adds Google Maps API key on dashboard for ACF map component
 */
function cnvs_acf_init() {
	acf_update_setting( 'google_api_key', '***************************************' );
}
// add_action( 'acf/init', 'cnvs_acf_init' );



/**
 * INCLUDE FILES
 */
include_once get_theme_file_path( 'library/inc/body-classes.php' );
include_once get_theme_file_path( 'library/inc/class-mobile-submenu-wrapper.php' );
include_once get_theme_file_path( 'library/inc/class-submenu-wrapper.php' );
include_once get_theme_file_path( 'asides/register-sidebars.php' );
include_once get_theme_file_path( 'library/inc/shortcodes.php' );
include_once get_theme_file_path( 'library/inc/plugins-list.php' );
include_once get_theme_file_path( 'library/inc/utility-functions.php' );
if ( class_exists( 'WooCommerce' ) ) {
	include_once get_theme_file_path( 'woocommerce/wc-functions.php' );
}



/**
 * THUMBNAIL SIZES
 */
function cnvs_custom_image_sizes( $sizes ) {
	return array_merge(
		$sizes,
		array(
			'thumb-600' => __( '600px by 150px' ),
		)
	);
}
// add_filter( 'image_size_names_choose', 'cnvs_custom_image_sizes' );
// add_image_size( 'thumb-600', 600, 150, true );



/**
 * SPECIFY WHICH SHORTCODES SHOULD NOT BE RUN THROUGH THE WPTEXTURIZE FUNCTION
 */
function cnvs_shortcodes_to_exempt_from_wptexturize( $shortcodes ) {
	$shortcodes[] = 'miniloop';
	return $shortcodes;
}
// add_filter( 'no_texturize_shortcodes', 'cnvs_shortcodes_to_exempt_from_wptexturize' );

/***************************
 ***** Add image instructions for admin featured images *****
 ***************************/
function add_featured_image_instruction( $content ) {
	global $post;
	$post_type = $post->post_type;
	if ( 'resource' === $post_type || 'programme' === $post_type ) :
		return $content .= '<p>Image dimensions should be 252px x 244px.</p>';
	elseif ( 'page' === $post_type ) :
		return $content .= '<p>Image dimensions should be 1200px x 670px.</p>';
	endif;
	return $content;
}
add_filter( 'admin_post_thumbnail_html', 'add_featured_image_instruction' );

/**
 * ENQUEUEING SCRIPTS & STYLES
 */
function cnvs_scripts_and_styles() {

	$theme_uri = get_stylesheet_directory_uri();

	wp_enqueue_style( 'safergambling', $theme_uri . '/library/css/style.css' );
	wp_enqueue_script( 'uikit', $theme_uri . '/library/js/uikit-loader-dist.js', null, '', true );
	wp_enqueue_script( 'external-scripts', $theme_uri . '/library/js/external-scripts-dist.js', null, '', true );
	wp_register_script( 'safergambling', $theme_uri . '/library/js/scripts-dist.js', array( 'uikit', 'jquery' ), '', true );

	// wp_enqueue_script( 'google_maps_api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCkbBkvj33HXW2vcR-K8CfXnMoQaUItHN4', array(), '1' );

	// localize script to pass usefull variables to theme scripts
	// https://codex.wordpress.org/Function_Reference/wp_localize_script
	$global_vars = array(
		'site_url'     => get_bloginfo( 'site_url' ),
		'template_url' => get_template_directory_uri(),
		'loading'      => __( 'Loading', 'safegambling' ),
		'load_more'    => __( 'Load More', 'safegambling' ),
	);
	wp_localize_script( 'safergambling', 'global_vars', $global_vars );
	wp_enqueue_script( 'safergambling' );

	if ( is_singular() && comments_open() && ( get_option( 'thread_comments' ) === 1 ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cnvs_scripts_and_styles', 999 );



/**
 * ADD DEFER & ASYNC ATTRIBUTES TO WordPress SCRIPTS
 */
function dd_async_defer_attribute( $tag, $handle ) {
	if ( 'font-awesome' === $handle ) {
		$tag = str_replace( ' src', ' defer="defer" src', $tag );
	}

	return $tag;
}
// add_filter( 'script_loader_tag', 'dd_async_defer_attribute', 10, 2 );



/**
 * OEMBED SIZE OPTIONS
 */
if ( ! isset( $content_width ) ) {
	$content_width = 975;
}



/**
 * HIDE NAGS
 */
function hide_update_notice_to_all_but_admin_users() {
	if ( ! current_user_can( 'update_core' ) ) {
		remove_action( 'admin_notices', 'update_nag', 3 );
	}
}
add_action( 'admin_head', 'hide_update_notice_to_all_but_admin_users', 1 );



/**
 * A BETTER VAR_DUMP
 */
function ddump( ...$atts ) {
	echo '<pre>';
	var_dump( $atts );
	echo '</pre>';
}



/******************************
 *** WPML LANGUAGE SWITCHER ***
 ******************************/
 function language_selector_flags() {
	if ( class_exists( 'SitePress' ) ) :
		$languages = icl_get_languages( 'skip_missing=0&orderby=code' );

		if ( ! empty( $languages ) ) :
			?>
			<div class="uk-flex uk-flex-middle">
				<?php
				foreach ( $languages as $language ) :
					if ( $language['active'] ) :
						$code = 'el' === $language['code'] ? __( 'Gr', 'safergambling' ) : $language['code'];
						?>
						<button class="btn-base text-theme-white uk-flex uk-flex-center uk-flex-middle uk-padding-remove uk-text-capitalize" type="button">
							<?php echo esc_html( $code ); ?>
							<svg class="uk-margin-small-left" width="18" height="19" aria-hidden="true">
								<use xlink:href="#global"></use>
							</svg>
						</button>
						<?php
					endif;
				endforeach;
				?>
				<div uk-dropdown="pos: bottom-right">
					<?php
					foreach ( $languages as $language ) :
						if ( ! $language['active'] ) :
							$code = 'el' === $language['code'] ? __( 'Gr', 'safergambling' ) : $language['code'];
							$name = 'el' === $language['code'] ? __( 'Greek', 'safergambling' ) : $language['native_name'];
							?>
							<a href="<?php echo esc_url( $language['url'] ); ?>" class=" uk-text-capitalize">
								<?php echo esc_html( $name ); ?> (<span><?php echo esc_html( $code ); ?></span>)
							</a>
							<?php
						endif;
					endforeach;
					?>
				</div>
			</div>
		<?php
		endif;
	endif;
} // End WPML language switcher



/**
 * Adds UIkit classes to parent menu items
 *
 * @param array   $classes Array of the CSS classes that are applied to the menu item's <li> element
 * @param WP_Post $item    The current menu item
 *
 * @return array
 */
function cnvs_add_classes_to_parent_menu_items( $classes, $item ) {
	if ( in_array( 'menu-item-has-children', $classes, true ) ) {
		$classes[] = 'uk-parent';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'cnvs_add_classes_to_parent_menu_items', 10, 2 );



/**
 * Sets the maximum number of words in a post excerpt
 *
 * @param int $length The maximum number of words. Default 55
 *
 * @return int
 */
function cnvs_excerpt_length( $length ) {
	return 55;
}
// add_filter( 'excerpt_length', 'cnvs_excerpt_length' );



/**
 * Replace default WordPress gallery shortcode
 */
function cnvs_gallery_content( $atts ) {
	ob_start();
	$img_ids = explode( ',', $atts['ids'] );
	$columns = isset( $atts['columns'] ) ? esc_attr( $atts['columns'] ) : '2';
	?>
	<div class="gallery uk-grid-medium uk-child-width-1-2@s uk-child-width-1-<?php echo $columns; ?>@m" uk-grid="masonry: true">
		<?php
		foreach ( $img_ids as $img_id ) :
			if ( wp_get_attachment_image( $img_id ) ) :
				?>
				<div>
					<a class="uk-inline" href="<?php echo wp_get_attachment_image_url( $img_id, 'full' ); ?>">
						<?php echo wp_get_attachment_image( $img_id, 'full' ); ?>
					</a>
				</div>
				<?php
			endif;
		endforeach;
		?>
	</div>
	<?php
	return ob_get_clean();
}

function cnvs_gallery_shortcode( $output = '', $atts = null, $instance = null ) {

	$cnvs_gallery = cnvs_gallery_content( $atts );

	if ( ! empty( $cnvs_gallery ) ) {
		return $cnvs_gallery;
	}

	return $output;
}
// add_filter( 'post_gallery', 'cnvs_gallery_shortcode', 10, 3 );



/**
 * RENDER RESPONSIVE AUTOEMBED YOUTUBE VIDEO
 */
function cnvs_custom_oembed_function( $cache, $url, $attr, $post_id ) {
	preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match );
	$youtube_id = $match[1];

	if ( ! $youtube_id ) {
		return wp_oembed_get( $url );
	}

	ob_start();
	?>

	<iframe src="https://www.youtube-nocookie.com/embed/<?php echo $youtube_id; ?>?autoplay=0&amp;showinfo=0&amp;rel=0&amp;modestbranding=1&amp;playsinline=1" width="1920" height="1080" allowfullscreen uk-responsive uk-video="automute: true; autoplay: false;"></iframe>

	<?php
	return ob_get_clean();
}
// add_filter( 'embed_oembed_html', 'cnvs_custom_oembed_function', 10, 4 );

function add_excerpt_support_for_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'add_excerpt_support_for_pages' );


/*****************************
 ***** MOBILE SEARCH FORM *****
 *****************************/
function extra_search_form( $form ) {
	$form  = '<form id="searchformMobile" role="search" method="get" action="' . home_url( '/' ) . '">';
	$form .= '<div class="search-input-wrapper uk-flex uk-inline">';
	$form .= '<button class="search-btn inactive" type="submit">';
	$form .= '<span uk-icon="icon: search; ratio: 1.2"></span>';
	$form .= '</button>';
	$form .= '<input type="search" id="search-mobile" name="s" value="" placeholder="' . __( 'Search', 'safergambling' ) . '" class="search-input uk-input" />';
	$form .= '</div>';
	$form .= '</form>';
	return $form;
}

/*****************************
 ***** GET ARCHIVE POST TYPE *****
 *****************************/
function get_archive_post_type() {
	return is_archive() ? get_queried_object()->name : false;
}

/*****************************
 ***** MODIFY MAIN QUERY *****
 *****************************/
function filter_posts( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) :
		if ( is_post_type_archive( array( 'resource', 'event', 'programme', 'regulation', 'research' ) ) ) :
			$query->set( 'posts_per_page', 2 );

			//SEARCH
			if ( ! empty( $_GET ) && ( array_key_exists( 'search_value', $_GET ) && ! empty( $_GET['search_value'] ) ) ) :
				$query->set( 's', $_GET['search_value'] );
			endif;

			//SORT
			if ( is_post_type_archive( array( 'event', 'programme', 'research' ) ) ) :
				if ( array_key_exists( 'sort', $_GET ) ) :
					switch ( $_GET['sort'] ) :
						case 'oldest':
							$order = 'ASC';
							break;
					endswitch;
					$query->set( 'order', $order );
				endif;
			endif;
		elseif ( is_search() ) :
			$query->set( 'post_type', array( 'regulation', 'resource', 'event', 'research', 'programme' ) );
		endif;
	endif;
}
add_action( 'pre_get_posts', 'filter_posts' );


/*****************************
 ***** GET ALL POSTS *****
 *****************************/
function get_all_posts() {
	global $wp_query;
	return $wp_query->found_posts;
}

/*****************************
 ***** GET ALL POSTS CURRENT PAGE *****
 *****************************/
function get_all_posts_current_page() {
	global $wp_query;
	return $wp_query->post_count;
}
