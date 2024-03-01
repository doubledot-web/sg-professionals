<?php get_header(); ?>

<div id="contentWrapper">
	<main id="main" class="" itemprop="mainContentOfPage">
		<div class="uk-container uk-container-small uk-margin-large-top uk-margin-large-bottom">
			<h1 class="text-theme-brass font-medium">
				<?php esc_html_e( 'Search Results', 'safergambling' ); ?>
			</h1>

			<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search search-form-generic">
				<input placeholder="<?php esc_attr_e( 'Search', 'safergambling' ); ?>" type="search" class="uk-input uk-h3" name="s" value="<?php echo isset( $_GET['s'] ) ? $_GET['s'] : ''; ?>" autocomplete="off" aria-label="<?php esc_attr_e( 'Search for events, regulations, etc.', 'safergambling' ); ?>" />
			</form>

			<section class="posts-section uk-margin-large-top">
				<?php
				if ( have_posts() ) :
					?>
					<div class="posts-grid">
						<?php
						while ( have_posts() ) :
							the_post();
							?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<h2 class="text-theme-brass font-medium">
									<?php the_title(); ?>
								</h2>

								<div class="remove-margin-from-last-el">
									<?php the_content(); ?>
								</div>

								<?php if ( get_field( 'external_link' ) ) : ?>
									<a class="uk-button uk-button-default uk-margin-medium-top" href="<?php echo esc_url( get_field( 'external_link' ) ); ?>" target="_blank">
										<?php esc_html_e( 'Read more', 'safergambling' ); ?> →
									</a>
								<?php endif; ?>
							</article>
						<?php endwhile; ?>
					</div>

					<?php
					$all_posts_count        = get_all_posts();
					$all_posts_current_page = get_all_posts_current_page();
					if ( $all_posts_count > $all_posts_current_page ) :
						?>

						<div class="uk-margin-large-top">
							<nav class="uk-flex uk-flex-center" aria-label="<?php esc_attr_e( 'Search posts pagination', 'safergambling' ); ?>">
								<h3 class="screen-reader-text">
									<?php esc_html_e( 'Search posts pagination', 'safergambling' ); ?>
								</h3>
								<div class="nav-links">
									<?php
									echo paginate_links(
										array(
											'prev_text' => '<span class="screen-reader-text">' . __( 'Newer Posts', 'safergambling' ) . '</span>
											<svg width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M8 12L2 6.4956L8 1" stroke="#1459A4" stroke-width="2" stroke-miterlimit="10"/>
											</svg>',
											'next_text' => '<span class="screen-reader-text">' . __( 'Older Posts', 'safergambling' ) . '</span>
											<svg width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M1 1L7 6.5044L1 12" stroke="#1459A4" stroke-width="2" stroke-miterlimit="10"/>
											</svg>
											</span>',
										)
									);
									?>
								</div>
							</nav>
						</div>

						<?php
						endif;
					else :
						?>
					<p class="uk-h3 uk-margin-remove">
						<?php esc_html_e( 'Nothing found for this search! Please try searching for something different!', 'safergambling' ); ?>
					</p>
				<?php endif; ?>
			</section>
		</div>
	</main>
</div>



<?php get_footer(); ?>
