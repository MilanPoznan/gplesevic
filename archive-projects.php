<?php get_header(); 

$posts = get_posts([
  'post_type' => 'projects',
  'post_status' => 'publish',
  'numberposts' => -1
  // 'order'    => 'ASC'
]);
// echo "<pre>";
// var_dump($posts);die();
?>

<div class="project-arch">
<section class="hero hero--no-home">
  <div class="hero__overlay"></div>
  <div class="hero__bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/projekti-hero.jpg')"> 
    <div class="hero__wrapper">
      <h1>Projekti</h1>
    </div>
  </div>
  <div class="hero__triangle" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/img/hero-triangle.png'; ?>">
</section>
<?php get_template_part('template-parts/projects', 'category-header'); ?>
<section class="project-arch__posts">
  <div class="project-arch__post-cat" data-category="arhitektura" id="project-arhit"></div>
  <div class="project-arch__post-cat" id="project-nisk" data-category="niskogradnja"></div>
  <div class="project-arch__post-cat" id="project-visok" data-category="visokogradnja"></div>
</section>

<?php get_footer(); ?>