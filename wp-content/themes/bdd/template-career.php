<?php
/*
  Template Name: Career
*/
?>

<?php
  $GLOBALS['current'] = 'career';
  $fields = get_fields();
  get_header();
?>

<!--main-site-->
<main class="main-site main-site--hide js-main-site">
  <!--career-->
  <section class="career">
    <div class="container">
      <?php get_template_part("components/card-box") ?>
      <!--/.card-box-->
      <div class="career__content">
        <div class="career__list">
          <?php if ($fields['left']) foreach ($fields['left'] as $value): ?>
            <!--career-item-->
            <div class="career__item load-hidden">
              <div class="career__box">
                <h5 class="career__subtitle"><?= $value['subtitle'] ?></h5>
                <h2 class="career__title"><?= $value['title'] ?></h2>
                <div class="career__desc">
                  <?= $value['description'] ?>
                </div>
                <div class="career__action">
                  <button class="btn career__btn js-career-btn" type="button">Read More</button>
                </div>
              </div>
            </div>
            <!--/.career-item-->
          <?php endforeach; ?>
        </div>
        <div class="career__list">
          <?php if ($fields['right']) foreach ($fields['right'] as $value): ?>
            <!--career-item-->
            <div class="career__item load-hidden">
              <div class="career__box">
                <h5 class="career__subtitle"><?= $value['subtitle'] ?></h5>
                <h2 class="career__title"><?= $value['title'] ?></h2>
                <div class="career__desc">
                  <?= $value['description'] ?>
                </div>
                <div class="career__action">
                  <button class="btn career__btn js-career-btn" type="button">Read More</button>
                </div>
              </div>
            </div>
            <!--/.career-item-->
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>
  <!--/.career-->
</main>
<!--/.main-site-->

<?php
  get_footer();
?>

