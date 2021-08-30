<?php
/**
 * Fed Readio Detroit Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'fedreadiodetroit-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'fedreadiodetroit';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {{}
   $className .= ' align' . $block['align'];
}
$fedradiologo = get_field('fedradiologo'); 
$subscribe_link = get_field('subscribe_link');
$fedradioclass =  get_field('fedradioclass');

$args = array(
	'category_name'		=> 'fedradiodetroit',
	'post_status'		=> 'publish',
	'posts_per_page' 	=> 1,
    'order'    			=> $order,
	'orderby'    		=> $orderby,
);
query_posts( $args );
?>
<!--Markup for Recent Posts -->
<?php 
	$loop = new WP_Query( $args ); 
?>

<?php 
	if ( $loop->have_posts() ):
		while ( $loop->have_posts() ) : $loop->the_post(); 
?>
	<article class="<?php echo $fedradioclass; ?>">
		<img src="<?php echo $fedradiologo; ?>">
		<h3>Featured Podcast</h3>
		<h2>FedRadio Detroit</h2>
		<a href="<?php echo $subscribe_link ?>">Subscribe</a>
		<div class="post-info">
			<img src="<?php the_post_thumbnail_url(); ?>">
        	<h5><?php echo the_excerpt(); ?></h5>
			<a href="<?php the_permalink(); ?>">Listen Now</a>
		</div>
	</article>
<?php
	endwhile;
?>
<?php 
	wp_reset_query(); 
	endif;
?>