<?php
$header               = get_field( 'header', $args['related_page'] );
$header_menu_bg_color = ! empty( $header['header_menu_bg_color'] ) ? (string) $header['header_menu_bg_color'] : 'bg-light-blue';

$inverted_colors = array( 'bg-theme-blue', 'bg-theme-green', 'bg-theme-brass' );

if ( in_array( $header_menu_bg_color, $inverted_colors, true ) ) {
	$header_menu_bg_color .= ' uk-light';
} else {
	$header_menu_bg_color .= ' uk-dark';
}

$social = get_field( 'social', 'option' );
?>

<div id="modal-menu" class=" uk-modal-full" uk-modal>
	<div class="modal-menu-dialog bg-light-brass uk-modal-dialog" uk-height-viewport>
		<div class="modal-menu-container uk-container uk-container-large">

			<div class="uk-flex uk-flex-column uk-flex-between">
				<div class="mobile-menu-header mb-20 uk-flex uk-flex-middle uk-flex-between" uk-navbar="">
					<div class="">
						<a class="uk-position-relative" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php get_template_part( 'partials/template-parts/header/header-logo' ); ?>
						</a>
					</div>
					<div class="uk-flex uk-flex-middle uk-flex-between">
						<a class="close-menu" href="#modal-menu" aria-label="<?php esc_attr_e( 'Close mobile menu', 'safergambling' ); ?>" uk-toggle><span class="mr-10 mb-00 uk-h4 uk-visible@s"><?php echo __( 'Close', 'safergambling' ); ?></span>
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1.40234 1L22.9997 22.5973" stroke="#1459A4" stroke-width="2"/>
								<path d="M22.5977 1L1.00031 22.5973" stroke="#1459A4" stroke-width="2"/>
							</svg>
						</a>
						<a class="uk-button uk-button-default uk-visible@s" href="https://safergambling.wearedoubledot.com/"><span><?php echo __( 'For Players', 'safergambling' ); ?></span></a>
					</div>
				</div>
				<nav class="mobile-menu mb-20" itemscope itemtype="http://schema.org/SiteNavigationElement">
					<?php
					// https://developer.wordpress.org/reference/functions/wp_nav_menu/
					wp_nav_menu(
						array(
							'container'      => false, // remove nav container
							'menu'           => __( 'The Mobile Menu', 'safergambling' ), // nav name
							'menu_class'     => 'nav mobile-nav', // adding custom nav class
							'items_wrap'     => '<ul class="mobile-menu-list uk-h2 uk-nav-default uk-nav-parent-icon" uk-nav uk-scrollspy="target: > li; cls: uk-animation-slide-bottom-small; delay: 100; repeat: true;">%3$s</ul>',
							'theme_location' => 'mobile-nav', // where it's located in the theme,
							'walker'         => new Mobile_Submenu_Wrapper(),
							'fallback_cb'    => false,
						)
					);
					?>
				</nav>
				<div class="mb-20 uk-hidden@m">
					<div class="">
						<?php
						add_filter( 'get_search_form', 'extra_search_form' );
						get_search_form();
						remove_filter( 'get_search_form', 'extra_search_form' );
						?>
					</div>
				</div>
				<div class="mobile-menu-footer mb-30 uk-flex uk-flex-middle uk-flex-between">
					<div class="mobile-menu-policies uk-visible@m">
						<?php
						if ( is_active_sidebar( 'mobile-menu-left' ) ) {
							dynamic_sidebar( 'mobile-menu-left' );
						}
						?>
					</div>
					<div class="mobile-menu-right">
						<div class="uk-flex uk-flex-middle">
							<?php if ( ! empty( $social['channels'] ) ) : ?>
								<div class="header-socials uk-flex uk-flex-middle uk-flex-center">
									<?php
									foreach ( $social['channels'] as $social_channel ) {
										?>
										<a href="<?php echo esc_url( $social_channel['link'] ); ?>" class="theme-social"><?php echo '<span uk-icon="icon: ' . esc_html( $social_channel['icon'] ) . ';ratio: 1.2;"></span>'; ?></a>
										<?php
									}
									?>
								</div>
							<?php endif; ?>
							<div class="mobile-menu-lang-switcher lang-switcher">
								<?php echo language_selector_flags(); ?>
							</div>
						</div>
					</div>

				</div>
				<div class="mobile-menu-bottom-btns pt-30 pb-30 uk-hidden@m">
					<div class="uk-flex uk-flex-between">
						<a class="pro-btn uk-button uk-button-default" href="https://safergambling.wearedoubledot.com/"><span><?php echo __( 'For Players', 'safergambling' ); ?></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
