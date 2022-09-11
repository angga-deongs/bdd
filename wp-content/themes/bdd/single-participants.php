<?php
  get_header();
?>

<!--main-site-->
<main class="main-site main-site--hide js-main-site">

  <?php get_template_part("components/top") ?>

  <!--single-->
  <div class="single single--participants">
    <div class="container">
      <div class="single__content">
        <section class="single__side">

          <?php get_template_part("components/sidenav") ?>

          <!--desktop-->
          <!--address-->
          <div class="address">
            <h3><?= the_title() ?></h3>
            <?= get_field('information') ?>
          </div>
          <!--/address-->
          <!--/desktop-->
        </section>
        <section class="single__posts">
          <div class="single__head">
            <h2 class="single__category"><?= the_title() ?></h2>
          </div>
          <div class="single__body">
            <figure class="single__img">
              <img class="single__img__el" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title() ?>" />
            </figure>
            <h2 class="single__title"><?= the_title() ?></h2>
            <div class="single__txt">
              <?= the_content() ?>
            </div>
          </div>
          <!--mobile-->
          <!--address-->
          <div class="address">
            <h3><?= the_title() ?></h3>
            <?= get_field('information') ?>
          </div>
          <!--/address-->
          <!--/mobile-->
        </section>
        <section class="single__related">
          <h2 class="single__related__title">Related Participants</h2>
          <div class="single__related__list">
            <?php
              $args = array(
                'post_type' => 'participants',
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'orderby' => 'rand',
                'post__not_in' => array($post->ID)
              );
              $query = new WP_Query($args);
              if (!empty($query->have_posts())) while ($query->have_posts()) : $query->the_post(); ?>
                <!--card-primary-->
                <div class="card-primary">
                  <div class="card-primary__box">
                    <a class="card-primary__link" href="<?= the_permalink() ?>"><?= the_title() ?></a>
                    <figure class="card-primary__img">
                      <img class="card-primary__img__el" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title() ?>" />
                    </figure>
                    <h3 class="card-primary__title"><?= the_title() ?></h3>
                    <p class="card-primary__desc"><?= get_the_excerpt() ?></p>
                  </div>
                </div>
                <!--/card-primary-->
              <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          </div>
          <a class="single__related__action btn btn--primary" href="<?= site_url() ?>/participants">See All</a>
        </section>
      </div>
    </div>
  </div>
  <!--/single-->

</main>
<!--/main-site-->

<?php
  get_footer();
?>