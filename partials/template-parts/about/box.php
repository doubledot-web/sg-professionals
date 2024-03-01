<?php
$box    = get_field( 'box' );
$blocks = $box['blocks'];
?>
<section class="section-text">
	<div class="uk-container uk-container-large">
		<div class="box rounded text-theme-white bg-theme-brass">
			<div class="mb-20 mb-60s uk-text-center uk-container uk-container-small uk-padding-remove-horizontal">
				<?php echo wp_kses_post( $box['centered_text'] ); ?>
			</div>

			<hr class="uk-margin-remove">

			<?php
			$last_block = end( $blocks );
			foreach ( $blocks as $key => $block ) :
				$initial_key = $key;
				$id          = 'about-' . ++$key;
				if ( 0 === $initial_key ) :
					?>
					<figure class="mt-20 mt-40s">
						<?php the_post_thumbnail( 'full' ); ?>
					</figure>
				<?php endif; ?>
				<div class="box-<?php echo $id; ?> mt-20 mt-40s uk-width-2-3@m">
					<h2 class="font-medium text-theme-white mb-20 mb-40s">
						<?php echo esc_html( $block['title'] ); ?>
					</h2>
					<div class="mb-20 mb-40s remove-margin-from-last-el">
						<?php echo wp_kses_post( $block['intro_text'] ); ?>
					</div>

					<button class="box-more-btn font-bold white uk-button uk-button-default" data-target="<?php echo $id; ?>">
						<span class="more"><?php esc_html_e( 'More', 'safergambling' ); ?> ↓</span>
						<span class="less"><?php esc_html_e( 'Less', 'safergambling' ); ?> ↑</span>
					</button>

					<div class="full-text text-<?php echo $id; ?> pt-20 pt-40s remove-margin-from-last-el">
						<?php echo wp_kses_post( $block['full_text'] ); ?>
					</div>
				</div>
				<?php if ( $last_block !== $block ) : ?>
					<hr class="mt-20 mt-40s">
					<?php
				endif;
			endforeach;
			?>
		</div>
	</div>
</section>
