<div hidden id="search-modal-form" class="search-modal-form uk-box-shadow-medium uk-visible@s">
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form-generic">
		<div class="outer">
			<div class="text-theme-white uk-h4">
				<?php esc_html_e( 'What are you looking for', 'safergambling' ); ?>
			</div>
			<div class="inner">
				<input placeholder="<?php esc_attr_e( 'Search', 'safergambling' ); ?>" type="search" class="uk-input uk-h3" name="s" value="<?php echo isset( $_GET['s'] ) ? $_GET['s'] : ''; ?>" autocomplete="off" aria-label="<?php esc_attr_e( 'Search for events, regulations, etc.', 'safergambling' ); ?>" />
				<button type="submit" aria-label="<?php esc_attr_e( 'Search for events, regulations, etc.', 'safergambling' ); ?>" class="inverse uk-button uk-button-default uk-h3 uk-margin-remove">
					<?php echo esc_html_e( 'Search', 'safergambling' ); ?>
				</button>
				<button type="button" aria-label="<?php esc_attr_e( 'Close search form', 'safergambling' ); ?>" class="btn-base" uk-toggle="target: .search-modal-form; animation: uk-animation-fade">
					<svg width="24" height="24" aria-hidden="true">
						<use xlink:href="#close"></use>
					</svg>
				</button>
			</div>
		</div>
	</form>
</div>
