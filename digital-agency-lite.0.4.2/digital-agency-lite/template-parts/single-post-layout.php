<?php
/**
 * The template part for displaying single post content
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

<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <h1><?php the_title(); ?></h1>
    <div class="post-info">
        <span class="entry-date"><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span>|</span>
          <span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span>|</span>
        <span class="entry-comments"><?php comments_number( __('0 Comment', 'digital-agency-lite'), __('0 Comments', 'digital-agency-lite'), __('% Comments', 'digital-agency-lite') ); ?> </span>
    </div>
    <?php if(has_post_thumbnail()) { ?>
        <div class="feature-box">
            <img class="page-image" src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?> post thumbnail image">
            <hr>
        </div>
    <?php } ?>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
    <div class="tags-bg">
        <?php the_tags(); ?>
    </div>
        <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || '0' != get_comments_number() )
        comments_template();

        if ( is_singular( 'attachment' ) ) {
            // Parent post navigation.
            the_post_navigation( array(
                'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'digital-agency-lite' ),
            ) );
        } elseif ( is_singular( 'post' ) ) {
            // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'digital-agency-lite' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Next post:', 'digital-agency-lite' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'digital-agency-lite' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Previous post:', 'digital-agency-lite' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
            ) );
        }
    ?>
</article>