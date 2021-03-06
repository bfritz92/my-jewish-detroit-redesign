<?php
/**
 * JFMD ACF Custom Block functionality
 *
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0.0
 */

/**
 * Prevent switching to Twenty Nineteen on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Twenty Nineteen 1.0.0
 */

function register_acf_block_types() {
   // register a front page posts block.
	acf_register_block_type(array(
      'name'              => 'front-page-posts',
      'title'             => __('Front Page Posts'),
      'description'       => __('A front page posts block.'),
      'render_template'   => get_template_directory() . '/template-parts/blocks/front-page-posts/front-page-posts.php',
      'category'          => 'common',
      'icon'              => 'admin-comments',
	  'mode'			  => 'edit',
      'keywords'          => array( 'front', 'posts' )
   ));	
	// register a front page posts block.
	acf_register_block_type(array(
      'name'              => 'fedradiodetroit',
      'title'             => __('Fed Radio Detroit Block'),
      'description'       => __('Shows the most recent Fed Radio Detroit article.'),
      'render_template'   => get_template_directory() . '/template-parts/blocks/fedradiodetroit/fedradiodetroit.php',
      'category'          => 'common',
      'icon'              => 'admin-comments',
	  'mode'			  => 'edit',
      'keywords'          => array( 'fed', 'radio', 'detroit' )
   ));
	acf_register_block_type(array(
      'name'              => 'events',
      'title'             => __('Upcoming Events'),
      'description'       => __('An events block pulling from the Community Calendar.'),
      'render_template'   => get_template_directory() . '/template-parts/blocks/events/events.php',
      'category'          => 'common',
      'icon'              => 'admin-comments',
	  'mode'			  => 'edit',
      'keywords'          => array( 'events', 'calendar' )
   ));	
	// register a front page posts block.
	acf_register_block_type(array(
      'name'              => 'tabbed-posts-block',
      'title'             => __('Tabbed Posts Block'),
      'description'       => __('Shows videos or articles in tabs.'),
      'render_template'   => get_template_directory() . '/template-parts/blocks/tabbed-posts-block/tabbed-posts-block.php',
      'category'          => 'common',
      'icon'              => 'admin-comments',
	  'mode'			  => 'edit',
      'keywords'          => array( 'tabbed', 'posts' )
   ));
}
// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
   add_action('acf/init', 'register_acf_block_types');
}
?>