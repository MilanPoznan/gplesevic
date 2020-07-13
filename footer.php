<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="footer">
		<div class="footer__wrapper">
			<div class="footer__logo">
				<img id="footer-logo-img" src="http://development.voidpictures.com/wp-content/uploads/2019/08/logo-black.png" >
			</div>
			<div class="footer__info">
				<p class="strong">Gradjevinska kompanija Lesevic</p>
				<p class="footer__info-content">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim.</p>
			</div>
			<div class="footer__contact">
				<p>Juzni Bulevar 553, 11 000 Beograd, Serbia</p>
				<p>036 324 201</p>
				<p>063 665 279</p>
				<p>063 665 169</p>
				<p>gplesevic036@gmail.com</p>
				<p>nleshevic@gmail.com</p>
			</div>			
			<div class="footer__projekti">
			<p class="strong">Projekti</p>
			<?php
				$recent_projects = wp_get_recent_posts(array('post_type'=>'projects', 'posts_per_page' => 3));
				foreach ($recent_projects as $key => $project) {
					echo '<p class="footer__projekti-title">' . $project['post_title'] . '</pre>';
					# code...
				}

			?>
			</div>
			</div>

				
	</footer><!-- #colophon -->
	<div class="footer__copy">
					Copyright GP Lesevic 2020
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
