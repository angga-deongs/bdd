<?php
/*
  Template Name: Contacts
*/

  $GLOBALS['current'] = 'contacts';
  $fields = get_fields();
  get_header();

?>

<!--main-site-->
<main class="main-site main-site--hide js-main-site">
  <!--contacts-->
  <section class="contacts">
    <div class="container">
      <h1 class="title-seo"><?= the_title() ?></h1>
      <div class="contacts__wrapper">
        <div class="contacts__left load-hidden">
          <?= the_content() ?>
        </div>
        <div class="contacts__right load-hidden">
          <h5 class="contacts__title"><?= $fields['title'] ?></h5>
          <div class="contacts__content">
            <p><?= $fields['description'] ?></p>
            <div class="contacts__form">
              <?= do_shortcode($fields['contact_form']) ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/.contacts-->
</main>
<!--/.main-site-->

<?php
  get_footer();
?>
