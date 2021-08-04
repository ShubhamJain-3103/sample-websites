<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-vw">
 *
 * @package Digital Agency Lite
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>
	  	<meta charset="<?php bloginfo( 'charset' ); ?>">
	  	<meta name="viewport" content="width=device-width">
	  	<link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'digital-agency-lite' ) ); ?>">
	  	<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>

		<header role="banner">
			<a class="screen-reader-text skip-link" href="#maincontent" ><?php esc_html_e( 'Skip to content', 'digital-agency-lite' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Skip to content', 'digital-agency-lite' ); ?></span></a>
			<div class="home-page-header">
				<?php get_template_part('template-parts/header/middle-header'); ?>
			</div>
		</header>