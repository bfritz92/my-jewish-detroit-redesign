<?php
/**
 * Show the excerpt.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */


<h5 class="entry-date gray"><?php echo get_the_date(); ?></h5>
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
		<h4 class="entry-excerpt gray"><?php the_excerpt(); ?></h4>
		<h5 class="entry-author"><?php the_author(); ?></h5>