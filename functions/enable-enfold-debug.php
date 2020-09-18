<?php
/* Enable debug mode in Avia Layout Builder */
add_action('avia_builder_mode', "builder_set_debug");
function builder_set_debug()
{
  return "debug";
}