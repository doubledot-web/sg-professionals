<?php
$social          = get_field( 'social', 'option' );
$social_channels = $social['channels'];

$footer = get_field( 'footer' );
?>

<footer id="mainFooter" class="footer bg-light-brass" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
	<div class="uk-container uk-container-large">
		<div>
			<div class="footer-row top">
				<div class="footer-row-inner" uk-grid>
					<div class="footer-logos uk-width-1-2@s">
						<div class="border-l uk-flex uk-flex-middle uk-flex-between uk-flex-left@s">
							<a class="footer-logo uk-margin-medium-right" href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<img class="logo" width="146" height="42" src="<?php echo get_template_directory_uri(); ?>/library/imgs/sf-logo-footer.svg" alt="<?php esc_attr_e( 'safer gambling logo', 'safergambling' ); ?>">
							</a>
							<a class="footer-logo" href="">
								<img class="logo" width="147" height="53" src="<?php echo get_template_directory_uri(); ?>/library/imgs/nba-logo-footer.svg" alt="<?php esc_attr_e( 'responsible gambling logo', 'safergambling' ); ?>">
							</a>
						</div>
					</div>
					<div class="footer-link-buttons mt-00 uk-width-1-2@s">
						<div class="border-s">
							<div class="uk-child-width-1-2" uk-grid>
								<?php
								if ( ! empty( $social_channels ) ) :
									?>
									<div class="footer-socials uk-flex uk-flex-center@s uk-flex-middle">
										<?php
										foreach ( $social_channels as $social_channel ) :
											?>
											<a href="<?php echo esc_url( $social_channel['link'] ); ?>" class="theme-social"><?php echo '<span uk-icon="icon: ' . esc_html( $social_channel['icon'] ) . ';ratio: 1.2;"></span>'; ?></a>
											<?php
										endforeach;
										?>
									</div>
									<?php
								endif;
								?>
								<div class="footer-pro uk-flex uk-flex-right uk-flex-left@s">
									<a class="uk-button uk-button-default" href="#"><span><?php echo __( 'For Players', 'safergambling' ); ?></span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-row middle">
				<div class="footer-row-inner" uk-grid>
					<div class="footer-menus uk-width-1-2@s">
						<div>
							<div uk-grid>
								<div class="footer-menus-left uk-width-2-3@s">
									<div class="border-s">
										<div class="footer-menu">
											<?php
											if ( is_active_sidebar( 'footer-1' ) ) {
												dynamic_sidebar( 'footer-1' );
											}
											?>
										</div>
										<div class="footer-menu ml-00 ml-40s">
											<?php
											if ( is_active_sidebar( 'footer-2' ) ) {
												dynamic_sidebar( 'footer-2' );
											}
											?>
										</div>
									</div>
								</div>
								<div class="footer-menu mt-00 uk-width-1-3@s">
									<div class="border-s">
										<?php
										if ( is_active_sidebar( 'footer-3' ) ) {
											dynamic_sidebar( 'footer-3' );
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="footer-info mt-00 uk-width-1-2@s">
						<div>
							<div class="uk-child-width-1-2@s" uk-grid>
								<div class="uk-visible@s"></div>
								<div class="footer-menu">
									<div class="pt-70 pb-70 pt-00s pb-00s">
										<?php
										if ( is_active_sidebar( 'footer-info' ) ) {
											dynamic_sidebar( 'footer-info' );
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-row bottom">
				<div class="footer-row-inner" uk-grid>
					<div class="copyright uk-width-1-2@s">
						<div class="pt-40 pb-40 pt-00s pb-00s"><?php echo __( 'Copyright 2023 © National Betting Authority - All Rights Reserved', 'safergambling' ); ?></div>
					</div>
					<div class="credits uk-width-1-2@s">
						<div class="pb-40">
							<div class="uk-child-width-1-2" uk-grid>
								<div class="uk-flex uk-flex-center@s uk-flex-middle">
									<p><?php echo __( 'Designed by ', '' ); ?><a href=""><strong>Komodo.gr</strong></a></p>
								</div>
								<div class="uk-flex uk-flex-right uk-flex-left@s">
									<p><?php echo __( 'Developed by ', '' ); ?><a href=""><strong>DoubleDot</strong></a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
