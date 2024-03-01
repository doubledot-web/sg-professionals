<?php
function show_page_content_blocks_by_id( $id ) {
	if ( have_rows( 'content_blocks', $id ) ) :
		while ( have_rows( 'content_blocks', $id ) ) :
			the_row();
			$fields = json_encode( get_sub_field( 'fields' ) );
			$layout = str_replace( '_', '-', get_row_layout() );
			get_template_part( 'partials/content-blocks/' . $layout, null, $fields );
		endwhile;
	endif;
}

function find_object_by_id( $array, $slug ) {
	foreach ( $array as $element ) :
		if ( $slug === $element->slug ) :
			return $element;
		endif;
	endforeach;
	return false;
}
