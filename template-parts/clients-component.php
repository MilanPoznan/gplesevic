<section class="clients">
  <div class="clients__wrapper">
    <h2><?php the_sub_field('title'); ?></h2>
    <p class="clients__subtitle"><?php the_sub_field('subtitle'); ?></p>
    
    <?php if(have_rows('best_testimonials')): ?>
    
      <div class='clients__testemonials'>
    
        <?php while(have_rows('best_testimonials')): the_row(); ?>
    
          <p><?php the_sub_field('text'); ?></p>
    
        <?php endwhile; ?>
    
      </div>

    <?php endif; ?>
  </div>
</section>