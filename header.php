<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="480">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
	<meta name="theme-color" content="#fff">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

	<?php
	if ( is_post_type_archive( array( 'resource', 'event', 'programme', 'regulation', 'research' ) ) ) :
		$type         = get_archive_post_type();
		$related_page = get_field( 'pages', 'option' )[ $type ];
	else :
		$related_page = '';
	endif;

	get_template_part( 'partials/svg-sprites' );
	get_template_part( 'partials/template-parts/header/offcanvas-nav', null, array( 'related_page' => $related_page ) );
	get_template_part( 'partials/search-modal-form' );
	?>

	<div id="container"> <?php // closes in footer.php ?>

		<header class="header uk-position-relative" itemscope itemtype="http://schema.org/WPHeader">
			<?php
			get_template_part( 'partials/template-parts/header/top-content', null, array( 'related_page' => $related_page ) );
			get_template_part( 'partials/template-parts/header/main-nav', null, array( 'related_page' => $related_page ) );
			?>
		</header>
