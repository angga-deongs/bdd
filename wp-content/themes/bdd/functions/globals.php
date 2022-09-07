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
        background-image: url(<?= get_template_directory_uri() ?>/assets/img/logo/hirogroup.svg);
        background-size: contain;
        background-position: center center;
        width: 120px;
        padding-bottom: 30px; 
      }
    </style>
<?php 
}

add_action( 'login_enqueue_scripts', 'c6_custom_logo' );
