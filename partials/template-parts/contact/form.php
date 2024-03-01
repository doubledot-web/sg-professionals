<?php $form = get_field( 'form' ); ?>

<section class="section-form uk-h4 uk-margin-large-top uk-margin-large-bottom">
	<div class="uk-container">
		<div class="form-wrapper box rounded">
			<div class="uk-margin-medium-bottom">
				<?php echo wp_kses_post( $form['text'] ); ?>
			</div>
			<?php echo do_shortcode( '[contact-form-7 id="' . esc_attr( $form['shortcode'] ) . '"]' ); ?>
		</div>
	</div>
</section>
