<?php
$sort_array = array(
	(object) array(
		'class' => '',
		'name'  => esc_html__( 'Newest to Oldest', 'safergambling' ),
		'slug'  => 'newest',
	),
	(object) array(
		'class' => '',
		'name'  => esc_html__( 'Oldest to Newest', 'safergambling' ),
		'slug'  => 'oldest',
	),
);
?>

<div class="uk-flex-between uk-flex-middle uk-margin-large-bottom" uk-grid>
	<div class="font-medium uk-h3 uk-margin-remove">
		<?php esc_html_e( 'Search results', 'safergambling' ); ?>
	</div>
	<div class="uk-flex uk-flex-middle">
		<span class="uk-margin-small-right uk-visible@s">
			<?php esc_html_e( 'Sort by', 'safergambling' ); ?>
		</span>
		<div class="sort-by uk-inline">
			<button class="uk-button uk-button-default uk-flex uk-flex-middle" type="button">
				<?php esc_html_e( 'Date Created', 'safergambling' ); ?>
				<svg class="uk-margin-small-left" width="14" height="9" aria-hidden="true">
					<use xlink:href="#chevron-right"></use>
				</svg>
			</button>
			<div uk-dropdown>
				<ul class="uk-list">
					<?php
					$active_class  = ! isset( $_GET['sort'] ) ? 'uk-active ' : '';
					$active_class2 = isset( $_GET['sort'] ) && 'oldest' === $_GET['sort'] ? 'uk-active ' : '';
					?>
					<li class="<?php echo esc_attr( $active_class ); ?>">
						<a href="<?php echo esc_url( remove_query_arg( 'sort' ) ); ?>">
							<?php esc_html_e( 'Newest to Oldest', 'safergambling' ); ?>
						</a>
					</li>
					<li class="<?php echo esc_attr( $active_class2 ); ?>">
						<a href="<?php echo esc_url( add_query_arg( 'sort', 'oldest' ) ); ?>">
							<?php esc_html_e( 'Oldest to Newest', 'safergambling' ); ?>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

