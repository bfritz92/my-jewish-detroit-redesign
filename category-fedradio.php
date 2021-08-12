<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

$description = get_the_archive_description();
?>

<?php if ( have_posts() ) : $postCount = 0; ?>

	<header class="page-header alignwide">
		<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
		<?php if ( $description ) : ?>
			<div class="archive-description">
				<?php echo wp_kses_post( wpautop( $description ) ); ?>
				<figure class="archive-description--img"><img src="https://mjdasset.s3.us-west-2.amazonaws.com/wp-content/uploads/2021/08/12172448/FedRadioDetroit-2c-sm.jpg"></figure>
			</div>
			<ul class="inline-links">
				<li><a href="https://podcasts.apple.com/gb/podcast/fedradio-detroit/id1494716703">Apple Podcasts</a></li>
				<li><a href="https://podcasts.google.com/feed/aHR0cHM6Ly93d3cuc3ByZWFrZXIuY29tL3Nob3cvNDE1OTA0MC9lcGlzb2Rlcy9mZWVk">Google Podcasts</a></li>
				<li><a href="https://open.spotify.com/show/7GDJspmdbNmtkcqmxxgHqK">Spotify</a></li>
			</ul>
		<?php endif; ?>
	</header><!-- .page-header -->

	<?php while ( have_posts() ) : $postCount++; ?>
		<?php the_post(); ?>		
		<?php get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) ); ?>
		<?php if($postCount == 1) : ?>		
			<article>
				<a class="spreaker-player" href="http://www.spreaker.com/episode/<?php the_field ('podcast_embed'); ?>" data-resource="episode_id=<?php the_field ('podcast_embed'); ?>" data-width="100%" data-height="200px" data-theme="light" data-playlist="true" data-playlist-continuous="true" data-autoplay="false" data-live-autoplay="false" data-chapters-image="true" data-episode-image-position="right" data-hide-logo="true" data-hide-likes="true" data-hide-comments="true" data-hide-sharing="false" data-hide-download="true">Listen to "<?php the_title(); ?>"</a>
			</article>
		<?php endif; ?>
	<?php endwhile; ?>

	<?php twenty_twenty_one_the_posts_navigation(); ?>

<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>

<?php get_footer(); ?>
