<?php
$args = json_decode( $args );

if ( empty( $args->blocks ) ) {
	return;
}

$blocks_count = count( $args->blocks );
?>

<!-- <section class="theme-section rich-text uk-padding-large uk-remove-padding-horizontal<?php // echo $section_bg_color; ?>"> -->
<section class="theme-section rich-text uk-margin-large-bottom<?php // echo $section_bg_color; ?>">
	<div class="rich-text-container uk-container uk-container-small uk-text-center">
		<?php
		foreach ( $args->blocks as $key => $block ) {
			?>
			<div class="rich-text-block remove-margin-from-last-el <?php echo ! empty( $block->text_size ) ? esc_attr( $block->text_size ) : 'uk-h3'; ?>">
				<?php echo $block->text; ?>
			</div>
			<?php
		}
		?>
	</div>
</section>
