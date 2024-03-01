<?php get_header(); ?>

<div id="contentWrapper">

	<main id="main" class="" itemprop="mainContentOfPage">

		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<!-- <div class="uk-container uk-container-expand" style="height: 300px; border: 1px solid black">
						<h1 class="uk-h1 font-medium">Safer Gambling</h1>
					</div>
					<div class="uk-container uk-container-xlarge" style="height: 300px; border: 1px solid black; border-top: none;">
						<h2 class="uk-h2 font-medium">Safer Gambling</h2>
					</div>
					<div class="uk-container uk-container-large" style="height: 300px; border: 1px solid black; border-top: none;">
						<h3 class="uk-h3 font-medium">Safer Gambling</h3>
					</div>
					<div class="uk-container" style="height: 300px; border: 1px solid black; border-top: none;">
						<h4 class="uk-h4 font-medium">Safer Gambling</h4>
					</div>
					<div class="uk-container uk-container-small" style="height: 300px; border: 1px solid black; border-top: none;">
						<h5 class="uk-h5 font-medium">Safer Gambling</h5>
					</div>
					<div class="uk-container uk-container-xsmall" style="height: 300px; border: 1px solid black; border-top: none;">
						<h6 class="uk-h6 font-medium">Safer Gambling</h6>
					</div>
					<div class="uk-container uk-container-">
						<div><p>Safer Gambling</p></div>
					</div> -->
					<?php
					get_template_part( 'partials/content-blocks/init' );
					?>
				</article>

				<?php
			endwhile;
		endif;
		?>

	</main>
</div><!-- /#contentWrapper -->

<?php
get_footer();
