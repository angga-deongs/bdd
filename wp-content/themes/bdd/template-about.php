<?php
/*
  Template Name: About
*/
?>

<?php
  $GLOBALS['current'] = 'about';
  $fields = get_fields();
  get_header();
?>

<!--main-site-->
<main class="main-site main-site--hide js-main-site">
  <!--banner-->
  <section class="banner banner--about">
    <div class="container">
      <h1 class="title-seo"><?= the_title() ?></h1>
      <div class="banner__list js-banner">
        <?php if ($fields['banner']) foreach ($fields['banner'] as $value): ?>
          <!--banner-item-->
          <div class="banner__item">
            <figure class="banner__img">
              <img class="banner__img__el banner__img__el--d" src="<?= $value['image_d'] ?>" alt="<?= strip_tags($value['title']) ?>" />
              <?php if ($value['image_m']): ?>
                <img class="banner__img__el banner__img__el--m" src="<?= $value['image_m'] ?>" alt="<?= strip_tags($value['title']) ?>" />
              <?php else: ?>
                <img class="banner__img__el banner__img__el--m" src="<?= $value['image_d'] ?>" alt="<?= strip_tags($value['title']) ?>" />
              <?php endif; ?>
            </figure>
            <h2 class="banner__title"><?= $value['title'] ?></h2>
          </div>
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

