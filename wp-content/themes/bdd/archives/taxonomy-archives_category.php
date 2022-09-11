<?php
  $cat = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
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
            <ul class="archive__side__list">
              <?php 
                $archives = get_terms(array(
                  'taxonomy' => 'archives_category',
                  'hide_empty' => true
                ));
              ?>
              <?php if (!empty($archives)) foreach ($archives as $value): ?> 
                <li class="archive__side__item<?= ($cat->slug === $value->slug) ? ' active' : '' ?>">
                  <a class="archive__side__link" href="<?= site_url('archives/' . $value->slug) ?>"><?= $value->name ?></a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </section>
        <section class="archive__posts">
          <div class="archive__head">
            <h2 class="archive__title"><?= $cat->name ?> : <?= the_title() ?></h2>
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