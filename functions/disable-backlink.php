<?php
/* Disable backlink to Kriesi in socket */
add_filter('kriesi_backlink','remove_backlink');
function remove_backlink(){
  $kriesi_at_backlink = '';

  return $kriesi_at_backlink;
}