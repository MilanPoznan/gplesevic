<?php
?>
<section class="hero">
  <div class="hero__bg" style="background-image: url('<?php the_sub_field('background_image'); ?>')"> 
    <div class="hero__wrapper">
      <h1><?php the_sub_field('hero_title'); ?></h1>
      <p><?php the_sub_field('hero_description'); ?></p>
    </div>
  </div>
  <!-- <div class="hero__overlay" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/img/home-page-hero.svg'; ?>)"></div> -->
  <div class="hero__overlay"></div>
  <div class="hero__triangle" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/img/hero-triangle.png'; ?>">

  </div>
  
</section>