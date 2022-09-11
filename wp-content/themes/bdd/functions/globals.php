<?php

remove_action('wp_head', 'wp_generator');

/* -------------------------------------------------------------------------- */
/* hide admin bar                                                             */
/* -------------------------------------------------------------------------- */

add_filter('show_admin_bar', '__return_false');

/* -------------------------------------------------------------------------- */
/* display featured image                                                     */
/* -------------------------------------------------------------------------- */

add_theme_support( 'post-thumbnails' );

/* -------------------------------------------------------------------------- */
/* remove default width and height featured image                             */
/* -------------------------------------------------------------------------- */

add_filter( 'wp_lazy_loading_enabled', '__return_false' );  
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
  $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
  return $html;
}

/* -------------------------------------------------------------------------- */
/* remove posts in admin dashboard                                            */
/* -------------------------------------------------------------------------- */

function post_remove() { 
  remove_menu_page('edit-comments.php');
  remove_menu_page('tools.php');
}

add_action('admin_menu', 'post_remove');

/* -------------------------------------------------------------------------- */
/* change logo wordpress                                                      */
/* -------------------------------------------------------------------------- */

function c6_custom_logo() {  ?>
    <style type="text/css"> 
      body.login div#login h1 a {
        background-image: url(<?= get_template_directory_uri() ?>/assets/img/logo/bintaro-design-district.svg);
        background-size: contain;
        background-position: center center;
        width: 120px;
        padding-bottom: 30px; 
      }
    </style>
<?php 
}

add_action( 'login_enqueue_scripts', 'c6_custom_logo' );

/* -------------------------------------------------------------------------- */
/* Fix Pagination Category                                                    */
/* -------------------------------------------------------------------------- */

function c6_modify_category_query( $query ) {
  if ( ! is_admin() && $query->is_main_query() ) {
      if ( $query->is_category() ) {
          $query->set( 'posts_per_page', 9 );
      } 
  } 
}

add_action( 'pre_get_posts', 'c6_modify_category_query' );

function category_has_children( $term_id = 0, $taxonomy = 'category' ) {
  $children = get_categories( array( 
      'child_of'      => $term_id,
      'taxonomy'      => $taxonomy,
      'hide_empty'    => false,
      'fields'        => 'ids',
  ) );
  return ( $children );
}


function has_term_have_children( $term_id = '', $taxonomy = 'category' )
{
    // Check if we have a term value, if not, return false
    if ( !$term_id ) 
        return false;

    // Get term children
    $term_children = get_term_children( filter_var( $term_id, FILTER_VALIDATE_INT ), filter_var( $taxonomy, FILTER_SANITIZE_STRING ) );

    // Return false if we have an empty array or WP_Error object
    if ( empty( $term_children ) || is_wp_error( $term_children ) )
    return false;

    return true;
}