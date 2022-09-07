<?php

/* -------------------------------------------------------------------------- */
/* Custom Post Type                                                           */
/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/* Archives                                                                   */
/* -------------------------------------------------------------------------- */

add_action('init', 'c6_wp_post_archives');

function c6_wp_post_archives() {

  $labels = array(
    'name' => _x('Archives', 'post type general name', 'your-plugin-textdomain'),
    'singular_name' => _x('Archives', 'post type singular name', 'your-plugin-textdomain'),
    'menu_name' => _x('Archives', 'admin menu', 'your-plugin-textdomain'),
    'name_admin_bar' => _x('Archives', 'add new on admin bar', 'your-plugin-textdomain'),
    'add_new' => _x('Add New', 'Archives', 'your-plugin-textdomain'),
    'add_new_item' => __('Add New Archives', 'your-plugin-textdomain'),
    'new_item' => __('New Archives', 'your-plugin-textdomain'),
    'edit_item' => __('Edit Archives', 'your-plugin-textdomain'),
    'view_item' => __('View Archives', 'your-plugin-textdomain'),
    'all_items' => __('All Archives', 'your-plugin-textdomain'),
    'search_items' => __('Search Archives', 'your-plugin-textdomain'),
    'parent_item_colon' => __('Parent Archives:', 'your-plugin-textdomain'),
    'not_found' => __('No Archives found.', 'your-plugin-textdomain'),
    'not_found_in_trash' => __('No Archives found in Trash.', 'your-plugin-textdomain')
  );
  
  $args = array(
    'labels' => $labels,
    'description'  => __('Description.', 'your-plugin-textdomain'),
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'archive/detail'),
    'capability_type' => 'post',
    'has_archive' => true,
    'show_in_rest' => true,
    'hierarchical' => true,
    'menu_position' => 4,
    'taxonomies' => array(),
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt')
  );

  register_post_type('archives', $args);

}

/* -------------------------------------------------------------------------- */
/* Participants                                                               */
/* -------------------------------------------------------------------------- */

add_action('init', 'c6_wp_post_participants');

function c6_wp_post_participants() {

  $labels = array(
    'name' => _x('Participants', 'post type general name', 'your-plugin-textdomain'),
    'singular_name' => _x('Participants', 'post type singular name', 'your-plugin-textdomain'),
    'menu_name' => _x('Participants', 'admin menu', 'your-plugin-textdomain'),
    'name_admin_bar' => _x('Participants', 'add new on admin bar', 'your-plugin-textdomain'),
    'add_new' => _x('Add New', 'Participants', 'your-plugin-textdomain'),
    'add_new_item' => __('Add New Participants', 'your-plugin-textdomain'),
    'new_item' => __('New Participants', 'your-plugin-textdomain'),
    'edit_item' => __('Edit Participants', 'your-plugin-textdomain'),
    'view_item' => __('View Participants', 'your-plugin-textdomain'),
    'all_items' => __('All Participants', 'your-plugin-textdomain'),
    'search_items' => __('Search Participants', 'your-plugin-textdomain'),
    'parent_item_colon' => __('Parent Participants:', 'your-plugin-textdomain'),
    'not_found' => __('No Participants found.', 'your-plugin-textdomain'),
    'not_found_in_trash' => __('No Participants found in Trash.', 'your-plugin-textdomain')
  );
  
  $args = array(
    'labels' => $labels,
    'description'  => __('Description.', 'your-plugin-textdomain'),
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'participant/detail'),
    'capability_type' => 'post',
    'has_archive' => true,
    'show_in_rest' => true,
    'hierarchical' => true,
    'menu_position' => 4,
    'taxonomies' => array(),
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt')
  );

  register_post_type('participants', $args);

}