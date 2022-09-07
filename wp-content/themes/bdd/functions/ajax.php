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
/* News                                                                       */
/* -------------------------------------------------------------------------- */

function c6_more_news_ajax() {

  $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 6;
  $paged = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;

  header("Content-Type: text/html");

  $args = array(
    'post_type' => 'news',
    'posts_per_page' => $ppp,
    'post_status' => 'publish',
    'paged' => $paged
  );

  $loop = new WP_Query($args);
  if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post(); ?>
    <?php
    /* taxonomy category --------------------------------------------------------- */
    $tax_category = [];
    if (get_the_terms(get_the_ID(), 'news_category')) foreach (get_the_terms(get_the_ID(), 'news_category') as $category):
      $tax_category[] = $category->name;
    endforeach; 
    ?>
    <!--card-primary-->
    <div class="card-primary">
      <div class="card-primary__box">
        <a class="card-primary__link" href="<?= the_permalink() ?>"><?= get_the_title() ?></a>
        <figure class="card-primary__img">
          <img class="card-primary__img__el" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_title() ?>" />
        </figure>
        <h5 class="card-primary__category"><?= implode(',', $tax_category) ?></h5>
        <h2 class="card-primary__title"><?= get_the_title() ?></h2>
        <div class="card-primary__arrow">
          <i class="fi fi-arrow-right"></i>
        </div>
      </div>
    </div>
    <!--/.card-primary-->
  <?php endwhile; endif;
  wp_reset_postdata();
  die();
}

add_action('wp_ajax_more_news_ajax', 'c6_more_news_ajax');
add_action('wp_ajax_nopriv_more_news_ajax', 'c6_more_news_ajax');