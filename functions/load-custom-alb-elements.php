<?php
/* Let custom ALB elements be loaded from child theme 
  - /shortcodes/
  - /shortcodes/custom/ 
  */
  add_filter('avia_load_shortcodes', 'avia_include_shortcode_template', 15, 1);
  function avia_include_shortcode_template($paths)
  {
    $template_url = get_stylesheet_directory();
        array_unshift($paths, $template_url.'/shortcodes/');
        array_unshift($paths, $template_url.'/shortcodes/custom/');
  
    return $paths;
  }