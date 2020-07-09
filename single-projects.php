<?php get_header();
$project_ID = get_the_ID();
$category_name = get_the_category($project_ID);
$project_content = get_the_content(null, false, $project_ID);
?>


<div class="single-projects">
  <div class="single-projects__wrapper content--large ">
    <div class="single-projects__project">
      <div class="single-projects__title-info">
        <p><?php echo $category_name[0]->name; ?></p>
        <h1><?php the_title(); ?></h1>
      </div>
      <div class="single-projects__content-wrap">
        <div class="single-projects__content">
          <?php echo $project_content; ?>
        </div>
        <div class="single-projects__gallery">
          
          <?php 
          // Check rows exists.
          $image_rep = get_field('project_gallery');

          // var_dump();
          if( have_rows('project_gallery') ):?>
          <div class="single-projects__focus-img" id="galery-focus-image" >
            <img id='js-focus-img' src="<?php echo $image_rep[0]["gallery_image"]; ?>" class="js-focus-image" /> 
          </div>
            <div class="single-projects__images-wrap">

            <?php // Loop through rows.
            while( have_rows('project_gallery') ) : the_row();?>

              <div class="single-projects__image js-single-image" data-image="<?php the_sub_field('gallery_image'); ?>" style="background-image: url('<?php the_sub_field('gallery_image'); ?>')"></div>

            <?php // End loop.
            endwhile;?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="single-projects__prodaja">
      <h3 class="single-projects__prodaja-title">Prodaja</h3>
      <!-- <div class="single-projects__prodaja-separator"></div> -->
    <?php 
    get_latest_prodaja_posts(); 
    ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>