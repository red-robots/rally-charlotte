<?php get_header(); ?>
<div id="primary" class="content-area cf">
	<main id="main" class="site-main cf" role="main">
	<?php while ( have_posts() ) : the_post(); ?>

	<?php if ( get_the_content() ) { ?>
	<section class="section maintext fullwidth-fl nopb">
		<div class="text-center">
			<?php the_content(); ?>
		</div>
	</section>
	<?php } ?>

	<?php  
	$column1 = get_field("twoColumnSection1");
	$column2 = get_field("twoColumnSection2");
	$columnText1 = ( isset($column1['text']) && $column1['text'] ) ? $column1['text'] : '';
	$columnText2 = ( isset($column2['text']) && $column2['text'] ) ? $column2['text'] : '';

	$columnBtnName1 = ( isset($column1['button_name']) && $column1['button_name'] ) ? $column1['button_name'] : '';
	$columnBtnLink1 = ( isset($column1['button_link']) && $column1['button_link'] ) ? $column1['button_link'] : '';
	
	$columnBtnName2 = ( isset($column2['button_name']) && $column2['button_name'] ) ? $column2['button_name'] : '';
	$columnBtnLink2 = ( isset($column2['button_link']) && $column2['button_link'] ) ? $column2['button_link'] : '';

	$hasTwoCol = ($columnText1 && $columnText2) ? 'twocol':'onecol';
	?>
	<?php if ($columnText1 || $columnText2) { ?>
	<section class="section whyus fullwidth-fl <?php echo $hasTwoCol ?>">
		<div class="wrapper">
			<div class="flexwrap">
				<?php if ($columnText1) { ?>
				<div class="textcol">
					<div class="inside">
						<?php echo $columnText1 ?>
						<?php if ($columnBtnName1 && $columnBtnLink1) { ?>
						<div class="btndiv"><a href="<?php echo $columnBtnLink1 ?>" class="btnlink"><?php echo $columnBtnName1 ?></a></div>
						<?php } ?>		
					</div>
				</div>	
				<?php } ?>

				<?php if ($columnText2) { ?>
				<div class="textcol">
					<div class="inside">
						<?php echo $columnText1 ?>
						<?php if ($columnBtnName1 && $columnBtnLink1) { ?>
						<div class="btndiv"><a href="<?php echo $columnBtnLink1 ?>" class="btnlink"><?php echo $columnBtnName1 ?></a></div>
						<?php } ?>		
					</div>
				</div>	
				<?php } ?>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php 
	$services_image = get_field("services_image"); 
	$services = get_field("services"); 
	$services_graphic = get_field("services_graphic"); 
	//$servicesClass = ($services_image && $services) ? 'twocol':'onecol';
	$servicesClass = ($services_image && $services_graphic) ? 'twocol':'onecol';
	$placeholder = get_bloginfo("template_url") . "/images/rectangle-lg.png";
	$square_placeholder = get_bloginfo("template_url") . "/images/square.png";
	?>

	<?php if ($services_image || $services) { ?>
	<section class="section services-info fullwidth-fl noptpb <?php echo $servicesClass ?>">
		<div class="svcflexwrap cf">
			<?php if ($services_image) { ?>
			<div class="svc-image" style="background-image:url('<?php echo $services_image['url'] ?>');">
				<img src="<?php echo $services_image['url'] ?>" alt="<?php echo $services_image['title'] ?>" style="display:none!important;">
				<img src="<?php echo $placeholder ?>" alt="" aria-hidden="true" />
			</div>
			<?php } ?>

			<?php if ($services_graphic) { ?>
			<div class="svc-services">
				<!-- <ul class="svclist">
				<?php //foreach ($services as $sv) { 
					//$icon = $sv['icon'];
					//$title = $sv['title'];
					//if($title) { ?>
					<li>
						<?php //if ($icon) { ?>
						<div class="svcIcon" style="background-image:url('<?php //echo $icon['url'] ?>');">
							<img src="<?php //echo $square_placeholder ?>" alt="" aria-hidden="true">
						</div>
						<?php // } ?>
						<div class="svcTitle"><?php //echo $title ?></div>	
					</li>
					<?php //} ?>
				<?php //} ?>
				</ul> -->

				<?php if ($services_graphic) { ?>
				<img src="<?php echo $services_graphic['url'] ?>" alt="" class="services-graphic"/>	
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</section>
	<?php } ?>
		
	<?php endwhile; ?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
