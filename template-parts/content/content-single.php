<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

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
            <!-- <h4 class="entry-excerpt"><?php the_excerpt(); ?></h4> -->
            <h5 class="entry-author">By <?php the_author(); ?></h5>
            <h5 class="entry-date"><?php echo get_the_date(); ?></h5>
        </div>
        <hr />
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
    <hr class="wp-block-separator">
	<footer class="entry-footer default-max-width">
		<?php twenty_twenty_one_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->
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
                <?php the_excerpt( '<p class="entry-excerpt">', '</p>' ); ?>
                <a href="<?php the_permalink()?>" class="related-articles--item--link">Read More</a>
            </div>
        </div>
        <?php }
          }
            $post = $orig_post;
            wp_reset_query();
        ?>
    </section>

</article><!-- #post-<?php the_ID(); ?> -->
