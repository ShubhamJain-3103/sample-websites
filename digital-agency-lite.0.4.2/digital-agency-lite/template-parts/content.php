<?php
/**
 * The template part for displaying post
 *
 * @package Digital Agency Lite 
 * @subpackage digital-agency-lite
 * @since digital-agency-lite 1.0
 */
?>

<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box">
    <div class="row m-0">
      <?php if(has_post_thumbnail()) {?>
        <div class="box-image col-lg-6 col-md-6">
          <?php the_post_thumbnail(); ?>
        </div>
      <?php } ?>
      <article class="new-text <?php if(has_post_thumbnail()) { ?>col-lg-6 col-md-6" <?php } else { ?>col-lg-12 col-md-12" <?php } ?>>
        <h3 class="section-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
        <div class="post-info">
          <span class="entry-date"><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span>|</span>
          <span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span>|</span>
          <span class="entry-comments"><?php comments_number( __('0 Comment', 'digital-agency-lite'), __('0 Comments', 'digital-agency-lite'), __('% Comments', 'digital-agency-lite') ); ?></span>
        </div>
        <p><?php $excerpt = get_the_excerpt(); echo esc_html( digital_agency_lite_string_limit_words( $excerpt,20 ) ); ?></p>
        <div class="more-btn">
          <a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'READ MORE', 'digital-agency-lite' ); ?><span class="screen-reader-text"><?php the_title(); ?></span></a>
        </div>
      </article>
    </div>
  </div>
</div>