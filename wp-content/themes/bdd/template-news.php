<?php
/*
  Template Name: News
*/
?>

<?php
  $fields = get_fields();
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  get_header();
?>

<!--main-site-->
<main class="main-site main-site--hide js-main-site">
  <!--section-primary-->
  <section class="section-primary section-primary--news">
    <div class="container">
      <div class="section-primary__content">
        <aside class="section-primary__aside load-hidden">
          <h1 class="section-primary__title"><?= the_title() ?></h1>
        </aside>
        <?php
          $args = array(
            'post_type' => 'news',
            'posts_per_page' => 6,
            'post_status' => 'publish',
            'orderby' => 'post_date',
            'order' => 'DESC'
          );
          $query = new WP_Query($args);
        ?>
        <?php if (!empty($query->have_posts())): ?>
          <!--section-primary-list-->
          <div class="section-primary__list" data-length="<?= $query->found_posts ?>">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
            <?php
              /* taxonomy category --------------------------------------------------------- */
              $tax_category = [];
              if (get_the_terms(get_the_ID(), 'news_category')) foreach (get_the_terms(get_the_ID(), 'news_category') as $category):
                $tax_category[] = $category->name;
              endforeach; 
            ?>
              <!--card-primary-->
              <div class="card-primary load-hidden">
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
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          </div>
        <?php else: ?>
          <div class="data-not-found load-hidden">
            <p>Data Not Found</p>
          </div>
        <?php endif; ?>
      </div>
      <div class="section-primary__action">
        <button class="section-primary__action__btn btn btn--txt js-news-load-more" type="button">more</button>
      </div>
    </div>
  </section>
  <!--/.section-primary-->
</main>
<!--/.main-site-->

<?php
  get_footer();
?>