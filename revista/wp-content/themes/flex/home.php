<?php 

global $bg_home_posts;
$bg_home_posts = $theme_options['body-bgcolor'];
get_header(); 

?>
	
	<div class="page-content" id="blog-container">
		<div class="container">
			
			<?php get_template_part('/templates/blog/blog-layout');?>
			
		</div>
	</div>

<?php get_footer(); ?>