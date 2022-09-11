<?php
  $fields = get_fields(get_page_by_title('Home'));
  get_header();
?>

<!--snap-->
<div class="snap">

  <!--landing-->
  <div class="landing snap-section" data-section-name="landing">
    <div class="landing__img">
      <img class="landing__img__el landing__img__el--d" src="<?= $fields['image_d'] ?>" alt="<?= $fields['title'] ?>" />
      <img class="landing__img__el landing__img__el--m" src="<?= $fields['image_m'] ?>" alt="<?= $fields['title'] ?>" />
    </div>
    <div class="landing__logo">
      <img class="landing__logo__el" src="<?= get_template_directory_uri() ?>/assets/img/logo/bintaro-design-district-white.svg" alt="<?= $fields['title'] ?>" />
    </div>
    <div class="landing__txt">
      <h2 class="landing__txt__title"><?= $fields['title'] ?></h2>
      <p class="landing__txt__desc"><?= $fields['description'] ?></p>
      <img class="landing__txt__img" src="<?= $fields['logo'] ?>" alt="<?= $fields['title'] ?>" />
      <h2 class="landing__txt__year"><?= $fields['year'] ?></h2>
    </div>
    <div class="landing__arrow js-landing-arrow">
      <img class="landing__arrow__el" src="<?= get_template_directory_uri() ?>/assets/img/icons/arrow-landing.svg" alt="arrow" />
    </div>
  </div>
  <!--/landing-->

  <!--main-site-->
  <main class="main-site main-site--hide js-main-site snap-section" data-section-name="main">

    <?php get_template_part("components/top") ?>

    <!--home-->
    <div class="home">
      <div class="container">
        <div class="home__content">
          <!--home-nav-->
          <section class="home__side">

            <?php get_template_part("components/sidenav") ?>

            <?php get_template_part("components/upcoming-events") ?>

          </section>
          <?php
            // categories
            $categories = get_categories(array(
              'orderby' => 'name',
              'order'   => 'ASC',
              'parent'  => 0
            ));
            if ($categories) foreach ($categories as $category): ?>

              <!--home-posts-->
              <section class="home__posts">
                <!--home-head-->
                <div class="home__head">
                  <button class="home__category btn btn--secondary js-home-posts-category" type="button">
                    <span class="home__category__name"><?= trim($category->name) ?></span>
                    <i class="fi fi-arrow-right"></i>
                    <i class="fi fi-arrow-down"></i>
                  </button>
                  <span class="home__current-category"></span>
                  <?php
                    // sub categories
                    $subCategories = get_categories(array(
                      'child_of' => $category->term_id
                    ));
                    if ($subCategories): ?>
                      <ul class="home__sub-category js-home-sub-category">
                        <?php foreach ($subCategories as $subCategory): ?>
                          <li class="home__sub-category__item" data-slug="<?= $subCategory->slug ?>" data-id="<?= $subCategory->term_id ?>"><?= $subCategory->name ?></li>
                        <?php endforeach; ?>
                      </ul>
                    <?php endif; ?>
                </div>
                <!--home-list-->
                <div class="home__list"> 
                  <?php
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
                          'terms' => $category->term_id
                        ),
                      ),
                    );
                    $query = new WP_Query($args);

                    if (!empty($query->have_posts())):

                      while ($query->have_posts()) : $query->the_post();

                        get_template_part("components/card-primary");

                      endwhile;

                    endif;

                    wp_reset_postdata();
                  ?>
                </div>
                <a class="home__action btn btn--primary" href="<?= get_term_link($category->term_id) ?>">See All</a>
              </section>
              <!--/home-posts-->
          <?php endforeach; ?>
        </div>
        <div class="home__copyright">
          <p class="home__copyright__txt">2020 Bintaro Design District. All rights reserved.</p>
        </div>
      </div>
    </div>
    <!--/home-->

  </main>
  <!--/main-site-->

</div>
<!--/snap-->

<?php
  get_footer();
?>
