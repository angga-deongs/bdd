<?php
  $cat = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  get_header();
?>

<!--main-site-->
<main class="main-site main-site--hide js-main-site">
  <!--brands-->
  <section class="brands">
    <div class="container">
      <h1 class="title-seo"><?= $cat->name ?></h1>
      <div class="brands__list">
        <?php
          $args = array(
            'post_type' => 'brands',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'orderby' => 'post_date',
            'order' => 'DESC',
            'paged' => $paged,
            'tax_query' => array(
              array(
                'taxonomy' => 'brands_category',
                'field' => 'slug',
                'terms' => $cat->slug,
              ),
            ),
          );
          $query = new WP_Query($args);
        ?>
        <?php if (!empty($query->have_posts())): ?>
          <?php while ($query->have_posts()) : $query->the_post(); ?>
            <!--card-secondary-->
            <div class="card-secondary load-hidden">
              <div class="card-secondary__box">
                <a class="card-secondary__link" href="<?= the_permalink() ?>"><?= get_the_title() ?></a>
                <figure class="card-secondary__img">
                  <img class="card-secondary__img__el" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_title() ?>" />
                </figure>
                <h2 class="card-secondary__title"><?= get_the_title() ?></h2>
              </div>
            </div>
            <!--/.card-secondary-->
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else: ?>
          <div class="data-not-found load-hidden">
            <p>Data Not Found</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>
<!--/.main-site-->

<?php
  get_footer();
?>