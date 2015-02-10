<?php 

define('WP_USE_THEMES', true);
include('http://innovacionlab.gob.ec/revista/wp-load.php'); 

$recent_posts = wp_get_recent_posts(array(
	'numberposts' => 10
));
	
// Do something with them
echo '<ul>';
foreach($recent_posts as $post) {
	echo '<li><a href="', get_permalink($post['ID']), '">', $post['post_title'], '</a></li>';
}
echo '</ul>';

?>