<?php
/*
Template Name: Simple Page Template
*/
get_header(); ?>

<div id="contentWrapper">
	<main id="main" class="" itemprop="mainContentOfPage">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="uk-container uk-container-large">
						<div class="pt-40 pb-40 pt-70m pb-70m">
							<div uk-grid>
								<div class="uk-width-2-3@m">
									<h1 class="font-medium uk-margin-medium-bottom">
										<?php the_title(); ?>
									</h1>
									<?php the_content(); ?>
								</div>
							</div>
						</div>
					</div>
				</article>

				<?php
			endwhile;
		endif;
		?>
	</main>
</div><!-- /#contentWrapper -->

<?php
get_footer();
