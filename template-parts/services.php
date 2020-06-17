<section class="services">
  <div class="services__wrapper">
  <h2><?php the_field('services_title') ?></h2>
    <?php 
      if( have_rows('service_repeater') ):

        // loop through the rows of data
        while ( have_rows('service_repeater') ) : the_row();
            // display a sub field value
            ?>
            <h3><?php the_sub_field('service_title'); ?></h3>
            <img src="<?php the_sub_field('service_icon'); ?>" />
            <p><?php the_sub_field('service_text'); ?></p>
            <?php
        endwhile;
    endif;
    ?>
  </div>
</section>