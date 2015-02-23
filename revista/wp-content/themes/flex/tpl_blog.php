<?php

/*
Template Name: Blog Posts
*/

?>

<?php get_header(); ?>

<?php
// TO SHOW THE PAGE CONTENTS
while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
    <div class="entry-content-page">
        <?php the_content(); ?> <!-- Page Content -->
    </div><!-- .entry-content-page -->

<?php
endwhile; //resetting the page loop
wp_reset_query(); //resetting the page query
?>

<?php query_posts('post_type=post&post_status=publish&posts_per_page=10&paged='. get_query_var('paged')); ?>

	<div class="page-content" id="blog-container">
		<div class="container">

			<?php if (is_author() || is_archive() || is_day() || is_tag() || is_category() || is_month() || is_day() || is_year()): ?>

				<h3 class="search-title">
					<?php if (is_category()): ?>
						<?php echo __("Category: ", MD_THEME_NAME);  echo '<span>'.single_cat_title("", false).'</span>'; ?>
					<?php elseif(is_tag()): ?>
						<?php echo __("Tag: ", MD_THEME_NAME);  echo '<span>'.single_tag_title("", false).'</span>'; ?>
					<?php elseif(is_day()): ?>
						<?php echo __("Day: ", MD_THEME_NAME);  echo '<span>'.get_the_time('F jS, Y').'</span>'; ?>
					<?php elseif(is_month()): ?>
						<?php echo __("Month: ", MD_THEME_NAME);  echo '<span>'.get_the_time('F, Y').'</span>'; ?>
					<?php elseif(is_year()): ?>
						<?php echo __("Year: ", MD_THEME_NAME);  echo '<span>'.get_the_time('Y').'</span>'; ?>
					<?php elseif(is_author()): ?>
						<?php global $author; $userdata = get_userdata($author); ?>
						<?php echo __("Author:", MD_THEME_NAME); ?> <?php echo '<span>'.$userdata->display_name.'</span>'; ?>
					<?php else: ?>
						<?php echo __("Archive", MD_THEME_NAME); ?>
					<?php endif ?>
				</h3>
					
			<?php endif; ?>
		
			<?php get_template_part('/templates/blog/blog-layout');?>

		</div>
	</div>

<div class="navigation">
	<span class="newer"><?php previous_posts_link(__('« Newer','example')) ?></span> <span class="older"><?php next_posts_link(__('Older »','example')) ?></span>
</div><!-- /.navigation -->

<?php get_footer(); ?>