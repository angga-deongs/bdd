<?php
/* Template Name: Strategic Partners */

  $GLOBALS['current'] = 'strategic-partners';
  get_header();
?>

<!--main-site-->
<main class="main-site main-site--hide js-main-site">

  <?php get_template_part("components/top") ?>

  <!--default-->
  <div class="default default--strategic-partner">
    <div class="container">
      <div class="default__content">
        <section class="default__side">

          <?php get_template_part("components/sidenav") ?>

          <ul class="default__side__list js-default-side-list"></ul>
        </section>
        <section class="default__posts">
          <div class="default__head">
            <h2 class="default__title"><?= the_title() ?></h2>
          </div>
          <div class="default__body">
            <?= the_content() ?>
          </div>
        </section>
        <section class="default__related">
          <h2 class="default__related__title">Upcoming Events</h2>

          <?php get_template_part("components/upcoming-events") ?>

        </section>
      </div>
    </div>
  </div>
  <!--/default-->

</main>
<!--/main-site-->

<?php
  get_footer();
?>

