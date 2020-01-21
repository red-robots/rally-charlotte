<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/css?family=Fjalla+One|Hind:300,400,500,600,700|Nanum+Gothic:400,700,800|Barlow+Condensed:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="mobile-navigation">
	<div class="donate"><a href="#" class="donate-btn-mobile"><span>DONATE</span></a></div>
	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'mobile-menu','container_class'=>'menuwrap' ) ); ?></div>
<div id="page" class="site cf">
	<div id="header-overlay"></div>
	<a class="skip-link sr" href="#content"><?php esc_html_e( 'Skip to content', 'bellaworks' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div class="wrapper">
			<a href="#" class="donate-btn"><span>DONATE</span></a>
			<div class="flexwrap">
				<?php if( get_custom_logo() ) { ?>
		            <div class="logo">
		            	<?php the_custom_logo(); ?>
		            </div>
		        <?php } else { ?>
		            <h1 class="logo">
			            <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
		            </h1>
		        <?php } ?>

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu','container_class'=>'menuwrap' ) ); ?>
				</nav><!-- #site-navigation -->
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="sr"><?php esc_html_e( 'MENU', 'bellaworks' ); ?></span><span class="bar"></span></button>
			</div>
		</div><!-- wrapper -->
	</header><!-- #masthead -->

	<?php get_template_part('parts/content','banner'); ?>

	<div id="content" class="site-content wrapper">
