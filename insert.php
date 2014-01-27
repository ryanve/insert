<?php
/*
Plugin Name: Insert
Plugin URI: http://github.com/ryanve/insert
Description: Insert posts, hooks, or templates via shortcode.
Version: 0.1.0
Author: Ryan Van Etten
Author URI: http://ryanve.com
License: MIT
*/

add_shortcode(basename(__FILE__, '.php'), function($atts, $inner = null, $name = null) {
  $result = '';
  $defaults = array_fill_keys(array('query', 'action', 'filter', 'data', 'template'), null);
  extract(shortcode_atts($defaults, array_intersect_key($atts, $defaults), $name));
  is_string($data) and $data = wp_parse_args(html_entity_decode($data));
  
  $run = function() use ($inner, $action, $filter, $data, $template) {
    if ($action) do_action($action, $data);
    if ($filter) echo apply_filters($filter, $inner);
    if ($template) locate_template($template, true, false);    
  };

  ob_start(function($output) use (&$result) {
    $result .= $output; // capture echoes
  });
  
  if ($query) {
    global $post;
    $old =&$post;
    is_string($query) and $query = html_entity_decode($query);
    foreach (get_posts($query) as $p)
      setup_postdata($post = $p) xor $run();
    $post =&$old;
  } else {
    $run();
  }
  
  ob_end_flush();
  return $result;
});