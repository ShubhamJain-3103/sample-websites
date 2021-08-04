<?php
/**
 * The template part for top header
 *
 * @package Digital Agency Lite 
 * @subpackage digital-agency-lite
 * @since digital-agency-lite 1.0
 */
?>

<div class="middle-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3">
        <div class="logo">
          <?php if( has_custom_logo() ){ digital_agency_lite_the_custom_logo();
            }else{ ?>
              <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?><span class="screen-reader-text"><?php bloginfo( 'name' ); ?></span></a></p>
              <?php $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) : ?>
              <p class="site-description"><?php echo esc_html($description); ?></p>
          <?php endif; } ?>
        </div>
      </div>
      <div class="col-lg-8 col-md-8 col-6">
        <?php get_template_part('template-parts/header/navigation'); ?>
      </div>
      <?php if( get_theme_mod( 'digital_agency_lite_header_search') != '') { ?>
        <div class="col-lg-1 col-md-1 col-6">
          <button type="button" class="search-box"><span><i class="fas fa-search"></i></span><span class="screen-reader-text"><?php esc_html_e('Search','digital-agency-lite'); ?></span></button>
        </div>
      <?php }?>
    </div>
    <div class="serach_outer">
      <div class="closepop"><a href="#"><i class="far fa-window-close"></i></a></div>
      <div class="serach_inner">
        <?php get_search_form(); ?>
      </div>
    </div>
  </div>
</div>