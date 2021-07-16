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

	<header class="entry-header default-max-width">
		<?php twenty_twenty_one_post_thumbnail(); ?>
		
		<h5 class="entry-date gray"><?php echo get_the_date(); ?></h5>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<h4 class="entry-excerpt gray"><?php the_excerpt(); ?></h4>
		<h5 class="entry-author"><?php the_author(); ?></h5>
		
		
	</header><!-- .entry-header -->

	<div class="entry-content">
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
            <a href="<?php the_permalink()?>"><img src="<?php the_post_thumbnail(); ?>" class="related-articles--item--img"></a>
            <a href="<?php the_permalink()?>"><h3 class="related-articles--item--title"><?php the_title(); ?></h3></a>
            <p class="related-articles--item--excerpt"><?php the_excerpt(); ?></p>
            <a href="<?php the_permalink()?>" class="related-articles--item--link">Link</a>
        </div>
        <?php }
          }
            $post = $orig_post;
            wp_reset_query();
        ?>
    </section>

	<?php if ( ! is_singular( 'attachment' ) ) : ?>
		<?php get_template_part( 'template-parts/post/author-bio' ); ?>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
