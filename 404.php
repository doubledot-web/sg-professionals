<?php get_header(); ?>

<div id="contentWrapper">
	<main id="main" class="" itemprop="mainContentOfPage">
		<section class="section section-text uk-padding-large uk-padding-remove-horizontal">
			<div class="uk-container uk-container-small">
				<h1>
					<?php esc_html_e( 'Page Not Found', 'safergambling' ); ?>
				</h1>
				<p class="uk-h3 uk-margin-remove">
					<?php esc_html_e( 'Ooops, we couldn’t find that! The page you requested does not exist. <br> Return to homepage or check the menu to find what you are looking for.', 'safergambling' ); ?>
				</p>
			</div>
		</section>
	</main>
</div>

<?php get_footer(); ?>
