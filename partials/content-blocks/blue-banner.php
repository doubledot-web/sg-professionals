<?php
$args = json_decode( $args );
$text = $args->text;
$pdf  = $args->link;
?>

<section class="section-blue-banner uk-margin-large-bottom">
	<div class="uk-container uk-container-small">
		<div class="box rounded rounded-sm text-theme-white bg-theme-blue">
			<div class="uk-grid-large" uk-grid>
				<div class="uk-width-expand@s">
					<div class="remove-margin-from-last-el uk-margin-medium-bottom">
						<?php echo wp_kses_post( $text ); ?>
					</div>
				</div>
				<div class="uk-width-auto@s uk-flex-first uk-flex-last@s">
					<figure class="uk-margin-remove">
						<?php echo wp_get_attachment_image( $args->image, 'full' ); ?>
					</figure>
				</div>
			</div>
			<a class="white uk-button uk-button-default" href="<?php echo esc_url( $pdf->url ); ?>" target="<?php echo ! empty( $pdf->target ) ? esc_url( $pdf->target ) : ''; ?>">
				<?php esc_html_e( 'Download PDF', 'safergambling' ); ?>
			</a>
		</div>
	</div>
</section>


