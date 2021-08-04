<?php
/**
 * The template part for displaying grid post
 *
 * @package Digital Agency Lite
 * @subpackage digital-agency-lite
 * @since digital-agency-lite 1.0
 */
?>

<div class="col-lg-4 col-md-4">
	<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
	    <div class="post-main-box">
	      	<div class="box-image">
	          	<?php 
		            if(has_post_thumbnail()) { 
		              the_post_thumbnail(); 
		            }
	          	?>
	        </div>
	        <h3 class="section-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
	        <div class="new-text">
	        	<p><?php the_excerpt();?></p>
	        </div>
	        <div class="more-btn">
          		<a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'READ MORE', 'digital-agency-lite' ); ?><span class="screen-reader-text"><?php the_title(); ?></span></a>
        	</div>
	    </div>
	    <div class="clearfix"></div>
  	</article>
</div>