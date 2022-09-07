<?php
  get_header();
?>

<!--main-site-->
<main class="main-site main-site--hide js-main-site">
  <!--banner-->
  <section class="banner banner--brands">
    <div class="container">
      <div class="banner__list js-banner">
        <?php if (get_field('banner')) foreach (get_field('banner') as $value): ?>
          <!--banner-item-->
          <div class="banner__item<?= ($value['logo']) ? ' banner__item--logo' : ''; ?><?= ($value['title']) ? ' banner__item--txt' : ''; ?>">
            <?php if ($value['logo']): ?>
              <figure class="banner__logo">
                <img class="brands-banner__logo__el" src="<?= $value['logo'] ?>" alt="<?= strip_tags(get_the_title()) ?>" />
              </figure>
            <?php endif; ?>
            <figure class="banner__img">
              <img class="banner__img__el banner__img__el--d" src="<?= $value['image_d']?>" alt="<?= strip_tags(get_the_title()) ?>" />
              <?php if ($value['image_m']): ?>
                <img class="banner__img__el banner__img__el--m" src="<?= $value['image_m'] ?>" alt="<?= strip_tags(get_the_title()) ?>" />
              <?php else: ?>
                <img class="banner__img__el banner__img__el--m" src="<?= $value['image_d'] ?>" alt="<?= strip_tags(get_the_title()) ?>" />
              <?php endif; ?>
            </figure>
            <?php if ($value['title']): ?>
              <h2 class="banner__title"><?= $value['title'] ?></h2>
            <?php endif; ?>
          </div>
          <!--/.banner-item-->
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <!--/.banner-->
</main>
<!--/.main-site-->

<?php
  get_footer();
?>
