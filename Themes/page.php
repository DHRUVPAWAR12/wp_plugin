<?php

get_header(); ?>

<div class="site-content clearfix">

  <div class="main-column">

    <?php
    
    $cat_id = 3;

    
    $category_posts = new WP_Query(array(
      'category__in' => $cat_id,
      'posts_per_page' => 3, // Limit to 3 posts
    ));

    if ($category_posts->have_posts()) :
      ?>

      <h2>Latest Posts from "<?php echo get_cat_name($cat_id); ?>" Category</h2>

      <ul class="post-list">

        <?php while ($category_posts->have_posts()) : $category_posts->the_post(); ?>

          <li class="post-item">
            <a href="<?php the_permalink(); ?>">
              <h3><?php the_title(); ?></h3>
              <?php the_excerpt(); ?>
            </a>
          </li>

        <?php endwhile; ?>

      </ul>

      <?php echo paginate_links($category_posts); // Pagination if needed ?>

    <?php else : ?>

      <p>No posts found in this category.</p>

    <?php endif;

    
    wp_reset_postdata();
    ?>

  </div>

  <?php get_sidebar(); ?>

</div>

<?php get_footer();

?>
