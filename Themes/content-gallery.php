<article class="post post-gallery">

  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

  <?php if (has_gallery()) : ?>

    <ul class="gallery-grid">

      <?php
      $gallery_images = get_post_gallery(get_the_ID(), false); 
      foreach ($gallery_images['src'] as $image_url) :
        ?>

        <li class="gallery-item">
          <img src="<?php echo $image_url; ?>" alt="<?php echo get_the_title($image_url); ?>">
        </li>

      <?php endforeach; ?>

    </ul>

  <?php else : ?>

    <p>No gallery images found.</p>

  <?php endif; ?>

  <?php the_content(); ?>

</article>
