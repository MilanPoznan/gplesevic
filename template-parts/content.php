<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-post-content">
		<header class="single-post-header">
			<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
			<a class="post-item-img relative" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $url ?>')"></a>
		</header>
		<?php 
			if ( is_singular() ) :
				the_title( '<h1 class="post-title">', '</h1>' );
				
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
		?>
		<?php if ( 'post' === get_post_type() ) :
				?>
				<div class="post-meta">
					Datum: <?php the_date('d.m.y.'); ?> u <?php echo get_the_category_list(', '); ?></p>
				</div><!-- .entry-meta -->
			<?php endif; 
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', '_s' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) ); ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
