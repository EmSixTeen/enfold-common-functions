<?php
/* 
 * Reduced parallax effect for specific ID
 */
add_filter('avf_parallax_speed','avia_change_parallax_ratio', 10, 2);
function avia_change_parallax_ratio($ratio, $id){
	if($id != 'parallax_alt') return;
	$ratio = "0.1";
	return $ratio;
}
