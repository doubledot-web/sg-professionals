<?php
$args = json_decode( $args );

/*if ( empty( $args->content ) || empty( $args->image ) ) {
	return;
}*/

$section_bg_color = ! empty( $args->background_color ) ? ' ' . esc_attr( $args->background_color ) : ' bg-light-blue';

$inverted_colors = array( 'bg-theme-blue', 'bg-theme-green', 'bg-theme-brass' );

if ( in_array( $args->background_color, $inverted_colors, true ) ) {
	$section_bg_color .= ' uk-light';
} else {
	$section_bg_color .= ' uk-dark';
}

$content = wp_kses_post( $args->content );

$img_url    = ! empty( $args->image->url ) ? esc_url( $args->image->url ) : '';
$img_alt    = ! empty( $args->image->alt ) ? esc_attr( $args->image->alt ) : '';
$img_width  = ! empty( $args->image->width ) ? esc_attr( $args->image->width ) : '';
$img_height = ! empty( $args->image->height ) ? esc_attr( $args->image->height ) : '';
?>

<section class="theme-section hero uk-margin-large-bottom">
	<div class="hero-inner uk-padding-large uk-padding-remove-horizontal<?php echo $section_bg_color; ?>">
		<div class="hero-container uk-container">
			<?php if ( empty( $args->image ) ) : ?>
				<div class="hero-content text-only uk-text-center">
					<div class="remove-margin-from-last-el"><?php echo $content; ?></div>
				</div>
			<?php else : ?>
				<div class="hero-grid uk-child-width-1-2@s uk-grid-large" uk-grid>
					<div class="hero-content uk-flex uk-flex-middle">
						<div class="remove-margin-from-last-el"><?php echo $content; ?></div>
					</div>
					<div class="hero-image uk-flex uk-flex-center uk-flex-middle uk-text-center">
						<img src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>" width="<?php echo $img_width; ?>" height="<?php echo $img_height; ?>">
					</div>
				</div>
			<?php endif; ?>
		</div>

		<?php
		if ( is_post_type_archive( array( 'event', 'programme', 'research' ) ) ) :
			$type        = get_archive_post_type();
			$btn_variant = 'brass';
			if ( 'programme' === $type ) :
				$placeholder   = esc_attr__( 'Search prevention programmes', 'safergambling' );
				$padding_class = ' uk-padding-remove-bottom';
			elseif ( 'event' === $type ) :
				$placeholder   = esc_attr__( 'Search events', 'safergambling' );
				$padding_class = ' uk-padding-remove-bottom';
			elseif ( 'research' === $type ) :
				$placeholder   = esc_attr__( 'Search materials for..', 'safergambling' );
				$btn_variant   = 'blue';
				$padding_class = ' uk-padding-remove-top';
			endif;
			?>
			<div class="uk-container uk-container-large uk-margin-large-top">
				<form action="" class="search-form-generic uk-padding-large uk-padding-remove-horizontal<?php echo $padding_class; ?>">
					<div class="inner">
						<input placeholder="<?php echo $placeholder; ?>" type="search" class="uk-input uk-h3" name="search_value" value="<?php echo isset( $_GET['search_value'] ) ? $_GET['search_value'] : ''; ?>" autocomplete="off" aria-label="<?php echo $placeholder; ?>" />
						<button type="submit" class="<?php echo $btn_variant; ?> inverse uk-button uk-button-default uk-h3 uk-margin-remove uk-visible@s" aria-label="<?php echo $placeholder; ?>">
							<?php echo esc_html_e( 'Search', 'safergambling' ); ?>
						</button>
					</div>
				</form>
			</div>
			<?php
		endif;
		?>
	</div>
</section>
