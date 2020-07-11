<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="single-post-wrapper">
					<?php
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/content', get_post_type() );
		
						endwhile; // End of the loop.
					?>
					<div class="single-post-related">
						<h2>Povezano</h2>
						<ul class="related-list"> 
							<?php $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 2, 'post__not_in' => array($post->ID) ) );
								if( $related ) foreach( $related as $post ) {
									setup_postdata($post); ?>
									<li>
										<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
										<a class="post-item-img related relative" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $url ?>')"></a>										<h3 class="related-post-headline"><a class="gray-text" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<div class="generic-content">
											<p class="excerpt"><?php echo wp_trim_words(get_the_content(), 35); ?></p>
										</div>
										<p class="read-more no-b-m"><a class="blue-link" href="<?php the_permalink(); ?>">Read-more</a></p>
									</li>
								<?php } ?>
							<?php wp_reset_postdata(); 
							?>
						</ul>   
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
