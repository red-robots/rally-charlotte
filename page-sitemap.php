<?php
/**
 * Template Name: Sitemap
 *
 */

get_header(); ?>
<div id="primary" class="content-area default wrapper cf pagesitemap">
	<main id="main" data-postid="<?php the_ID(); ?>" class="site-main cf" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<header class="entry-header">
				<h1 class="entry-title"><?php echo the_title(); ?></h1>
			</header>

			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<?php get_template_part('parts/content','sitemap'); ?>

		<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
