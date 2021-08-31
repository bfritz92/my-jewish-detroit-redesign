<?php
/**
 * Tabbed Posts Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'tabbed-posts-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'tabbed-posts';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {{}
   $className .= ' align' . $block['align'];
}
$type_posts = get_field('type_posts'); // Type of Posts: Video or Articles
$header = get_field('header');
$identifier = get_field('identifier');
?>
<h2 class="alignwide section-title"><?php echo $header; ?></h2>
<ul data-tabs="" class="accordion-tabs--nav alignwide <?php echo $identifier; ?>" role="tablist">
	<li role="presentation">
		<a data-tabby-default="" href="#latest-<?php echo $identifier; ?>" aria-selected="true" id="tabby-toggle_latest" role="tab" aria-controls="latest">Latest</a>
	</li>
	<li role="presentation">
		<a href="#featured-<?php echo $identifier; ?>" id="tabby-toggle_featured" role="tab" aria-controls="featured" aria-selected="false" tabindex="-1">Featured</a>
	</li>
	<li role="presentation">
		<a href="#wayback-<?php echo $identifier; ?>" id="tabby-toggle_wayback" role="tab" aria-controls="wayback" aria-selected="false" tabindex="-1">Wayback</a>
	</li>
</ul>

<div id="latest-<?php echo $identifier; ?>" class="accordion-tabs--item alignwide" data-selected="true" role="tabpanel" aria-labelledby="tabby-toggle_latest">
	<?php 
		if ($type_posts == 'videos') :
			$args = array(
				'cat'				=> '311',
				'post_status'		=> 'publish',
				'posts_per_page' 	=> 6,
				'orderby' 			=> 'date',
            	'order'   			=> 'DESC',
			);
			query_posts( $args );
		elseif ($type_posts == 'articles') : 
			$args = array(
				'category__not_in' 	=> array(311),
				'post_status'		=> 'publish',
				'posts_per_page' 	=> 6,
				'orderby' 			=> 'date',
            	'order'   			=> 'DESC',
				'offset'			=> 3,
			);
			query_posts( $args );
		endif;

		$loop = new WP_Query( $args ); 
		if ( $loop->have_posts() ):
			while ( $loop->have_posts() ) : $loop->the_post(); 
	?>
		<?php if ($type_posts == 'videos') : ?>
		<article class="<?php echo $article_class; ?>">
		<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>"></a>
			<div class="post-info">
				<h5 class="entry-date gray"><?php echo get_the_date(); ?></h5>
				<a href="<?php the_permalink(); ?>"><?php the_title( '<h3 class="entry-title">', '</h3>' ); ?></a>
				<h4 class="entry-excerpt gray"><?php the_excerpt(); ?></h4>
			</div>
		</article>
		<?php elseif ($type_posts == 'articles') : ?>
		<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>"></a>
			<div class="post-info">
				<h5 class="entry-date gray"><?php echo get_the_date(); ?></h5>
				<a href="<?php the_permalink(); ?>"><?php the_title( '<h3 class="entry-title">', '</h3>' ); ?></a>
				<h5 class="entry-author"><?php the_author(); ?></h5>
			</div>
		</article>
		<?php endif; ?>
	<?php
		endwhile;
	?>
	<?php 
		wp_reset_query(); 
		endif;
	?>
</div>
<div id="featured-<?php echo $identifier; ?>" class="accordion-tabs--item alignwide" data-selected="true" role="tabpanel" aria-labelledby="tabby-toggle_featured">
	<?php 
		if ($type_posts == 'videos') :
			$args = array(
			   // 'post_type' 		=> $post_type,
				'cat'				=> '311', 
				'post_status'		=> 'publish',
				'posts_per_page' 	=> 6,
				'orderby' 			=> 'date',
            	'order'   			=> 'DESC',
				'tag'				=> 'featured',
			);
			query_posts( $args );
		elseif ($type_posts == 'articles') : 
			$args = array(
			   // 'post_type' 		=> $post_type,
				'category__not_in' 	=> array(311),
				'post_status'		=> 'publish',
				'posts_per_page' 	=> 6,
				'orderby' 			=> 'date',
            	'order'   			=> 'DESC',
				'offset'			=> 1,
				'tag'				=> 'featured',
			);
			query_posts( $args );
		endif;

		$loop = new WP_Query( $args ); 
		if ( $loop->have_posts() ):
			while ( $loop->have_posts() ) : $loop->the_post(); 
	?>
		<?php if ($type_posts == 'videos') : ?>
		<article class="<?php echo $article_class; ?>">
		<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>"></a>
			<div class="post-info">
				<h5 class="entry-date gray"><?php echo get_the_date(); ?></h5>
				<a href="<?php the_permalink(); ?>"><?php the_title( '<h3 class="entry-title">', '</h3>' ); ?></a>
				<h4 class="entry-excerpt gray"><?php the_excerpt(); ?></h4>
			</div>
		</article>
		<?php elseif ($type_posts == 'articles') : ?>
		<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>"></a>
			<div class="post-info">
				<h5 class="entry-date gray"><?php echo get_the_date(); ?></h5>
				<a href="<?php the_permalink(); ?>"><?php the_title( '<h3 class="entry-title">', '</h3>' ); ?></a>
				<h5 class="entry-author"><?php the_author(); ?></h5>
			</div>
		</article>
		<?php endif; ?>
	<?php
		endwhile;
	?>
	<?php 
		wp_reset_query(); 
		endif;
	?>
</div>
<div id="wayback-<?php echo $identifier; ?>" class="accordion-tabs--item alignwide" data-selected="true" role="tabpanel" aria-labelledby="tabby-toggle_wayback">
	<?php 
		if ($type_posts == 'videos') :
			$args = array(
			   // 'post_type' 		=> $post_type,
				'cat'				=> '311', 
				'post_status'		=> 'publish',
				'posts_per_page' 	=> 6,
				'orderby' 			=> 'date',
            	'order'   			=> 'DESC',
				'date_query' => array(
					'before' => date('Y-m-d', strtotime('-300 days')) 
					)
				);
			query_posts( $args );
		elseif ($type_posts == 'articles') : 
			$args = array(
			   // 'post_type' 		=> $post_type,
				'category__not_in' 	=> array(311),
				'post_status'		=> 'publish',
				'posts_per_page' 	=> 6,
				'orderby' 			=> 'date',
            	'order'   			=> 'DESC',
				'offset'			=> 1,
				'date_query' => array(
					'before' => date('Y-m-d', strtotime('-600 days')) 
					)
				);
			query_posts( $args );
		endif;

		$loop = new WP_Query( $args ); 
		if ( $loop->have_posts() ):
			while ( $loop->have_posts() ) : $loop->the_post(); 
	?>
		<?php if ($type_posts == 'videos') : ?>
		<article class="<?php echo $article_class; ?>">
		<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>"></a>
			<div class="post-info">
				<h5 class="entry-date gray"><?php echo get_the_date(); ?></h5>
				<a href="<?php the_permalink(); ?>"><?php the_title( '<h3 class="entry-title">', '</h3>' ); ?></a>
				<h4 class="entry-excerpt gray"><?php the_excerpt(); ?></h4>
			</div>
		</article>
		<?php elseif ($type_posts == 'articles') : ?>
		<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>"></a>
			<div class="post-info">
				<h5 class="entry-date gray"><?php echo get_the_date(); ?></h5>
				<a href="<?php the_permalink(); ?>"><?php the_title( '<h3 class="entry-title">', '</h3>' ); ?></a>
				<h5 class="entry-author"><?php the_author(); ?></h5>
			</div>
		</article>
		<?php endif; ?>
	<?php
		endwhile;
	?>
	<?php 
		wp_reset_query(); 
		endif;
	?>
</div>