<?php
$args  = json_decode( $args );
$items = $args->items;
if ( empty( $items ) ) :
	return;
endif;
?>

<section class="section-accordion-slider uk-margin-large-bottom">
	<div class="accordion-wrapper uk-visible@s">
		<div class="uk-container">
			<ul>
				<?php
				foreach ( $items as $key => $item ) :
					$is_first_active = 0 === $key ? 'class="active"' : '';
					$is_first_style  = 0 === $key ? 'style="display: block"' : '';
					?>
					<li <?php echo $is_first_active; ?>>
						<div class="uk-flex-middle uk-position-relative" uk-grid>
							<div class="uk-width-1-2">
								<h2 class="title font-medium uk-margin-remove" href>
									<?php echo esc_html( $item->title ); ?>
								</h2>
								<div class="content"<?php echo $is_first_style; ?>>
									<div class="remove-margin-from-last-el uk-margin-medium-bottom">
										<?php echo wp_kses_post( $item->text ); ?>
									</div>
									<a class="white uk-button uk-button-default" href="<?php echo esc_url( $item->link->url ); ?>" target="<?php echo ! empty( $item->link->target ) ? esc_url( $item->link->target ) : ''; ?>">
										<?php esc_html_e( 'Find out more', 'safergambling' ); ?> →
									</a>
								</div>
							</div>
							<div class="uk-flex uk-flex-right uk-width-1-2">
								<figure class="front uk-margin-remove">
									<?php echo wp_get_attachment_image( $item->image1, 'full', false, array( 'class' => 'img-front' ) ); ?>
								</figure>
								<figure class="uk-margin-remove">
									<?php echo wp_get_attachment_image( $item->image2, 'full', false, array( 'class' => 'img-back' ) ); ?>
								</figure>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>

	<div class="slider-wrapper uk-hidden@s">
		<div class="uk-container">
			<div uk-slider>
				<ul class="uk-slider-items">
					<?php
					foreach ( $items as $key => $item ) :
						$is_first_active = 0 === $key ? 'class="active"' : '';
						$is_first_style  = 0 === $key ? 'style="display: block"' : '';
						?>
						<li class="slide uk-flex uk-width-4-5 uk-margin-remove">
							<div class="box rounded rounded-sm">
								<figure class="img-wrapper uk-margin-remove">
									<?php
									echo wp_get_attachment_image( $item->image1, 'full', false, array( 'class' => 'img-front' ) );
									echo wp_get_attachment_image( $item->image2, 'full', false, array( 'class' => 'img-back' ) );
									?>
								</figure>
								<h2 class="title font-medium uk-margin-medium-top uk-margin-bottom" href>
									<?php echo esc_html( $item->title ); ?>
								</h2>
								<div class="content">
									<div class="remove-margin-from-last-el uk-margin-xlarge-bottom">
										<?php echo wp_kses_post( $item->text ); ?>
									</div>
									<a class="uk-button uk-button-default" href="<?php echo esc_url( $item->link->url ); ?>" target="<?php echo ! empty( $item->link->target ) ? esc_url( $item->link->target ) : ''; ?>">
										<?php esc_html_e( 'Find out more', 'safergambling' ); ?> →
									</a>
								</div>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>

				<ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-medium-top"></ul>
			</div>
		</div>
	</div>
</section>


