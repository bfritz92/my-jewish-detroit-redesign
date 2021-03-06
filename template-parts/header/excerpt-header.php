<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

// Don't show the title if the post-format is `aside` or `status`.
$post_format = get_post_format();
if ( 'aside' === $post_format || 'status' === $post_format ) {
	return;
}
?>

<header class="entry-header">
	<?php // - Default Thumbnail call twenty_twenty_one_post_thumbnail(); ?>
	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full' ); ?></a>
</header><!-- .entry-header -->
