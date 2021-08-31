<?php
/**
 * Front Page Posts Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'front-page-posts-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'front-posts';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {{}
   $className .= ' align' . $block['align'];
}
$select_posts = get_field('select_posts'); 
$post_type = get_field('post_type'); // Featured, Below top story, Image on Top, Image on Right

$need_photo = get_field('need_photo'); // Do we need the featured image?
$need_excerpt = get_field('need_excerpt'); // Do we need the excerpt?

if ($post_type == 'featured') :
	$article_class = 'front-page-featured';
elseif ($post_type == 'below-featured') :
	$article_class = 'front-page-below-featured';
elseif ($post_type == 'image-top') :
	$article_class = 'front-page-image-top';
elseif ($post_type == 'image-right') :
	$article_class = 'front-page-image-right';
else :
	$article_class = 'front-page-photo-gallery';
endif;

$post_id = $select_posts;
$args = array(
   // 'post_type' 		=> $post_type,
	'p'					=> $post_id, 
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
	<article class="<?php echo $article_class; ?>">
	<?php if ($need_photo = 'yes') : ?>
		<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>"></a>
	<?php endif; ?>
		<div class="post-info">
			<!-- <?php echo get_the_category_list(); ?> -->
        	<h5 class="entry-date gray"><?php echo get_the_date(); ?></h5>
			<a href="<?php the_permalink(); ?>"><?php the_title( '<h2 class="entry-title">', '</h2>' ); ?></a>
        	<?php if ($need_excerpt = 'yes') : ?>
				<h4 class="entry-excerpt gray"><?php the_excerpt(); ?></h4>
			<?php endif; ?>
        	<h5 class="entry-author"><?php the_author(); ?></h5>
		</div>
	</article>
<?php
	endwhile;
?>
<?php 
	wp_reset_query(); 
	endif;
?>