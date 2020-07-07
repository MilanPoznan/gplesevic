<?php get_header(); ?>
<div class="project-arch">
<section class="hero">
  <!-- <div class="hero__overlay" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/img/home-page-hero.svg'; ?>)"></div> -->
  <div class="hero__overlay"></div>
  <div class="hero__bg" style="background-image: url('<?php the_sub_field('background_image'); ?>')"> 
    <h1>Projekti</h1>
  </div>
</section>
<?php get_template_part('template-parts/projects', 'category-header'); ?>
<section class="project-arch__posts">
  <div class="project-arch__post-cat" data-category="arhitektura" id="project-arhit"></div>
  <div class="project-arch__post-cat" id="project-nisk" data-category="niskogradnja"></div>
  <div class="project-arch__post-cat" id="project-visok" data-category="visokogradnja"></div>
</section>

<?php get_footer(); ?>