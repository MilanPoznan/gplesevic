<section class="clients" id="klijenti">
  <div class="clients__wrapper">
    <h2><?php the_sub_field('title'); ?></h2>
    <p class="clients__subtitle"><?php the_sub_field('subtitle'); ?></p>
    
    <?php if(have_rows('best_testimonials')): ?>
    
      <div class='clients__testemonials'>
    
        <?php while(have_rows('best_testimonials')): the_row(); ?>
        <div class='clients__testemonials-wrap'>
          <a href="<?php the_sub_field('logo'); ?>">
            <img src="<?php the_sub_field('logo'); ?>" />
          </a>
          <p><?php the_sub_field('text'); ?></p>
        </div>
    
        <?php endwhile; ?>
    
      </div>

    <?php endif; ?>
  </div>
</section>