<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package void
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnjUlSYoGH1zSCEzDxQayvjP3ZGZ8bhso">
	</script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">

	<header id="masthead" class="header">
		<div class="header__wrapper">
			<a class="header__logo" href="<?php echo get_home_url() ?>/" id="header-logo">
				<img id="header-logo-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-nav.png" >
			</a>
			<div class="header__hamburger-wrapp hamburger-wrapp">
				<div class="header__hamburger hamburger"></div>
			</div>
			<div class="header__menu js-menu">
				<nav id="site-navigation" class="navigation header__navi">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
					?>
				</nav><!-- #site-navigation -->
			</div>
		</div>
	</header><!-- #masthead -->
	
		<!-- <div class="site-animation">
			<div class="site-animation__img-wrap">
				<img class="site-animation__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-nav.png" />
			</div>
		</div>  -->
	<div id="content" class="site-content">	
	