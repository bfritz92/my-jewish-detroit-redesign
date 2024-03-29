<?php
/**
 * Template Name Posts: Fed Radio Detroit (Single Post)
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<header class="entry-header alignwide">
		<?php // - Default Thumbnail call twenty_twenty_one_post_thumbnail(); ?>
        
		<?php the_post_thumbnail( 'full' ); ?>
       
		
		
		
	</header><!-- .entry-header -->

	<div class="entry-content">
        <div class="post-info">
            <p class="entry-category"><?php echo get_the_category_list(); ?></p>
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            <!--The Excerpt--><h4 class="entry-excerpt"><?php the_excerpt(); ?></h4>
            <h5 class="entry-author">By <?php the_author(); ?></h5>
            <h5 class="entry-date"><?php echo get_the_date(); ?></h5>
        </div>
        <hr /><!-- .entry-header -->

	<div class="fedradio entry-content">
		<a class="spreaker-player alignwide" href="http://www.spreaker.com/episode/<?php the_field ('podcast_embed'); ?>" data-resource="episode_id=<?php the_field ('podcast_embed'); ?>" data-width="100%" data-height="200px" data-theme="light" data-playlist="false" data-playlist-continuous="false" data-autoplay="false" data-live-autoplay="false" data-chapters-image="true" data-episode-image-position="right" data-hide-logo="false" data-hide-likes="false" data-hide-comments="false" data-hide-sharing="false" data-hide-download="true">Listen to "<?php the_title(); ?>"</a>
		<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'twentytwentyone' ) . '">',
				'after'    => '</nav>',
				/* translators: %: Page number. */
				'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer default-max-width">
		<?php twenty_twenty_one_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php if ( ! is_singular( 'attachment' ) ) : ?>
		<?php get_template_part( 'template-parts/post/author-bio' ); ?>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
<?php	

	if ( is_attachment() ) {
		// Parent post navigation.
		the_post_navigation(
			array(
				/* translators: %s: Parent post link. */
				'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentytwentyone' ), '%title' ),
			)
		);
	}


	// Previous/next post navigation.
	$twentytwentyone_next = is_rtl() ? twenty_twenty_one_get_icon_svg( 'ui', 'arrow_left' ) : twenty_twenty_one_get_icon_svg( 'ui', 'arrow_right' );
	$twentytwentyone_prev = is_rtl() ? twenty_twenty_one_get_icon_svg( 'ui', 'arrow_right' ) : twenty_twenty_one_get_icon_svg( 'ui', 'arrow_left' );

	$twentytwentyone_next_label     = esc_html__( 'Next post', 'twentytwentyone' );
	$twentytwentyone_previous_label = esc_html__( 'Previous post', 'twentytwentyone' );

	the_post_navigation(
		array(
			'next_text' => '<p class="meta-nav">' . $twentytwentyone_next_label . $twentytwentyone_next . '</p><p class="post-title">%title</p>',
			'prev_text' => '<p class="meta-nav">' . $twentytwentyone_prev . $twentytwentyone_previous_label . '</p><p class="post-title">%title</p>',
		)
	);
endwhile; // End of the loop.
?>

<div class="alignwide related-articles--heading">
        <h3>You may also like...</h3>
    </div>
	<section class="related-articles alignwide">
	    <?php
            $orig_post = $post;
            global $post;
            $tags = wp_get_post_tags($post->ID);
           
            if ($tags) {
                $tag_ids = array();
                foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
                $args=array(
                    'tag__in' => $tag_ids,
                    'post__not_in' => array($post->ID),
                    'posts_per_page'=>3, // Number of related posts to display.
                    'caller_get_posts'=>1
                );
           
            $my_query = new wp_query( $args );
         
            while( $my_query->have_posts() ) {
                $my_query->the_post();
        ?>
        <div class="related-articles--item">
            
            <a href="<?php the_permalink()?>" class="related-articles--item--img"><?php the_post_thumbnail(); ?></a>
            <div class="related-articles--item--content">
                <a href="<?php the_permalink()?>"><h3 class="related-articles--item--title"><?php the_title(); ?></h3></a>
                <!-- <?php the_excerpt( '<p class="entry-excerpt">', '</p>' ); ?> -->
                <a href="<?php the_permalink()?>" class="related-articles--item--link">Read More</a>
            </div>
        </div>
        <?php }
          }
            $post = $orig_post;
            wp_reset_query();
        ?>
    </section>


	<?php get_footer();
