<?php
/* Add shortcodes for post title and post date
  - sc_post_title
  - sc_post_date */
  function post_title_shortcode(){
    global $post;
    return get_the_title($post->ID);
  }
  add_shortcode( 'sc_post_title', 'post_title_shortcode' );
  
  function post_date_shortcode(){
    global $post;
    return get_the_date('Y-m-d', $post->ID);
  }
  add_shortcode( 'sc_post_date', 'post_date_shortcode' );
  