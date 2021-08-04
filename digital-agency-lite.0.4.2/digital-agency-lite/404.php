<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Digital Agency Lite
 */

get_header(); ?>

<div class="container">
	<main id="maincontent" role="main">
    	<h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404','digital-agency-lite' ), esc_html__( 'Not Found', 'digital-agency-lite' ) ) ?></h1>
		<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn&hellip', 'digital-agency-lite' ); ?></p>
		<p class="text-404"><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'digital-agency-lite' ); ?></p>
		<div class="more-btn">
	        <a href="<?php echo esc_url(home_url()); ?>"><?php esc_html_e( 'Go Back', 'digital-agency-lite' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Go Back', 'digital-agency-lite' ); ?></span></a>
	    </div>
		<div class="clearfix"></div>
	</main>
</div>

<?php get_footer(); ?>