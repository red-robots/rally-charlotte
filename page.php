<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellaworks
 */
$banner = get_slider();
get_header(); ?>

	<div id="primary" class="content-area default wrapper cf">
		<main id="main" data-postid="<?php the_ID(); ?>" class="site-main cf" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<?php if (!$banner) { ?>
				<header class="entry-header">
					<h1 class="entry-title"><?php echo the_title(); ?></h1>
				</header>
				<?php } ?>
				

				<div class="entry-content">
					<?php the_content(); ?>
				</div>

			<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
