<section class="logo-rep ">
<?php if( have_rows('logo_repeater') ):
    // loop through the rows of data
    ?><div class="logo-rep__wrapper content--mid"> 
      <?php 
      while ( have_rows('logo_repeater') ) : the_row(); ?>
        <a href="<?php the_sub_field('logo_url'); ?>" class="logo-rep__single">
          <img src="<?php the_sub_field('logo_icon') ?>" />
        </a>
    <?php endwhile; ?>
    </div>
    <?php endif; ?>
</section>