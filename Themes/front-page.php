<?php

get_header(); ?>
	
	
	<div class="site-content clearfix">

			<?php if (have_posts()) :
				while (have_posts()) : the_post();

				the_content();

				endwhile;

				else :
					echo '<p>No content found</p>';

				endif; ?>
				
				
				<div class="home-columns clearfix">
					
					
					<div class="one-half">
						
						<h2>Latest Opinion</h2>
						
						<?php 
						$opinionPosts = new WP_Query('cat=3&posts_per_page=2');

						if ($opinionPosts->have_posts()) :

							while ($opinionPosts->have_posts()) : $opinionPosts->the_post(); ?>
								
								<div class="post-item clearfix">

									
									<div class="square-thumbnail">
										<a href="<?php the_permalink(); ?>"><?php
										if (has_post_thumbnail()) {
											the_post_thumbnail('square-thumbnail');
										} else { ?>

											<img src="<?php echo get_template_directory_uri(); ?>/images/leaf.jpg">

										<?php } ?></a>
									</div>

									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span class="subtle-date"><?php the_time('n/j/Y'); ?></span></h4>

									<?php the_excerpt(); ?>

									</div>
							<?php endwhile;

							else :
								
						endif;
						wp_reset_postdata(); ?>
						
						<span class="horiz-center"><a href="<?php echo get_category_link(3); ?>" class="btn-a">View all Opinion Posts</a></span>
						
					</div>
					
					
					<div class="one-half last">
						
						<h2>Latest News</h2>
						
						<?php
						$newsPosts = new WP_Query('cat=4&posts_per_page=2');

						if ($newsPosts->have_posts()) :

							while ($newsPosts->have_posts()) : $newsPosts->the_post(); ?>
								
								<div class="post-item clearfix">

									
									<div class="square-thumbnail">
										<a href="<?php the_permalink(); ?>"><?php
										if (has_post_thumbnail()) {
											the_post_thumbnail('square-thumbnail');
										} else { ?>

											<img src="<?php echo get_template_directory_uri(); ?>/images/leaf.jpg">

										<?php } ?></a>
									</div>

									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span class="subtle-date"><?php the_time('n/j/Y'); ?></span></h4>

									<?php the_excerpt(); ?>

									</div>
							<?php endwhile;

							else :
							
						endif;
						wp_reset_postdata();

						?>
						
						<span class="horiz-center"><a href="<?php echo get_category_link(4); ?>" class="btn-a">View all News Posts</a></span>
						
					</div>
					
				</div>
			
	</div>
	
	<?php get_footer();

?>
