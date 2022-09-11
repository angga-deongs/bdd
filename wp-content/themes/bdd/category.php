<?php
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  $category = get_queried_object();
  get_header();
?>

<!--main-site-->
<main class="main-site main-site--hide js-main-site">

  <?php get_template_part("components/top") ?>

  <!--layout-primary-->
  <div class="layout-primary layout-primary--category">
    <div class="container">
      <div class="layout-primary__content">
        <section class="layout-primary__side">

          <?php get_template_part("components/sidenav") ?>

          <?php get_template_part("components/upcoming-events") ?>

        </section>
        <section class="layout-primary__posts">
          <div class="layout-primary__head">
            <div class="layout-primary__main">
              <?php if ($category->parent !== 0):
                // subcategory
                $categories = get_categories(array(
                  'orderby' => 'name',
                  'order'   => 'ASC',
                  'parent'  => $category->parent
                )); ?>
                <a class="layout-primary__category" href="<?= get_term_link($category->parent) ?>"><?= get_term($category->parent)->name ?></a>
              <?php else:
                // category
                $categories = get_categories(array(
                  'orderby' => 'name',
                  'order'   => 'ASC',
                  'parent'  => 0
                ));
              ?>
                <h3 class="layout-primary__category"><?= $category->name ?></h3>
              <?php endif; ?>
              <?php
                if ($category->parent < 1 && category_has_children($category->term_id)):
                  $subCategories = get_categories(array(
                    'child_of' => $category->term_id
                  ));
                  if ($subCategories): ?>
                    <i class="fi fi-arrow-right"></i>
                    <ul class="layout-primary__sub-category">
                      <?php foreach ($subCategories as $subCategory): ?>
                        <li class="layout-primary__sub-category__item<?= ($category->slug === $subCategory->slug) ? ' active' : '' ?>">
                          <a class="layout-primary__sub-category__link" href="<?= get_term_link($subCategory->term_id) ?>"><?= $subCategory->name ?></a>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
              <?php else: ?>
                <?php
                $subCategories = get_categories(array(
                  'parent' => $category->parent
                ));
                if (category_has_children($category->term_id)):
                  if ($subCategories): ?>
                    <i class="fi fi-arrow-right"></i>
                    <ul class="layout-primary__sub-category">
                      <?php foreach ($subCategories as $subCategory): ?>
                        <li class="layout-primary__sub-category__item<?= ($category->slug === $subCategory->slug) ? ' active' : '' ?>">
                          <a class="layout-primary__sub-category__link" href="<?= get_term_link($subCategory->term_id) ?>"><?= $subCategory->name ?></a>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                <?php else: ?>
                  <?php if ($subCategories): ?>
                    <i class="fi fi-arrow-right"></i>
                    <ul class="layout-primary__sub-category">
                      <?php foreach ($subCategories as $subCategory): ?>
                        <li class="layout-primary__sub-category__item<?= ($category->slug === $subCategory->slug) ? ' active' : '' ?>">
                          <a class="layout-primary__sub-category__link" href="<?= get_term_link($subCategory->term_id) ?>"><?= $subCategory->name ?></a>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                <?php endif; ?>
              <?php endif; ?>
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
                <li class="sort__item<?= (isset($_GET['sort']) == 'desc') ? ' active' : 'a'; ?>">
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
                  'post_type' => 'post',
                  'posts_per_page' => 9,
                  'post_status' => 'publish',
                  'orderby' => 'title',
                  'order' => 'ASC',
                  'paged' => $paged,
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'category',
                      'field' => 'slug',
                      'terms' => $category->slug
                    )
                  )
                );
              } else {
                $args = array(
                  'post_type' => 'post',
                  'posts_per_page' => 9,
                  'post_status' => 'publish',
                  'orderby' => 'title',
                  'order' => 'DESC',
                  'paged' => $paged,
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'category',
                      'field' => 'slug',
                      'terms' => $category->slug
                    )
                  )
                );
              }
            } else {
              $args = array(
                'post_type' => 'post',
                'posts_per_page' => 9,
                'post_status' => 'publish',
                'orderby' => 'post_date',
                'order' => 'DESC',
                'paged' => $paged,
                'tax_query' => array(
                  array(
                    'taxonomy' => 'category',
                    'field' => 'slug',
                    'terms' => $category->slug
                  )
                )
              );
            }
            $my_query = new WP_Query($args);
            ?>
            <div class="layout-primary__list js-layout-primary">
              <div class="layout-primary__sizer"></div>
              <?php
                if (!empty($my_query->have_posts())):

                  while ($my_query->have_posts()) : $my_query->the_post();

                    get_template_part("components/card-primary");

                  endwhile;

                endif;

                wp_reset_postdata();
              ?>
            </div>
            <?php
              $pages =  paginate_links( array (
                'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                'total'        => $my_query->max_num_pages,
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
<!--/main-site-->

<?php
  get_footer();
?>