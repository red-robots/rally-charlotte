<?php if (has_nav_menu('sitemap')) { ?>
<nav class="sitemapMenu">
<?php wp_nav_menu( array( 'theme_location' => 'sitemap', 'menu_id' => 'sitemap-menu','container_class'=>'sitemapnav') ); ?>
</nav>
<?php } ?>