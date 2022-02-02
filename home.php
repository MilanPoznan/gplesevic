<?php

get_header(); ?>
<section class="hero hero--no-home">
  <div class="hero__overlay"></div>
  <div class="hero__bg" style="background-image: url('<?php the_field('aktivnosti_bg'); ?>')"> 
  <div class="hero__wrapper">
      <h1>Aktivnosti</h1>
    </div>
  </div>
  <div class="hero__triangle" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/img/hero-triangle.png'; ?>">

</section>
<section class="container container--narrow">

    <div class="blog-section">
        <?php
            while(have_posts()) {
                the_post(); ?>
                <div class="post-item">
                    <?php if (has_post_thumbnail( $post->ID ) ): ?>
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                        <a class="post-item-img relative" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $image[0]; ?>')"></a>
                    <?php endif; ?>
                    <div class="meta-box">
                        <h2 class="post-item-headline"><a class="gray-text" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="generic-content">
                            <p class="excerpt"><?php echo wp_trim_words(get_the_content(), 35); ?></p>
                        </div>
                        <p class="read-more no-b-m"><a class="blue-link" href="<?php the_permalink(); ?>">Read-more</a></p>
                    </div>
                </div>
            <?php } ?>
            <div class="pagination-wrapper text-center">
                <div class="pagination">
                <?php echo paginate_links(array(
                        'base' => get_pagenum_link(1) . '%_%',
                        'mid_size' => 2, 
                        'format' => '/page/%#%',
                        'prev_text'    => __(''),
                        'next_text'    => __(''),
                    )); ?>
                </div>
            </div>
    </div>
</section>

<?php get_footer();

?>