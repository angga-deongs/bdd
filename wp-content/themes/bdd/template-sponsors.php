<?php
/* Template Name: Sponsors */

  $GLOBALS['current'] = 'sponsors';
  $fields = get_fields();
  get_header();
?>

<!--main-site-->
<main class="main-site main-site--hide js-main-site">

  <?php get_template_part("components/top") ?>

  <!--sponsors-->
  <div class="sponsors">
    <div class="container">
      <div class="sponsors__content">
        <section class="sponsors__side">

          <?php get_template_part("components/sidenav") ?>

          <div class="sponsors__txt">
            <?= the_content() ?>
          </div>
        </section>
        <section class="sponsors__posts">
          <div class="sponsors__head">
            <h2 class="sponsors__title"><?= the_title() ?></h2>
            <div class="sponsors__txt">
              <?= the_content() ?>
            </div>
          </div>
          <div class="sponsors__body">
            <?php if ($fields['sponsors']) foreach ($fields['sponsors'] as $value): ?>
              <div class="sponsors__row">
                <h3 class="sponsors__subtitle"><?= $value['title'] ?></h3>
                <ul class="sponsors__list">
                  <?php if ($value['list']) foreach($value['list'] as $item): ?>
                    <li class="sponsors__item">
                      <?php if ($item['link']): ?>
                        <a href="<?= $item['link']?>" target="_blaank">
                          <figure class="sponsors__img">
                            <img class="sponsors__img__el" src="<?= $item['logo'] ?>" alt="<?= $value['title'] ?>" />
                          </figure>
                        </a>
                      <?php else: ?>
                        <figure class="sponsors__img">
                          <img class="sponsors__img__el" src="<?= $item['logo'] ?>" alt="<?= $value['title'] ?>" />
                        </figure>
                      <?php endif; ?>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endforeach; ?>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!--/sponsors-->

</main>
<!--/main-site-->

<?php
  get_footer();
?>