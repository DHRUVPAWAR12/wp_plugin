<?php

get_header(); ?>

	
	<div class="site-content clearfix">
		
		
		<div class="main-column">
			
			<?php
			
			if (have_posts()) :

				?>

				<h2><?php

					if ( is_category() ) {
						single_cat_title();
					} elseif ( is_tag() ) {
						single_tag_title();
					} elseif ( is_author() ) {
						the_post();
						echo 'Author Archives: ' . get_the_author();
						rewind_posts();
					} elseif ( is_day() ) {
						echo 'Daily Archives: ' . get_the_date();
					} elseif ( is_month() ) {
						echo 'Monthly Archives: ' . get_the_date('F Y');
					} elseif ( is_year() ) {
						echo 'Yearly Archives: ' . get_the_date('Y');
					} else {
						echo 'Archives:';
					}

				?></h2>

				<?php
				while (have_posts()) : the_post();

				get_template_part('content', get_post_format());

				endwhile;

				echo paginate_links();

				else :
					echo '<p>No content found</p>';

				endif;
			
			?>
			
		</div>
		
		<?php get_sidebar(); ?>
		
	</div>

<?php get_footer();

?>
