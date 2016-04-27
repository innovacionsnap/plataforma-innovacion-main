<?php global $post; ?>
<div class="read-more"><a href="<?php the_permalink(); ?>" title="<?php echo get_the_title($post->ID); ?>'"><?php echo __("Leer Mas..", MD_THEME_NAME); ?> <i class="typcn-arrow-right"></i></a></div>
