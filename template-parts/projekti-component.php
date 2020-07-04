<section class="projects content--large">
  <h2><?php the_sub_field('project_title') ?></h2>
  <?php 
    if( have_rows('projects') ):
    // loop through the rows of data
    ?><div class="projects__wrapper"> <?php 
      while ( have_rows('projects') ) : the_row(); ?>
      <div class="projects__single-wrapp">
        <a href="<?php the_sub_field('project_url'); ?>" class="projects__single" style="background-image: url('<?php the_sub_field('project_image'); ?>')">
          <div class="projects__overlay"></div>
          <p><?php the_sub_field('project_title') ?></p>
        </a>
      </div>

    <?php endwhile; ?>
    </div>
    <?php endif; ?>
</section>