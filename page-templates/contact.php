<?php
/*
Template Name: Contact Page Template
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
					<?php
					get_template_part( 'partials/template-parts/contact/hero' );
					get_template_part( 'partials/template-parts/contact/form' );
					get_template_part( 'partials/template-parts/contact/prefooter' );
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
