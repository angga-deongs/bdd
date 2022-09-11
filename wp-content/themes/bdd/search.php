<?php
global $wp;
$allsearch = new WP_Query("s=$s&showposts=-1");
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
get_header();
?>

<?php
  if (isset($_GET['sort'])) {
    if ($_GET['sort'] === 'asc') {
      $args = array(
        'post_type' => 'post',
        's' => $allsearch->query_vars['s'],
        'posts_per_page' => 9,
        'paged' => get_query_var('paged'),
        'post_status' => 'publish',
        'orderby' => 'title',
        'order' => 'ASC'
      );
    } else {
      $args = array(
        'post_type' => 'post',
        's' => $allsearch->query_vars['s'],
        'posts_per_page' => 9,
        'paged' => get_query_var('paged'),
        'post_status' => 'publish',
        'orderby' => 'title',
        'order' => 'DESC'
      );
    }
  } else {
    $args = array(
      'post_type' => 'post',
      's' => $allsearch->query_vars['s'],
      'posts_per_page' => 9,
      'paged' => get_query_var('paged'),
      'post_status' => 'publish',
      'orderby' => 'post_date',
      'order' => 'DESC'
    );
  }
  $query = new WP_Query($args);
  $count = $query->found_posts;
?>

<!--main-site-->
<div class="main-site main-site--hide js-main-site">

  <?php get_template_part("components/top") ?>

  <!--layout-primary-->
  <div class="layout-primary layout-primary--search-result">
    <div class="container">
      <div class="layout-primary__content">
        <section class="layout-primary__side">

          <?php get_template_part("components/sidenav") ?>

          <?php get_template_part("components/upcoming-events") ?>

        </section>
        <section class="layout-primary__posts">
          <div class="layout-primary__head">
            <div class="layout-primary__main">
              <h2 class="layout-primary__name"><?= $count ?> search results for "<?= $allsearch->query_vars['s'] ?>"</h2>
            </div>
            <!--sort-->
            <div class="sort">
              <button class="sort__btn btn btn--sort js-sort-btn" type="button">
                <?= (isset($_GET['sort'])) ? (($_GET['sort'] === 'asc') ? 'A — Z' : 'Z — A') : 'Sort'; ?>
                <i class="fi fi-arrow-down"></i>
              </button>
              <ul class="sort__list">
                <li class="sort__item<?= (isset($_GET['sort']) === 'asc') ? ' active' : ''; ?>">
                  <a class="sort__link" href="<?= home_url($wp->request) ?>?s=<?= $allsearch->query_vars['s'] ?>&sort=asc">A — Z</a>
                </li>
                <li class="sort__item<?= (isset($_GET['sort']) === 'desc') ? ' active' : ''; ?>">
                  <a class="sort__link" href="<?= home_url($wp->request) ?>?s=<?= $allsearch->query_vars['s'] ?>&sort=desc">Z — A</a>
                </li>
              </ul>
            </div>
            <!--/sort-->
          </div>
          <div class="layout-primary__body">
            <div class="layout-primary__list js-layout-primary">
              <div class="layout-primary__sizer"></div>
              <?php
                if (!empty($query->have_posts())):

                  while ($query->have_posts()) : $query->the_post();

                    get_template_part("components/card-primary");

                  endwhile;

                  wp_reset_postdata();

                endif;
              ?>
            </div>
            <?php
              $pages =  paginate_links( array (
                'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                'total'        => $query->max_num_pages,
                'current'      => max( 1, get_query_var( 'paged' ) ),
                'format'       => '?paged=%#%',
                'show_all'     => false,
                'type'         => 'array',
                'end_size'     => 1,
                'mid_size'     => 1,
                'prev_next'    => true,
                'prev_text'    => __( 'Prev', 'textdomain' ),
                'next_text'    => __( 'Next', 'textdomain' ),
                'add_args'     => false,
                'add_fragment' => '',
              ));
              if (is_array($pages)): ?>
                <!--pagination-->
                <div class="pagination">
                  <?php
                    echo '<ul>';
                    foreach ( $pages as $page ) {
                      echo "<li>$page</li>";
                    }
                    echo '</ul>';
                  ?>
                </div>
            <?php endif; ?>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!--/layout-primary-->

</div>
<!--/main-site-->

<?php
get_footer();
?>
