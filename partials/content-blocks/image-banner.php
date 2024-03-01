<?php $args = json_decode( $args ); ?>

<section class="section-image-banner uk-text-center bg-light-brass">
	<div class="uk-container uk-container-large">
		<div class="uk-background-cover uk-background-norepeat uk-height-medium uk-flex uk-flex-middle uk-flex-center" data-src="<?php echo esc_url( $args->image ); ?>" uk-img>
			<h2 class="text-theme-white font-medium uk-margin-remove">
				<?php echo wp_kses_post( $args->text ); ?>
			</h2>
		</div>
	</div>
</section>
