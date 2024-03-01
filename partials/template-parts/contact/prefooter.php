<?php
$blue_box = get_field( 'blue_box' );
$col1     = $blue_box['column1'];
$col2     = $blue_box['column2'];
?>
<div class="prefooter-banner">
	<div class="uk-container uk-container-large">
		<h2 class="font-medium uk-h3 uk-text-center uk-margin-bottom">
			<?php esc_html_e( 'Direct Support', 'safergambling' ); ?>
		</h2>
	</div>
	<div class="bg uk-position-relative">
		<div class="container uk-container uk-container-large">
			<div class="inner bg-theme-blue">
				<div class="uk-container">
					<div class="blocks uk-text-center uk-flex-middle uk-child-width-1-2@m" uk-grid>
						<div class="block">
							<div class="block-inner uk-flex uk-flex-middle uk-flex-center">
								<a class="uk-h2 uk-text-bold" href="tel:+<?php echo esc_html( $col1['title'] ); ?>">
									<?php echo esc_html( $col1['title'] ); ?>
								</a>
								<?php echo esc_html( $col1['text'] ); ?>
							</div>
						</div>
						<div class="block uk-position-relative">
							<div class="block-inner uk-flex uk-flex-middle uk-flex-center">
								<a class="uk-h2 uk-text-bold" href="tel:+<?php echo esc_html( $col2['title'] ); ?>">
									<?php echo esc_html( $col2['title'] ); ?>
								</a>
								<?php echo esc_html( $col2['text'] ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
