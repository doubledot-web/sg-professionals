<?php
$args = json_decode( $args );

if ( empty( $args->boxes ) ) {
	return;
}

$section_bg_color = ! empty( $args->colored_background ) ? ' bg-light-brass' : ' bg-theme-white';
$padding          = ! empty( $args->colored_background ) ? ' uk-padding-large uk-padding-remove-horizontal' : '';
?>

<section class="theme-section img-text-boxes uk-margin-large-bottom<?php echo $section_bg_color; ?><?php echo $padding; ?>">
	<div class="img-text-container uk-container uk-container-small">
		<?php
		foreach ( $args->boxes as $key => $box ) :
			$initial_key = $key;
			$id          = $box->id ? $box->id : 'about-' . ++$key;
			$box_content = $box->content;
			$show_more   = $box_content->show_more;
			?>
			<div id="<?php echo $id; ?>" class="box box-<?php echo $id; ?> img-text-row">
				<div class="img-text-grid uk-child-width-1-2@s uk-flex-middle uk-grid-large" uk-grid>
					<div class="img-text-img uk-text-center<?php echo 0 === $initial_key % 2 ? ' uk-flex-last@s uk-flex-right@s uk-text-right@s' : ' uk-text-left@s'; ?>">
						<figure class="uk-margin-remove">
							<?php echo wp_get_attachment_image( $box->image, 'full' ); ?>
						</figure>
					</div>
					<div class="img-text-content<?php echo 0 !== $initial_key % 2 ? ' uk-flex uk-flex-left uk-flex-right@s' : ''; ?>">
						<div class="uk-flex uk-flex-column uk-flex-between">
							<div class="img-text-content-text mb-30 mb-60s remove-margin-from-last-el"><?php echo wp_kses_post( $box_content->text ); ?></div>
							<div class="img-text-content-link">
								<?php if ( $show_more ) : ?>
									<button class="box-more-btn font-bold uk-button uk-button-default" data-target="<?php echo $id; ?>">
										<span class="more"><?php esc_html_e( 'More', 'safergambling' ); ?> ↓</span>
										<span class="less"><?php esc_html_e( 'Less', 'safergambling' ); ?> ↑</span>
									</button>
								<?php else : ?>
									<a class="uk-button uk-button-default" href="<?php echo ! empty( $box_content->link->url ) ? esc_url( $box_content->link->url ) : '#'; ?>" target="<?php echo ! empty( $box_content->link->target ) ? esc_url( $box_content->link->target ) : ''; ?>">
										<?php esc_html_e( 'Find out more', 'safergambling' ); ?> →
									</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>

				<?php if ( $show_more ) : ?>
					<div class="uk-grid-large<?php echo 0 !== $initial_key % 2 ? ' uk-flex-right' : ''; ?> uk-margin-remove-top" uk-grid>
						<div class="uk-width-1-2@s">
							<div class="full-text text-<?php echo $id; ?> remove-margin-from-last-el pt-30 pt-60s">
								<?php echo wp_kses_post( $box_content->full_text ); ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
			<?php
		endforeach;
		?>
	</div>
</section>
