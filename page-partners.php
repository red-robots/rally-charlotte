<?php
/**
 * Template Name: Our Partners
 */
$banner = get_slider();
get_header(); ?>

	<div id="primary" class="content-area default cf partnerspage">
		<main id="main" data-postid="<?php the_ID(); ?>" class="site-main cf" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				$community_partners = get_field("community_partners");  
				$columnText1 = get_the_content();  
				$columnText2 = get_field("sidebar_content");  
				$title_of_sidebar = get_field("title_of_sidebar");  
				$slides = get_field("bottom_image");  
				$hasTwoCol = ($columnText1 && $columnText2) ? 'twocol':'onecol';
				?>

				<?php if ($community_partners) { ?>
				<section class="section tiles cf">
					<div class="wrapper">
						<div class="flexwrap">
							<?php foreach ($community_partners as $c) { 
								$img = $c['partner_logo'];
								$link = $c['partner_website'];
								$parts = ($link) ? parse_external_url($link) : '';
								$hasLink = ($link) ? 'haslink':'nolink';
								$openLink = '';
								$closeLink = '';
								if($link) {
									$openLink = '<a href="'.$parts['url'].'" target="'.$parts['target'].'" class="'.$parts['class'].'">';
									$closeLink = '</a>';
								}
								if($img) { ?>
								<div class="flexcol <?php echo $hasLink ?>">
									<div class="inside">
									<?php echo $openLink ?><img src="<?php echo $img['url'] ?>" alt="<?php echo $img['title'] ?>" class="partner-logo"><?php echo $closeLink ?>
									</div>
								</div>	
								<?php } ?>
							<?php } ?>
						</div>
					</div>
				</section>
				<?php } ?>

				<?php if ( $columnText1 || $columnText2 ) { ?>
					
					<h1 class="entry-title" style="display:none;"><?php echo the_title(); ?></h1>
					<section class="section typical fullwidth-fl <?php echo $hasTwoCol ?>">
						<div class="wrapper">
							<div class="flexwrap">
								<?php if ($columnText1) { ?>
								<div class="textcol txt1">
									<div class="inside">
										<?php the_content(); ?>	
									</div>
								</div>	
								<?php } ?>

								<?php if ($columnText2) { ?>
								<div class="textcol txt2">
									<div class="inside">
										<?php if ($title_of_sidebar) { ?>
										<h2 class="sbtitle"><?php echo $title_of_sidebar ?></h2>	
										<?php } ?>
										<?php echo $columnText2 ?>
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
