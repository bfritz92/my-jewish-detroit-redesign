<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->
		<div class="site-name alignwide">
				<?php if ( has_custom_logo() ) : ?>
					<div class="site-logo"><?php the_custom_logo(); ?></div>
				<?php else : ?>
					<?php if ( get_bloginfo( 'name' ) && get_theme_mod( 'display_title_and_tagline', true ) ) : ?>
						<?php if ( is_front_page() && ! is_paged() ) : ?>
							<?php bloginfo( 'name' ); ?>
						<?php else : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
				<div class="wp-block-button is-style-outline"><a href="#" class="wp-block-button__link subscribe-button">Subscribe</a></div>
		</div><!-- .site-name -->
	<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav aria-label="<?php esc_attr_e( 'Secondary menu', 'twentytwentyone' ); ?>" class="footer-navigation">
				<ul class="footer-navigation-wrapper">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'items_wrap'     => '%3$s',
							'container'      => false,
							'depth'          => 1,
							'link_before'    => '<span>',
							'link_after'     => '</span>',
							'fallback_cb'    => false,
						)
					);
					?>
				</ul><!-- .footer-navigation-wrapper -->
			</nav><!-- .footer-navigation -->
		<?php endif; ?>
		<div class="site-info">
			
			
				<a class="powered-by-jfmd" href="https://www.jewishdetroit.org">
					<img src="https://mjdasset.s3.us-west-2.amazonaws.com/wp-content/uploads/2021/08/18130508/Powered-by-JFMD.svg">
				</a>


		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>
<script async src="https://widget.spreaker.com/widgets.js"></script>
</body>

<script src="https://cdn.jsdelivr.net/gh/cferdinandi/tabby@12.0/dist/js/tabby.polyfills.min.js"></script>

    <script>
		const tabSelectors = document.querySelectorAll('[data-tabs]');

		for (const [i, tabs] of [...tabSelectors].entries()) {
			tabs.setAttribute(`data-tabs-${i}`, '');
			new Tabby(`[data-tabs-${i}]`);
		}
	</script>
</html>
