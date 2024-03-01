<section class="hero">
	<div class="uk-container">
		<div class="hero-inner">
			<div class="uk-grid-large" uk-grid>
				<div class="uk-width-1-1 uk-width-expand@s">
					<div class="text remove-margin-from-last-el">
						<?php the_content(); ?>
					</div>
				</div>
				<div class="uk-width-1-1 uk-width-auto@s">
					<div class="footer-widget-wrapper">
						<div class="uk-h3 uk-text-bold uk-margin-remove">Safer Gambling</div>
						<?php
						if ( is_active_sidebar( 'footer-info' ) ) :
							dynamic_sidebar( 'footer-info' );
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
