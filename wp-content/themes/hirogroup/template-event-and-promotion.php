<?php
/*
  Template Name: Event & Promotion
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
  <section class="section-primary section-primary--event">
    <div class="container">
      <div class="section-primary__content">
        <aside class="section-primary__aside load-hidden">
          <h1 class="section-primary__title">Event & Promotion</h1>
        </aside>
        <?php
          $args = array(
            'post_type' => 'event_promotion',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'orderby' => 'post_date',
            'order' => 'DESC'
          );
          $query = new WP_Query($args);
        ?>
        <?php if (!empty($query->have_posts())): ?>
          <!--section-primary-list-->
          <div class="section-primary__list">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
              <!--card-tertiary-->
              <div class="card-tertiary load-hidden" data-slug="<?= $post->post_name ?>" data-link="<?= get_field('link') ?>">
                <div class="card-tertiary__box">
                  <button class="card-tertiary__link js-card-tertiary-btn" type="button"><?= get_the_title() ?></button>
                  <figure class="card-tertiary__img">
                    <img class="card-tertiary__img__el" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= strip_tags(get_the_title()) ?>" />
                  </figure>
                  <h5 class="card-tertiary__category"><?= get_the_title() ?></h5>
                </div>
              </div>
              <!--/.card-tertiary-->
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          </div>
        <?php else: ?>
          <div class="data-not-found load-hidden">
            <p>Data Not Found</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <!--/.section-primary-->
</main>
<!--/.main-site-->

<!--popup-->
<div class="popup">
  <div class="popup__inner">
    <div class="popup__img">
      <img class="popup__img__el" src="" alt="" />
    </div>
  </div>
</div>
<!--/.popup-->

<?php
  get_footer();
?>