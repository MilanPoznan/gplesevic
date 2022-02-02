<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();
?>
<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
<?php 
	if (have_rows('content_component')){ 

		while (have_rows('content_component')) { the_row(); 
			
			if (get_row_layout() == 'hero_slider') { 

				get_template_part('template-parts/hero', 'slider');

			} elseif (get_row_layout() == 'hero_section') {
				
				get_template_part('template-parts/hero', 'component');

			} elseif (get_row_layout() == 'services') {

				get_template_part('template-parts/services', 'component');

			} elseif (get_row_layout() == 'about_us') {

				get_template_part('template-parts/about', 'component');

			} elseif (get_row_layout() == 'aktuelnosti') {

				get_template_part('template-parts/aktuelnosti', 'component');

			} elseif (get_row_layout() == 'clients') {

				get_template_part('template-parts/clients', 'component');

			} elseif (get_row_layout() == 'logo_repeater') {

				get_template_part('template-parts/logo-repeater', 'component');

			} elseif (get_row_layout() == 'projekti') {

				get_template_part('template-parts/projekti', 'component');

			} elseif (get_row_layout() == 'regular_content') {

				get_template_part('template-parts/regular', 'component');

			} 
			
		} 
  } 
?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
