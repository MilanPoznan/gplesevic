<?php get_header(); 
$location = get_field('google_map')
?>
  <section class="contact">
  <section class="hero">
  <!-- <div class="hero__overlay" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/img/home-page-hero.svg'; ?>)"></div> -->
  <div class="hero__overlay"></div>
  <div class="hero__bg" style="background-image: url('<?php the_field('hero_image'); ?>')"> 
    <h1>Kontakt</h1>
  </div>
</section>
    <div class="contact__wrapper">
      <div class="contact__cf">
        <?php the_field('contact_form') ?>
      </div>
      <div class="contact__map acf-map" id="map" data-zoom="16">
        <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
      </div>
    </div>
  </section>
<?php get_footer(); ?>