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

	<div id="primary" class="content-area default cf">
		<main id="main" data-postid="<?php the_ID(); ?>" class="site-main cf" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				$columnText1 = get_the_content();  
				$columnText2 = get_field("sidebar_content");  
				$title_of_sidebar = get_field("title_of_sidebar");  
				$slides = get_field("bottom_image");  
				$featimage = get_field("featimage");  
				$featimage_caption = get_field("featimage_caption");  
				$hasTwoCol = ($columnText1 && ($columnText2 || $featimage)) ? 'twocol':'onecol';
				
				$v = get_field('featured_video');	
				$webm = (isset($v['video_webm'])) ? $v['video_webm'] : '';
				$mp4 = (isset($v['video_mp4'])) ? $v['video_mp4'] : '';

				?>

				<?php if ( $columnText1 || $columnText2 ) { ?>
					
					<h1 class="entry-title" style="display:none;"><?php echo the_title(); ?></h1>
					<section class="section typical fullwidth-fl <?php echo $hasTwoCol ?>">
						<div class="wrapper">
							
						<?php if($webm || $mp4) { ?>
							<div class="full-video-frame">
								<video controls>
									<?php if($webm) { ?>
										<source src="<?php echo $webm ?>" type="video/webm">
									<?php } ?>
									<?php if($mp4) { ?>
										<source src="<?php echo $mp4 ?>" type="video/mp4">
									<?php } ?>
								</video>
							</div>
						<?php } ?>

							<div class="flexwrap">
								<?php if ($columnText1) { ?>
								<div class="textcol txt1">
									<div class="inside">
										<?php the_content(); ?>	
									</div>
								</div>	
								<?php } ?>

								<?php if ($columnText2 || $featimage) { ?>
								<div class="textcol txt2">
									<div class="inside">
										<?php if ($title_of_sidebar) { ?>
										<h2 class="sbtitle"><?php echo $title_of_sidebar ?></h2>	
										<?php } ?>
										<?php echo $columnText2 ?>

										<?php if ($featimage) { ?>
										<figure class="feat-image">
											<img src="<?php echo $featimage['url'] ?>" alt="<?php echo $featimage['title'] ?>" />
											
											<?php if ($featimage_caption) { ?>
											<div class="image-caption"><?php echo $featimage_caption ?></div>
											<?php } ?>
										</figure>
										<?php } ?>
									</div>
								</div>	
								<?php } ?>
							</div>
						</div>
					</section>

					<?php 
					$placeholder = get_bloginfo("template_url") . "/images/rectangle-lg.png";
					$count = ($slides) ? count($slides) : 0;
					$slidesId = ($count>1) ? 'slideshow':'static-banner';
					if($slides) { ?>
					<section class="subpageSlides autoHeight fullwidth-fl">
						<div class="circle-wrapper">
							<div class="half-circle">
								<img src="<?php echo get_bloginfo("template_url") ?>/images/half-circle-dashed.svg" alt="" aria-hidden="true">
							</div>
						</div>
						
						<div id="<?php echo $slidesId ?>" class="swiper-container banners">
							<div class="swiper-wrapper">
								<?php foreach ($slides as $s) { 
									$imgURL = $s['url'];
									$altImg = $s['title'];
									if($imgURL) { ?>
										<div class="swiper-slide slideItem">
											<img class="slide-image" src="<?php echo $imgURL ?>" alt="<?php echo $altImg ?>" />
										</div>
									<?php } ?>
								<?php } ?>
							</div>
							<?php if ($count>1) { ?>
							    <div class="swiper-pagination"></div>
							    <div class="swiper-button-next"></div>
							    <div class="swiper-button-prev"></div>
							<?php } ?>
						</div>
					</section>
					<?php } ?>

					<?php 
					$bottom_thumb_image = get_field("bottom_thumb_image");
					$bottom_text = get_field("bottom_text");
					$bottomBtnName = get_field("bottom_button_name");
					$bottomBtnLink = get_field("bottom_button_link");
					$bottomCols = ($bottom_thumb_image && $bottom_text) ? 'twocol':'onecol';
					$symbol = get_bloginfo("template_url") . "/images/rally-symbol.png";
					$squareImg = get_bloginfo("template_url") . "/images/rectangle.png";
					?>

					<?php if ($bottom_thumb_image || $bottom_text) { ?>
					<section class="bottom-info-section fullwidth-fl <?php echo $bottomCols ?>">
						<div class="wrapper">
							<div class="flexwrap">
								<?php if ($bottom_thumb_image) { ?>
								<div class="bottomImage">
									<div class="imageWrap">
										<div class="image" style="background-image:url('<?php echo $bottom_thumb_image['url'] ?>');">
											<img src="<?php echo $bottom_thumb_image['url'] ?>" alt="<?php echo $bottom_thumb_image['title'] ?>" style="display:none;">
											<img src="<?php echo $squareImg ?>" alt="" aria-hidden="true">
										</div>
										<img src="<?php echo $symbol ?>" alt="" aria-hidden="true" class="frame">
									</div>
								</div>
								<?php } ?>

								<?php if ($bottom_text) { ?>
								<div class="bottomText">
									<div class="inside"><?php echo $bottom_text ?></div>
									
									<?php if ($bottomBtnName && $bottomBtnLink) { ?>
									<div class="buttonWrap">
										<a href="<?php echo $bottomBtnLink ?>" class="btn-default"><?php echo $bottomBtnName ?></a>
									</div>	
									<?php } ?>
								</div>	
								<?php } ?>
							</div>
						</div>
					</section>	
					<?php } ?>
					
				<?php } else { ?>

				<div class="default-page-content wrapper">
					<?php if (!$banner) { ?>
					<header class="entry-header">
						<h1 class="entry-title"><?php echo the_title(); ?></h1>
					</header>
					<?php } ?>
					

					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</div>

				<?php } ?>

			<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
