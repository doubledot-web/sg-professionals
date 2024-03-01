<?php
$args  = json_decode( $args );
$boxes = $args->boxes;

if ( empty( $boxes ) ) :
	return;
endif;
?>

<section class="section-alternate-colored-boxes">
	<?php
	foreach ( $boxes as $key => $box ) :
		$box_extra_classes = 0 === $key % 2 ? 'with-right-offset bg-theme-blue' : 'with-left-offset bg-theme-brass';
		$grid_extra_class  = 0 === $key % 2 ? 'uk-flex-right@m' : 'uk-flex-left@s';
		$col_img_class     = 0 === $key % 2 ? ' uk-flex-first uk-flex-last@s' : '';
		?>
		<div class="box <?php echo $box_extra_classes; ?> text-theme-white bg-theme-blue uk-margin-remove-bottom">
			<div class="uk-grid-large uk-flex-middle uk-flex-center <?php echo $grid_extra_class; ?>" uk-grid>
				<div class="uk-width-1-2@s uk-width-auto@m<?php echo $col_img_class; ?>">
					<figure class="el uk-text-center uk-margin-remove">
						<?php echo wp_get_attachment_image( $box->image, 'full' ); ?>
					</figure>
				</div>
				<div class="uk-width-1-2@s uk-flex uk-flex-center uk-width-auto@m">
					<div>
						<div class="text remove-margin-from-last-el uk-margin-medium-bottom">
							<h2 class="el">
								<?php echo esc_html( $box->title ); ?>
							</h2>
							<p class="el">
								<?php echo esc_html( $box->text ); ?>
							</p>
						</div>
						<div class="el">
							<a class=" white uk-button uk-button-default" href="<?php echo esc_url( $box->link->url ); ?>" target="<?php echo ! empty( $box->link->target ) ? esc_url( $box->link->target ) : ''; ?>">
								<?php esc_html_e( 'Learn More', 'safergamlbing' ); ?> →
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</section>
