<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="box rounded rounded-sm">
		<div class="inner">
			<h2 class="font-medium">
				<?php the_title(); ?>
			</h2>
			<time class="text-theme-brass uk-display-inline-block uk-margin-bottom" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
				<?php echo esc_html( get_the_date( 'F Y' ) ); ?>
			</time>
			<div class="remove-margin-from-last-el">
				<?php the_content(); ?>
			</div>

			<?php if ( get_field( 'more_text' ) ) : ?>
				<button class="box-more-btn font-bold uk-button uk-button-default  uk-margin-medium-top" data-target="<?php the_ID(); ?>">
					<span class="more"><?php esc_html_e( 'More', 'safergambling' ); ?> ↓</span>
					<span class="less"><?php esc_html_e( 'Less', 'safergambling' ); ?> ↑</span>
				</button>
				<div class="full-text text-<?php the_ID(); ?> uk-margin-medium-top">
					<div class="remove-margin-from-last-el">
						<?php the_field( 'more_text' ); ?>
					</div>

					<a class="uk-button uk-button-default uk-margin-medium-top" href="<?php echo esc_url( get_field( 'external_link' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Find out more', 'safergambling' ); ?> →
					</a>
				</div>
				<?php
			else :
				?>
				<a class="uk-button uk-button-default uk-margin-medium-top" href="<?php echo esc_url( get_field( 'external_link' ) ); ?>" target="_blank">
					<?php esc_html_e( 'Find out more', 'safergambling' ); ?> →
				</a>
				<?php
			endif;
			?>
		</div>
	</div>
</article>


