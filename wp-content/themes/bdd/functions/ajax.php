<?php

/* -------------------------------------------------------------------------- */
/* Ajax                                                                       */
/* -------------------------------------------------------------------------- */

function c6_theme_enqueue_scripts() {
  wp_enqueue_script( 'app-script-ajax', get_template_directory_uri() . '/assets/js/app.min.js?1', array('jquery'), null, true );
  wp_localize_script( 'app-script-ajax', 'ajax_posts', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
  ));
}

add_action( 'wp_enqueue_scripts', 'c6_theme_enqueue_scripts' );


/* -------------------------------------------------------------------------- */
/* Ajax Dropdown                                                              */
/* -------------------------------------------------------------------------- */

function dropdown_ajax() {
  $category = $_POST['category'];

  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 5,
    'post_status' => 'publish',
    'orderby' => 'post_date',
    'order' => 'DESC',
    'tax_query' => array(
      array(
        'taxonomy' => 'category',
        'field' => 'term_id',
        'terms' => $category
      ),
    ),
  );

  $query = new WP_Query($args);

  if ($query->have_posts()):

    while ($query->have_posts()) : $query->the_post();

      get_template_part("components/card-primary");

    endwhile;

  endif;

  wp_reset_postdata();

  die();

}

add_action( 'wp_ajax_dropdown_ajax', 'dropdown_ajax');
add_action( 'wp_ajax_nopriv_dropdown_ajax', 'dropdown_ajax');