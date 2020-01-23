	</div><!-- #content -->
	
	<?php  
		$footlogo = get_field("footer_logo","option");
		$address = get_field("address","option");
		$email = get_field("email","option");
		$phone = get_field("phone","option");
		$social = get_social_links();
	?>
	<footer id="colophon" class="site-footer cf" role="contentinfo">
		<div class="wrapper">
			<div class="foot-content">
				<?php if ($footlogo) { ?>
				<div class="fotcol footlogo">
					<img src="<?php echo $footlogo['url'] ?>" alt="<?php echo $footlogo['title'] ?>" />
				</div>	
				<?php } ?>
				<?php if ($address || $email) { ?>
				<div class="fotcol address">
					<?php echo $address ?>
					<?php if ($email) { ?>
					<div class="office-email"><a href="mailto:<?php echo antispambot($email,1) ?>"><?php echo antispambot($email) ?></a></div>	
					<?php } ?>
				</div>	
				<?php } ?>
				
				<div class="fotcol footermenu">
					<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu','container_class'=>'flexcol footer-menu-wrap' ) ); ?>
				</div>

				<?php if ($social) { ?>
				<div class="fotcol social-media">
					<?php foreach ($social as $k=>$s) { ?>
					<a href="<?php echo $s['link'] ?>" target="_blank"><span class="sr"><?php echo $k ?></span><i class="<?php echo $s['icon'] ?>"></i></a>	
					<?php } ?>
				</div>	
				<?php } ?>
				
			</div>
		</div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
