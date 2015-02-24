<?php

/*
Template Name: Recent Post
*/

get_header();

// Set up the paged variable
$paged = ( isset( $_GET['pg'] ) && intval( $_GET['pg'] ) > 0 )? intval( $_GET['pg'] ) : 1;
query_posts( array( 'post_type' => 'post', 'paged' => $paged, 'posts_per_page' => 1 ) );

?>
<?php if ( have_posts() ) : ?>
    <?php while( have_posts() ) : the_post(); ?>
        <div id="post-<?php echo $post->ID; ?>" <?php post_class(); ?>>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="post-excerpt">
                <?php the_excerpt(); ?>
            </div>
        </div>
    <?php endwhile; ?>
    <?php if ( $wp_query->max_num_pages > 1 ) : ?>
        <div class="pagination">
            <?php for ( $i = 1; $i <= $wp_query->max_num_pages; $i ++ ) { 
                $link = $i == 1 ? remove_query_arg( 'pg' ) : add_query_arg( 'pg', $i );
                echo '<a href="' . $link . '"' . ( $i == $paged ? ' class="active"' : '' ) . '>' . $i . '</a>';
            } ?>
        </div>
    <?php endif ?>
<?php else : ?>
    <div class="404 not-found">
        <h3>Not Found</h3>
        <div class="post-excerpt">
            <p>Sorry, but there are no more posts here... Please try going back to the <a href="<?php echo remove_query_arg( 'pg' ); ?>">main page</a></p>
        </div>
    </div>
<?php endif;

// Make sure the default query stays intact
wp_reset_query();

get_footer();
?>