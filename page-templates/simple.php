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
					<div class="uk-container uk-container-large uk-margin-large-top uk-margin-large-bottom">
						<div class="max-width-780">
							<h1 class="font-medium uk-margin-medium-bottom">
								<?php the_title(); ?>
							</h1>
							<?php the_content(); ?>
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
