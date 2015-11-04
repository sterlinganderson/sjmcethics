<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

	<?php
	/**
	 * Load fonts from Google's font library using the Web Font Loader
	 * to avoid FOUT.
	 * @see https://github.com/typekit/webfontloader
	 *
	 * Currently only using Roboto Slab in 400, and 700
	 */
	?>
	<script>
 		WebFont.load({
			google: {
      			families: [ 'Roboto+Slab:400,700:latin','PT+Serif:400,700,400italic,700italic' ]
    		}
  		});
	</script>

</head>

<body <?php body_class(); ?>>

	<div id="outer-top-bar"></div>
	<div id="page" class="hfeed site">

		<div id="top-bar">
			<a class="top-bar-uw-link" href="http://wisc.edu">
				<img src="<?php bloginfo('template_directory') ?>/img/logos/uw-madison.png" />
				<span>University of Wisconsin&mdash;Madison</span>
			</a><!-- class="top-bar-uw-link" -->
		</div>

		<div id="side">


		<div class="side-align">
		<div class="side-inner-container">
		<header id="masthead" class="site-header" role="banner">
			<a class="home-link header-home-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				
				<span class="header-uw-crest">
					<img src="<?php bloginfo('template_directory') ?>/img/logos/uw-crest.png" />
				</span>
				<span class="header-center-journalism-ethics">
					<img src="<?php bloginfo('template_directory') ?>/img/logos/center-journalism-ethics.png" />
				</span>
				<div class="clearfix"></div>
			</a>

			<?php /*
			<div id="navbar" class="navbar">
				<nav id="site-navigation" class="navigation main-navigation" role="navigation">
					<h3 class="menu-toggle"><?php _e( 'Menu', 'twentythirteen' ); ?></h3>
					<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentythirteen' ); ?>"><?php _e( 'Skip to content', 'twentythirteen' ); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
					<?php get_search_form(); ?>
				</nav><!-- #site-navigation -->
			</div><!-- #navbar --> */ ?>
		</header><!-- #masthead -->
		</div><!-- .side-innner-container -->
		</div><!-- .side-widget -->

		<div id="sidebar">

			<div class="side-align sidebar-widget">
				<div class="side-inner-container">

				<h3>Resources</h3>
				
				<ul class="sidebar-resource-list">
					<li><a href="<?php bloginfo('url'); ?>/resources/ethics-in-a-nutshell/">Ethics in a nutshell</a></li>
					<li><a href="<?php bloginfo('url'); ?>/resources/holding-media-accountable/">Holding media accountable</a></li>
					<li><a href="<?php bloginfo('url'); ?>/resources/digital-media-ethics/">Digital media ethics</a></li>
					<li><a href="<?php bloginfo('url'); ?>/resources/global-media-ethics/">Global media ethics</a></li>
					<li><a href="<?php bloginfo('url'); ?>/resources/new-publications/">New publications</a></li>
					<li><a class="grey-link" href="<?php bloginfo('url'); ?>/resources/">Resource Center</a></li>
				</ul>

				</div><!-- .side-innner-container -->
			</div><!-- .side-widget -->
			<div class="side-align sidebar-widget">
				<div class="side-inner-container">
					<?php dynamic_sidebar( 'hp-sidebar-1' ); ?>
				</div>
			</div>

			<div class="side-align sidebar-widget">
				<div class="side-inner-container">

				<p style="margin-top:18px;margin-bottom:6px;">
				<img src="<?php bloginfo('template_directory') ?>/img/logos/uwsjmc.png" />
				</p>
				<p class="copyright-info">Questions? ethics@journalism.wisc.edu
© <?php echo date("Y"); ?> Board of Regents of the University of Wisconsin System</p>


				</div><!-- .side-innner-container -->
			</div><!-- .side-widget -->


		
		</div><!-- #sidebar -->
		
		</div><!-- #side -->

		<div id="main" class="site-main">
