<?php
$term       = get_queried_object();
$queried_id = ! empty( $term->term_id ) ? $term->taxonomy . '_' . $term->term_id : $term->ID;

if ( have_rows( 'content_blocks', $queried_id ) ) :
	while ( have_rows( 'content_blocks', $queried_id ) ) :
		the_row();
		$fields = json_encode( get_sub_field( 'fields' ) );
		$layout = str_replace( '_', '-', get_row_layout() );
		get_template_part( 'partials/content-blocks/' . $layout, null, $fields );
	endwhile;
endif;
