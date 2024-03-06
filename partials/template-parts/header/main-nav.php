<?php
$header               = get_field( 'header', $args['related_page'] );
$header_menu_bg_color = ! empty( $header['header_menu_bg_color'] ) ? (string) $header['header_menu_bg_color'] : 'bg-light-blue';

//search
if ( is_search() || is_404() ) :
	$header_menu_bg_color = 'bg-theme-white';
endif;

$inverted_colors = array( 'bg-theme-blue', 'bg-theme-green', 'bg-theme-brass' );

if ( in_array( $header_menu_bg_color, $inverted_colors, true ) ) {
	$header_menu_bg_color .= ' uk-light';
} else {
	$header_menu_bg_color .= ' uk-dark';
}
?>

<div class="header-menu uk-flex uk-flex-column uk-flex-center <?php echo $header_menu_bg_color; ?>" uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky;">
	<nav class="uk-navbar-container">
		<div class="uk-container uk-container-large">
			<div class="uk-flex uk-flex-middle uk-flex-between" uk-navbar="">
				<div class="">
					<a class="uk-position-relative" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php get_template_part( 'partials/template-parts/header/header-logo' ); ?>
					</a>
				</div>
				<div class="">
					<?php
					wp_nav_menu(
						array(
							'container'      => false,
							'menu'           => __( 'The Main Menu', 'safergambling' ),
							'menu_class'     => '',
							'items_wrap'     => '<ul class="menu-nav uk-navbar-nav uk-visible@m">%3$s</ul>',
							'add_li_class'   => 'underline-animation nav-item',
							'theme_location' => 'main-nav', // where it's located in the theme,
							'walker'         => new Submenu_Wrapper(),
							'fallback_cb'    => false,
						)
					);
					?>
				</div>
				<div class="uk-flex uk-flex-middle uk-flex-between">
					<a href="#modal-menu" aria-label="<?php esc_attr_e( 'Open mobile menu', 'safergambling' ); ?>" uk-toggle><svg class="hamburger" width="30" height="23" viewBox="0 0 30 23" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 1.42383H30M0 11.4238H30M0 21.4238H30" stroke="currentColor" stroke-width="2"/></svg></a>
					<a class="uk-button uk-button-default uk-visible@l" href="#"><span><?php echo __( 'For Players', 'safergambling' ); ?></span></a>
				</div>
			</div>
		</div>
	</nav>
</div>
