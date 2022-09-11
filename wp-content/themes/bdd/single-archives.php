<?php
  get_header();
?>

<!--main-site-->
<main class="main-site main-site--hide js-main-site">

  <?php get_template_part("components/top") ?>

  <!--archive-->
  <div class="archive">
    <div class="container">
      <div class="archive__content">
        <section class="archive__side">

          <?php get_template_part("components/sidenav") ?>

          <div class="archive__side__inner">
            <h3 class="archive__side__title">Archives<i class="fi fi-arrow-right"></i></h3>
            <?php 
              $args = array(
                'post_type' => 'archives',
                'posts_per_page' => -1,
                'post_status' => 'publish',
                'orderby' => 'title',
                'order' => 'ASC'
              );
              $query = new WP_Query($args);
              $term_slug = get_the_terms($post->ID, 'archives_category')[0]->slug;
              $term_name = get_the_terms($post->ID, 'archives_category')[0]->name;
            ?>
            <?php if (!empty($query->have_posts())): ?>
              <ul class="archive__side__list">
                <?php while ($query->have_posts()) : $query->the_post(); ?>

                <?php
                  $term_list = get_the_terms($post->ID, 'archives_category');
                  $types ='';
                  foreach ($term_list as $term_single) {
                      $types .= ucfirst($term_single->slug).', ';
                  }
                  $typesz = rtrim($types, ', ');
                ?>

                  <li class="archive__side__item<?= ($term_slug === $typesz) ? ' active' : '' ?>">
                    <a class="archive__side__link" href="<?= the_permalink() ?>"><?= $typesz ?></a>
                  </li>
                <?php endwhile; ?>
              </ul>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
          </div>
        </section>
        <section class="archive__posts">
          <div class="archive__head">
            <h2 class="archive__title"><?= $term_name ?> : <?= the_title() ?></h2>
          </div>
          <div class="archive__body">
            <?= the_content() ?>
          </div>
        </section>
        <section class="archive__related">
          <h2 class="archive__related__title">Information</h2>
          <div class="archive__related__content">
            <?= get_field('information') ?>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!--/archive-->

</main>
<!--/main-site-->

<?php
  get_footer();
?>