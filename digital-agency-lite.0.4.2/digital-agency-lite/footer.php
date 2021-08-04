<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Digital Agency Lite
 */
?>

    <footer role="contentinfo">
        <aside id="footer" class="copyright-wrapper" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'digital-agency-lite' ); ?>">

            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <?php dynamic_sidebar('footer-1');?>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <?php dynamic_sidebar('footer-2');?>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <?php dynamic_sidebar('footer-3');?>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <?php dynamic_sidebar('footer-4');?>
                    </div>
                </div>
            </div>
        </aside>
        <div id="footer-2">
          	<div class="copyright container">
                <?php
                    if ( function_exists( 'the_privacy_policy_link' ) ) {
                        the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
                    }
                ?>
                <p><?php echo esc_html(get_theme_mod('digital_agency_lite_footer_text',__('Digital Agency WordPress Theme By VWThemes','digital-agency-lite'))); ?>
                </p>
                <?php if( get_theme_mod( 'digital_agency_lite_footer_scroll') != '') { ?>              
                    <div class="scrollup"><i class="fas fa-long-arrow-alt-up"></i></div>
                <?php }?>
          	</div>
          	<div class="clear"></div>
        </div>
    </footer>
        <?php wp_footer(); ?>

    </body>
</html>