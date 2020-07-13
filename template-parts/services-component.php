<section class="services">
  <div class="services__wrapper content--mid">
  <h2><?php the_sub_field('service_title') ?></h2>
    <?php 
      if( have_rows('services') ):

        // loop through the rows of data
        ?><div class="services__content"> <?php
        while ( have_rows('services') ) : the_row();
            // display a sub field value
            ?>
            <div class="services__single">
            <div class="services__single-img">
              <img src="<?php the_sub_field('icon'); ?>" />
            </div>
            <h3><?php the_sub_field('title'); ?></h3>
            <div class="services__desc"><?php the_sub_field('description'); ?></div>
            </div>
            <?php
        endwhile;?>
      </div>
    <?php endif;
    ?>
  <!-- </> -->
</section>