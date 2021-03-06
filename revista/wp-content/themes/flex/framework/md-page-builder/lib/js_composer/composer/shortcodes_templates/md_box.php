<?php

extract(shortcode_atts(array(
    'class' 				=> '',
    'id'					=> '',
    'css_animation' 		=> '',
    'css_animation_delay' 	=> '',
    'bgcolor' 				=> '',
    'bordercolor' 			=> '',
), $atts));

$animated = ($css_animation) ? 'animate' : '';
$css_animation_delay = ($css_animation) ? ' data-delay="'.$css_animation_delay.'"' : '';

$class  = setClass(array('md-box-content', $animated, $css_animation, $class));
$id 	= setId($id);

$style =  ' style="background-color:'.$bgcolor.'; border-color:'.$bordercolor.'"'; 

$output .= '<div'.$class.$id.$style.$css_animation_delay.'>';
$output .= wpb_js_remove_wpautop($content);
$output .= '</div>';

echo $output;
