<?php
/**
 * The template part for header
 *
 * @package Digital Agency Lite 
 * @subpackage digital-agency-lite
 * @since digital-agency-lite 1.0
 */
?>

<div id="header" class="menubar">	
  <div class="toggle-nav mobile-menu">
    <button onclick="openNav()"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','digital-agency-lite'); ?></span></button>
  </div>
  <div id="mySidenav" class="nav sidenav">
    <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'digital-agency-lite' ); ?>">
        <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="closeNav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','digital-agency-lite'); ?></span></a>
        <?php 
          wp_nav_menu( array( 
            'theme_location' => 'primary',
            'container_class' => 'main-menu clearfix' ,
            'menu_class' => 'clearfix',
            'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
            'fallback_cb' => 'wp_page_menu',
          ) ); 
        ?>
    </nav>
  </div>
</div>