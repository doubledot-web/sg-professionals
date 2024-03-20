<?php get_header(); ?>

<div id="contentWrapper">

	<main id="main" class="" itemprop="mainContentOfPage">

		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
