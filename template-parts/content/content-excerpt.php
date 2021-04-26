<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part( 'template-parts/header/excerpt-header', get_post_format() ); ?>

	<div class="entry-content">
		<h5 class="entry-date gray"><?php echo get_the_date(); ?></h5>
		<a href="<?php the_permalink(); ?>"> <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?> </a>
		<h5 class="entry-author gray"><?php the_author(); ?></h5>
		<?php get_template_part( 'template-parts/excerpt/excerpt', get_post_format() ); ?>
		<p class="entry-excerpt"><?php the_excerpt(25); ?></p>
		<a href="<?php the_permalink(); ?>">Read More</a>
	</div><!-- .entry-content -->
</article><!-- #post-${ID} -->
