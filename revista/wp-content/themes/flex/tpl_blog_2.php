<?php

/*
Template Name: Articulos SNAP
*/

?>

<?php get_header(); ?>

<div class="page-content" id="blog-container">
	<div class="container">
		
		<?php
		 
		$category_name = 'Articulos';
		query_posts('post_type=post&post_status=publish&category_name='.$category_name.'&posts_per_page=10&paged='. get_query_var('paged')); 
		
		?>
	
		<?php get_template_part('/templates/blog/blog-layout');?>	

		<?php

			// TO SHOW THE PAGE CONTENTS
			wp_reset_query();
			while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
			    <div class="entry-content-page">
			        <?php the_content(); ?> <!-- Page Content -->
			    </div><!-- .entry-content-page -->
			
			<?php
			endwhile; //resetting the page loop
			wp_reset_query(); //resetting the page query
			// END SHOW THE PAGE CONTENTS
		?>

	</div>	
</div>


<?php get_footer(); ?>