<?php
/* Template Name: Participants */
  global $wp;
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  get_header();
?>

<!--main-site-->
<main class="main-site main-site--hide js-main-site">

  <?php get_template_part("components/top") ?>

  <!--layout-primary-->
  <div class="layout-primary layout-primary--participants">
    <div class="container">
      <div class="layout-primary__content">
        <section class="layout-primary__side">

          <?php get_template_part("components/sidenav") ?>

          <?php get_template_part("components/upcoming-events") ?>

        </section>
        <section class="layout-primary__posts">
          <div class="layout-primary__head">
            <div class="layout-primary__main">
              <h2 class="layout-primary__name"><?= get_the_title() ?></h2>
            </div>
            <!--sort-->
            <div class="sort">
              <button class="sort__btn btn btn--sort js-sort-btn" type="button">
                <?= (isset($_GET['sort'])) ? (($_GET['sort'] == 'asc') ? 'A — Z' : 'Z — A') : 'Sort'; ?>
                <i class="fi fi-arrow-down"></i>
              </button>
              <ul class="sort__list">
                <li class="sort__item<?= (isset($_GET['sort']) == 'asc') ? ' active' : ''; ?>">
                  <a class="sort__link" href="<?= home_url($wp->request) ?>?sort=asc">A — Z</a>
                </li>
                <li class="sort__item<?= (isset($_GET['sort']) == 'desc') ? ' active' : ''; ?>">
                  <a class="sort__link" href="<?= home_url($wp->request) ?>?sort=desc">Z — A</a>
                </li>
              </ul>
            </div>
            <!--/sort-->
          </div>
          <div class="layout-primary__body">
            <?php
              if (isset($_GET['sort'])) {
                if ($_GET['sort'] === 'asc') {
                  $args = array(
                    'post_type' => 'participants',
                    'posts_per_page' => 12,
                    'post_status' => 'publish',
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'paged' => $paged,
                  );
                } else {
                  $args = array(
                    'post_type' => 'participants',
                    'posts_per_page' => 12,
                    'post_status' => 'publish',
                    'orderby' => 'title',
                    'order' => 'DESC',
                    'paged' => $paged,
                  );
                }
              } else {
                $args = array(
                  'post_type' => 'participants',
                  'posts_per_page' => 12,
                  'post_status' => 'publish',
                  'orderby' => 'post_date',
                  'order' => 'DESC',
                  'paged' => $paged,
                );
              }
              $query = new WP_Query($args);
            ?>
            <?php if (!empty($query->have_posts())): ?>
              <div class="layout-primary__list js-layout-primary">
                <div class="layout-primary__sizer"></div>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                  <!--card-primary-->
                  <div class="card-primary">
                    <div class="card-primary__box">
                      <a class="card-primary__link" href="<?= the_permalink() ?>"><?= get_the_title() ?></a>
                      <figure class="card-primary__img">
                        <img class="card-primary__img__el" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_title() ?>" />
                      </figure>
                      <h3 class="card-primary__title"><?= get_the_title() ?></h3>
                      <p class="card-primary__desc"><?= get_the_excerpt() ?></p>
                    </div>
                  </div>
                  <!--/card-primary-->
                <?php endwhile; ?>
              </div>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>

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

</main>
<!--/.main-site-->

<?php
  get_footer();
?>