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
$id = 'fedradiodetroit-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'fedradiodetroit';
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
	'cat'		=> '310',
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
	<h2 class="alignwide">Listen</h2>
	<article class="alignwide <?php echo $fedradioclass; ?>">
		<div class="front-page-fedradio--info">
			<img src="<?php echo $fedradiologo; ?>">
			<div class="front-page-fedradio--info--container">	
				<h3>Featured Podcast</h3>
				<h2>FedRadio Detroit</h2>
				<div class="wp-block-button is-style-outline"><a href="#" class="wp-block-button__link subscribe-button">Subscribe</a></div>
			</div>
		</div>
		<div class="front-page-fedradio--post">
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