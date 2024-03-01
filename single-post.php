<?php get_header(); ?>

<div id="content" class="uk-container uk-container-large">

	<div id="inner-content">

		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>

				<main id="main" class="uk-padding-large uk-padding-remove-horizontal" itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/Blog">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<div uk-grid>
							<header class="single-post-header uk-width-1-2@s">
								<div class="post-meta uk-margin-bottom uk-h6">
									<time datetime="<?php echo get_the_time( 'j F Y' ); ?>" itemprop="datePublished"><?php echo get_the_time( get_option( 'date_format' ) ); ?></time>
								</div>

								<h1 class="page-title font-medium uk-h1 uk-margin-remove" itemprop="headline"><?php the_title(); ?></h1>

								<?php
								$subtitle = get_field( 'subtitle' );
								if ( ! empty( $subtitle ) ) {
									?>
									<h2 class="uk-h4 uk-margin-top"><?php echo wp_kses_post( $subtitle ); ?></h2>
									<?php
								}
								?>
							</header>
						</div>

						<div uk-grid>
							<section class="single-post-content uk-width-2-3@m">
								<div class="single-post-img-wrapper mb-30 mb-60s">
									<div class="article-img radius-large">
										<?php
										if ( has_post_thumbnail() ) {
											the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) );
										}
										?>
									</div>
								</div>
								<section class="single-post-body">
									<?php the_content(); ?>
								</section>
							</section>
							<section class="uk-width-1-3@m">
								<?php
								$social          = get_field( 'social', 'option' );
								$social_channels = $social['channels'];
								?>
								<div class="single-post-social uk-flex uk-flex-right@s uk-flex-middle">
									<div class="mr-20 font-medium"><?php echo __( 'Share', 'safergambling' ); ?></div>
									<?php
									if ( ! empty( $social_channels ) ) :
										foreach ( $social_channels as $social_channel ) :
											?>
											<a href="" class="theme-social"><?php echo '<span uk-icon="icon: ' . esc_html( $social_channel['icon'] ) . ';ratio: 1.2;"></span>'; ?></a>
											<?php
										endforeach;
									endif;
									?>
								</div>
							</section>
						</div>
					</article>

				</main>
				<?php
			endwhile;
		endif;
		?>

	</div>

</div>

<?php get_footer(); ?>
