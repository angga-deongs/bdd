<?php
  get_header();
?>

<!--main-site-->
<main class="main-site main-site--hide js-main-site">

  <?php get_template_part("components/top") ?>

  <!--single-->
  <div class="single single--posts">
    <div class="container">
      <div class="single__content">
        <section class="single__side">

          <?php get_template_part("components/sidenav") ?>

          <!--desktop-->
          <!--single-events-->
          <div class="single-events">
            <figure class="single-events__img">
              <img class="single-events__img__el" src="<?= get_field('image') ?>" alt="<?= the_title() ?>" />
            </figure>
            <?php if (get_field('date')): ?>
              <p class="single-events__date"><?= get_field('date') ?></p>
            <?php endif; ?>
            <?php if (get_field('time')): ?>
              <p class="single-events__time"><?= get_field('time') ?></p>
            <?php endif; ?>
            <ul class="single-events__share">
              <li class="single-events__share__item">
                <a class="single-events__share__link" href="https://www.facebook.com/sharer/sharer.php?u=<?= the_permalink() ?>" target="_blank">
                  <i class="fi fi-fb"></i>
                </a>
              </li>
              <li class="single-events__share__item">
                <a class="single-events__share__link" href="https://twitter.com/intent/tweet?url=<?= the_permalink() ?>" target="_blank">
                  <i class="fi fi-tw"></i>
                </a>
              </li>
              <li class="single-events__share__item">
                <?php if ( wp_is_mobile() ) : ?>
                  <button class="single-events__share__link btn" type="button" onclick="window.open('whatsapp://send?text=<?= the_permalink() ?>')">
                    <i class="fi fi-wa"></i>
                  </button>
                <?php else : ?>
                  <button class="single-events__share__link btn" type="button" onclick="window.open('https://web.whatsapp.com://send?text=<?= the_permalink() ?>')">
                    <i class="fi fi-wa"></i>
                  </button>
                <?php endif; ?>
              </li>
              <li class="single-events__share__item">
                <a class="single-events__share__link" href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site <?= the_permalink() ?>" target="_blank">
                  <i class="fi fi-mail"></i>
                </a>
              </li>
              <li class="single-events__share__item">
                <button class="single-events__share__link btn js-copy-link" type="button" data-link="<?= the_permalink() ?>">
                  <i class="fi fi-copy"></i>
                </button>
                <div class="tooltip">
                  <span class="tooltip__text">Copied!</span>
                </div>
              </li>
            </ul>
            <div class="single-events__action">
              <a class="btn btn--tertiary" href="#">Get Ticket</a>
            </div>
            <div class="single-events__apps">
              <a class="single-events__apps__link" href="#" target="_blank">
                <figure class="single-events__apps__img">
                  <img class="single-events__apps__img__el" src="<?= get_template_directory_uri() ?>/assets/img/dummy/app-store.png" alt="App Store" />
                </figure>
              </a>
              <a class="single-events__apps__link" href="#" target="_blank">
                <figure class="single-events__apps__img">
                  <img class="single-events__apps__img__el" src="<?= get_template_directory_uri() ?>/assets/img/dummy/google-play.png" alt="Google Play" />
                </figure>
              </a>
            </div>
          </div>
          <!--/single-events-->
          <!--/desktop-->
        </section>
        <section class="single__posts">
          <div class="single__head">
            <?php
              $categories = get_the_category();
              $subcategories = [];
              if ($categories) foreach ($categories as $category):
                if ($category->parent !== 0) {
                  $subcategories[] = $category->name;
                }
              endforeach;
              $tags = get_the_tags();
              $tag = array();
              if ($tags) foreach ($tags as $value):
                $tag[] = $value->term_id;
              endforeach;
            ?>
            <h2 class="single__category"><?= implode(', ', $subcategories) ?></h2>
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
          <!--single-events-->
          <div class="single-events">
            <figure class="single-events__img">
              <img class="single-events__img__el" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title() ?>" />
            </figure>
            <?php if (get_field('date')): ?>
              <p class="single-events__date"><?= get_field('date') ?></p>
            <?php endif; ?>
            <?php if (get_field('time')): ?>
              <p class="single-events__time"><?= get_field('time') ?></p>
            <?php endif; ?>
            <ul class="single-events__share">
              <li class="single-events__share__item">
                <a class="single-events__share__link" href="https://www.facebook.com/sharer/sharer.php?u=<?= the_permalink() ?>" target="_blank">
                  <i class="fi fi-fb"></i>
                </a>
              </li>
              <li class="single-events__share__item">
                <a class="single-events__share__link" href="https://twitter.com/intent/tweet?url=<?= the_permalink() ?>" target="_blank">
                  <i class="fi fi-tw"></i>
                </a>
              </li>
              <li class="single-events__share__item">
              <?php if ( wp_is_mobile() ) : ?>
                  <button class="single-events__share__link btn" type="button" onclick="window.open('whatsapp://send?text=<?= the_permalink() ?>')">
                    <i class="fi fi-wa"></i>
                  </button>
                <?php else : ?>
                  <button class="single-events__share__link btn" type="button" onclick="window.open('https://web.whatsapp.com://send?text=<?= the_permalink() ?>')">
                    <i class="fi fi-wa"></i>
                  </button>
                <?php endif; ?>
              </li>
              <li class="single-events__share__item">
                <a class="single-events__share__link" href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site <?= the_permalink() ?>" target="_blank">
                  <i class="fi fi-mail"></i>
                </a>
              </li>
              <li class="single-events__share__item">
                <button class="single-events__share__link btn js-copy-link" type="button" data-link="<?= the_permalink() ?>">
                  <i class="fi fi-copy"></i>
                </button>
                <div class="tooltip">
                  <span class="tooltip__text">Copied!</span>
                </div>
              </li>
            </ul>
            <div class="single-events__action">
              <a class="btn btn--tertiary" href="#" target="_blank">Get Ticket</a>
            </div>
            <div class="single-events__apps">
              <a class="single-events__apps__link" href="#" target="_blank">
                <figure class="single-events__apps__img">
                  <img class="single-events__apps__img__el" src="<?= get_template_directory_uri() ?>/assets/img/dummy/app-store.png" alt="App Store" />
                </figure>
              </a>
              <a class="single-events__apps__link" href="#" target="_blank">
                <figure class="single-events__apps__img">
                  <img class="single-events__apps__img__el" src="<?= get_template_directory_uri() ?>/assets/img/dummy/google-play.png" alt="Google Play" />
                </figure>
              </a>
            </div>
          </div>
          <!--/single-events-->
          <!--/mobile-->
        </section>
        <section class="single__related">
          <h2 class="single__related__title">Related Article</h2>
          <div class="single__related__list">
            <?php
              $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'orderby' => 'rand',
                'post__not_in' => array($post->ID),
                'tax_query' => array(
                  'relation' => 'OR',
                  array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $category->term_id
                  ),
                  array(
                    'taxonomy' => 'post_tag',
                    'field' => 'term_id',
                    'terms' => $tag
                  ),
                )
              );
              $query = new WP_Query($args);
              if (!empty($query->have_posts())) while ($query->have_posts()) : $query->the_post(); ?>
                <?php
                  $rel_categories = get_the_category();
                  $rel_subcategories = [];
                  if ($rel_categories) foreach ($rel_categories as $rel_category):
                    if ($rel_category->parent !== 0):
                      $rel_subcategories[] = $rel_category->name;
                    endif;
                  endforeach;
                ?>
                <!--card-primary-->
                <div class="card-primary">
                  <div class="card-primary__box">
                    <a class="card-primary__link" href="<?= the_permalink() ?>"><?= the_title() ?></a>
                    <figure class="card-primary__img">
                      <img class="card-primary__img__el" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title() ?>" />
                    </figure>
                    <h3 class="card-primary__title"><?= the_title() ?></h3>
                    <?php if (get_field('date')): ?>
                      <h6 class="card-primary__date"><?= get_field('date') ?></h6>
                    <?php endif; ?>
                    <h6 class="card-primary__tag"><?= implode(', ', $rel_subcategories) ?></h6>
                    <p class="card-primary__desc"><?= get_the_excerpt() ?></p>
                  </div>
                </div>
                <!--/card-primary-->
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
              <?php if ($query->post_count < 3): ?>
                <?php
                  $morePost = '';
                  $morePost = 3 - $query->post_count;
                  $argsMore = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => $morePost,
                    'orderby' => 'rand',
                    'post__not_in' => array($post->ID)
                  );
                  $queryMore = new WP_Query($argsMore);
                ?>
                <?php while ($queryMore->have_posts()) : $queryMore->the_post(); ?>
                <?php
                  $rel_categories = get_the_category();
                  $rel_subcategories = [];
                  if ($rel_categories) foreach ($rel_categories as $rel_category):
                    if ($rel_category->parent !== 0):
                      $rel_subcategories[] = $rel_category->name;
                    endif;
                  endforeach;
                ?>
                  <!--card-primary-->
                  <div class="card-primary">
                    <div class="card-primary__box">
                      <a class="card-primary__link" href="<?= the_permalink() ?>"><?= the_title() ?></a>
                      <figure class="card-primary__img">
                        <img class="card-primary__img__el" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= the_title() ?>" />
                      </figure>
                      <h3 class="card-primary__title"><?= the_title() ?></h3>
                      <?php if (get_field('date')): ?>
                        <h6 class="card-primary__date"><?= get_field('date') ?></h6>
                      <?php endif; ?>
                      <h6 class="card-primary__tag"><?= implode(', ', $rel_subcategories) ?></h6>
                      <p class="card-primary__desc"><?= get_the_excerpt() ?></p>
                    </div>
                  </div>
                  <!--/card-primary-->
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
              <?php endif; ?>
          </div>
          <a class="single__related__action btn btn--primary" href="<?= get_term_link($category->term_id) ?>">See All</a>
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