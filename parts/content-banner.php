<?php if ( is_front_page() ) { ?>

<?php  
$slides = get_field("banner");
$count = ($slides) ? count($slides) : 0;
$slidesId = ($count>1) ? 'slideshow':'static-banner';
$placeholder = get_bloginfo("template_url") . "/images/rectangle-lg.png";
?>
<div class="banner-wrapper home-banner">
	<div id="<?php echo $slidesId ?>" class="swiper-container banners">
		<div class="swiper-wrapper">
			<?php foreach ($slides as $s) { 
				$img = $s['image'];
				$text = $s['caption'];
				if($img) { ?>
					<div class="swiper-slide slideItem" style="background-image:url('<?php echo $img['url'] ?>');">
						<img class="placeholder" src="<?php echo $placeholder ?>" alt="" aria-hidden="true" />
						<?php if ($text) { ?>
						<div class="bannercaption"><div class="inside slideTxt animated"><?php echo $text; ?></div></div>	
						<?php } ?>
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
	<div class="circle-dashed-svg">
		<img src="<?php echo get_bloginfo("template_url") ?>/images/half-circle-dashed.svg" alt="" aria-hidden="true">
	</div>
</div>

<?php } ?>