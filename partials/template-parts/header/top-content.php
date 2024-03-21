<?php
$header            = get_field( 'header', $args['related_page'] );
$header_bg_classes = ! empty( $header['header_bg_color'] ) ? esc_attr( $header['header_bg_color'] ) : 'bg-theme-blue';

$national_help_lines = get_field( 'national_help_lines', 'option' );

$header_menu_bg_color = ! empty( $header['header_menu_bg_color'] ) ? (string) $header['header_menu_bg_color'] : 'bg-light-blue';

$inverted_colors = array( 'bg-theme-blue', 'bg-theme-green', 'bg-theme-brass' );

if ( in_array( $header_menu_bg_color, $inverted_colors, true ) ) {
	$header_bg_classes .= ' header-top-border';
}

$social = get_field( 'social', 'option' );
?>

<div class="header-top header-top-desktop uk-h6 uk-margin-remove uk-light uk-visible@s <?php echo $header_bg_classes; ?>">
	<div class="uk-container uk-container-large">
		<div class="uk-flex uk-flex-middle uk-flex-between uk-height-1-1">
			<div class="top-header-left uk-flex uk-flex-middle">
				<?php if ( ! empty( $national_help_lines['lines'] ) ) : ?>
					<div class="header-top-line-help header-top-item header-top-item-left"><?php echo __( 'National Help Lines', 'safergambling' ); ?></div>
					<?php foreach ( $national_help_lines['lines'] as $line ) : ?>
						<div class="header-top-item header-top-item-left"><strong><a href="tel:<?php echo esc_url( $line['number'] ); ?>"><?php echo esc_html( $line['number'] ); ?></a></strong></div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
			<div class="top-header-right uk-flex uk-flex-middle">
				<div class="header-top-item header-top-item-right">
					<button type="button" aria-label="<?php esc_attr_e( 'Open search form', 'safergambling' ); ?>" uk-toggle="target: #search-modal-form; animation: uk-animation-fade" uk-icon=""><svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M7.63449 15.1869C11.2986 15.1869 14.269 12.2166 14.269 8.55246C14.269 4.88833 11.2986 1.91797 7.63449 1.91797C3.97036 1.91797 1 4.88833 1 8.55246C1 12.2166 3.97036 15.1869 7.63449 15.1869Z" stroke="white" stroke-width="2" stroke-miterlimit="10"/>
					<path d="M16.5988 17.7843L12.4746 13.6602" stroke="white" stroke-width="2" stroke-miterlimit="10"/>
					</svg></button>
				</div>
				<!--<span class="header-top-divider header-top-item header-top-item-right" style="background: red"></span>-->
				<?php if ( ! empty( $social['channels'] ) ) : ?>
					<div class="header-top-item-right header-socials uk-flex uk-flex-middle uk-flex-center">
						<?php
						foreach ( $social['channels'] as $social_channel ) {
							?>
							<a class="header-top-social" href="<?php echo esc_url( $social_channel['link'] ); ?>" class=""><?php echo '<span uk-icon="icon: ' . esc_html( $social_channel['icon'] ) . '; ratio: 0.7;"></span>'; ?></a>
							<?php
						}
						?>
					</div>
				<?php endif; ?>
				<div class="header-lang-switcher lang-switcher">
					<?php echo language_selector_flags(); ?>
				</div>
			</div>
		</div>
	</div>
</div>

