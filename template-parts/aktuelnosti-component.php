<section class="aktuelnosti content--large">
  <div class="aktuelnosti__wrapper">
    <div class="aktuelnosti__content">
      <h2>Aktuelnosti</h2>
      <div class="aktuelnosti__desc"><?php the_sub_field('description'); ?></div>
    </div>
    <div class="aktuelnosti__posts">
      <div class="aktuelnosti__post">
        <?php
          $latest_posts = get_sub_field('latest_posts');
          $latest_posts_id = $latest_posts ->ID;
          $latest_posts_title = $latest_posts->post_title;
          $latest_posts_desc = $latest_posts->post_content;
          $latest_posts_desc_cut = substr($latest_posts_desc,0, 50);
          $latest_posts_image = get_the_post_thumbnail_url($latest_posts_id); 
          $latest_posts_url = get_permalink($latest_posts_id);
        ?>
        <a href="<?php echo $latest_posts_url; ?>" />
          <div class="aktuelnosti__post-image">
            <img src="<?php echo $latest_posts_image; ?>" />
          </div>
          <div class="aktuelnosti__post-info">
            <h3><?php echo $latest_posts_title; ?></h3>
            <p><?php echo $latest_posts_desc_cut; ?></p>
          </div>
        </a>
      </div>
      <div class="aktuelnosti__post">
      <?php
          $latest_posts2 = get_sub_field('latest_posts_2');
          $latest_posts2_id = $latest_posts2->ID;
          $latest_posts2_title = $latest_posts2->post_title;
          $latest_posts2_desc = $latest_posts2->post_content;
          $latest_posts2_desc_cut = substr($latest_posts2_desc,0, 50);
          $latest_posts2_image = get_the_post_thumbnail_url($latest_posts2_id); 
          $latest_posts2_url = get_permalink($latest_posts2_id);
        ?>
        <a href="<?php echo $latest_posts2_url; ?>" />
          <div class="aktuelnosti__post-image">
            <img src="<?php echo $latest_posts2_image; ?>" />
          </div>
          <div class="aktuelnosti__post-info">
            <h3><?php echo $latest_posts2_title; ?></h3>
            <p><?php echo $latest_posts2_desc_cut; ?></p>
          </div>
        </a>
      </div>
      <div class="aktuelnosti__post">
      <?php
          $latest_posts3 = get_sub_field('latest_posts_3');
          $latest_posts3_id = $latest_posts3->ID;
          $latest_posts3_title = $latest_posts3->post_title;
          $latest_posts3_desc = $latest_posts3->post_content;
          $latest_posts3_desc_cut = substr($latest_posts3_desc,0, 50);
          $latest_posts3_image = get_the_post_thumbnail_url($latest_posts3_id); 
          $latest_posts3_url = get_permalink($latest_posts3_id);
        ?>
        <a href="<?php echo $latest_posts3_url; ?>" />
          <div class="aktuelnosti__post-image">
            <img src="<?php echo $latest_posts3_image; ?>" />
          </div>
          <div class="aktuelnosti__post-info">
            <h3><?php echo $latest_posts3_title; ?></h3>
            <p><?php echo $latest_posts3_desc_cut; ?></p>
          </div>
        </a>
      </div>
    </div>
    

  </div>
</section>