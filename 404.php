<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bellaworks
 */

get_header(); ?>
<div id="primary" class="content-area default wrapper cf page404error">
	<main id="main" data-postid="<?php the_ID(); ?>" class="site-main cf" role="main">
		
		<section class="text-404-error text-center">
			<header class="entry-header">
				<h1 class="entry-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'bellaworks' ); ?></h1>
			</header>

			<div class="entry-content">
				<p style="margin-top:5px;"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below.', 'bellaworks' ); ?></p>
				<?php get_template_part('parts/content','sitemap'); ?>
			</div>
		</section>

	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
