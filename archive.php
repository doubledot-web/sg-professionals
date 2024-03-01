<?php
get_header();
$type                = get_archive_post_type();
$related_page        = get_field( 'pages', 'option' )[ $type ];
$extra_section_class = 'regulation' === $type || 'research' === $type ? ' section-with-boxes' : '';

$color_mapping = array(
	'programme'  => '',
	'event'      => '',
	'resource'   => 'brass ',
	'regulation' => '',
	'research'   => '',
);
?>

<div id="contentWrapper">
	<main id="main" itemprop="mainContentOfPage">
		<?php
		show_page_content_blocks_by_id( $related_page );
		?>

		<?php
		/*
		if ( '' !== get_post( $related_page )->post_content ) :
			?>
			<section class="section-intro uk-margin-large-top">
				<div class="uk-container uk-container-small">
					<div class="remove-margin-from-last-el uk-h3 uk-text-center uk-margin-remove">
						<?php echo apply_filters( 'the_content', get_post_field( 'post_content', $related_page ) ); ?>
					</div>
				</div>
			</section>
		<?php endif; ?>*/
		?>

		<section class="posts-section<?php echo $extra_section_class; ?> uk-margin-large-bottom">
			<?php
			if ( have_posts() ) :
				?>
				<div class="uk-container uk-container-small">

					<?php
					if ( 'resource' !== $type ) :
						get_template_part( 'partials/template-parts/archive/sort' );
					endif;
					?>

					<div class="posts-grid">
						<?php
						while ( have_posts() ) :
							the_post();

							if ( 'regulation' === $type || 'research' === $type ) :
								get_template_part( 'partials/template-parts/archive/post-box' );
							else :
								get_template_part( 'partials/template-parts/archive/post-img-text' );
							endif;
						endwhile;
						?>
					</div>
				</div>
				<?php
				if ( get_next_posts_link() ) :
					?>
					<div class="uk-flex uk-flex-center uk-margin-large-top">
						<a class="btn-load-more <?php echo esc_attr( $color_mapping[ $type ] ); ?>inverse uk-button uk-button-default" href="<?php echo esc_url( get_next_posts_page_link() ); ?>">
							<span>
								<?php esc_html_e( 'Load More', 'safegambling' ); ?>
							</span> ↓
						</a>
					</div>
					<?php
				endif;
			else :
				?>
				<div class="uk-container uk-text-center">
					<p class="uk-h3 uk-margin-remove">
						<?php esc_html_e( 'Nothing found for this search! Please try searching for something different!', 'safergambling' ); ?>
					</p>
				</div>
				<?php
			endif
			?>
		</section>
	</main>
</div><!-- /#contentWrapper -->

<?php
get_footer();
