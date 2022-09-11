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
    'rewrite' => array('slug' => 'archive/%archives_category%'),
    'capability_type' => 'post',
    'has_archive' => true,
    'show_in_rest' => true,
    'hierarchical' => true,
    'menu_position' => 4,
    'taxonomies' => array('archives_category'),
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt')
  );

  register_post_type('archives', $args);

}

/* -------------------------------------------------------------------------- */
/* Archives Category                                                          */
/* -------------------------------------------------------------------------- */

function register_taxonomy_archives_category() {

  $archives_category_labels = array(
    'name' => _x( 'Archives Category', 'taxonomy general name' ),
    'singular_name' => _x( 'Archives Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Categories' ),
    'all_items' => __( 'All Categories' ),
    'parent_item' => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item' => __( 'Edit Category' ),
    'update_item' => __( 'Update Category' ),
    'add_new_item' => __( 'Add New Category' ),
    'new_item_name' => __( 'New Category Name' ),
    'menu_name' => __( 'Archives Categories' ),
  );

  register_taxonomy('archives_category', array('archives'), array(
    'hierarchical' => true,
    'labels' => $archives_category_labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'archives/category' ),
    'with_front' => false,
    'show_in_rest' => true,
  ));
}

add_action('init', 'register_taxonomy_archives_category', 0);

function wpa_course_post_link( $post_link, $id = 0 ){
  $post = get_post($id);  
  if ( is_object( $post ) ){
      $terms = wp_get_object_terms( $post->ID, 'archives_category' );
      if( $terms ){
          return str_replace( '%archives_category%' , $terms[0]->slug , $post_link );
      }
  }
  return $post_link;  
}

add_filter( 'post_type_link', 'wpa_course_post_link', 1, 3 );

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