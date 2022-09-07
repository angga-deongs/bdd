<?php get_template_part("header-single") ?>

<!--popup-->
<div class="popup show-popup">
  <div class="popup__inner">
    <a class="popup__link" href="<?= site_url() ?>/event-and-promotion"><?= get_the_title() ?></a>
    <div class="popup__img">
      <img class="popup__img__el" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_title() ?>" />
    </div>
  </div>
</div>
<!--/.popup-->

<?php get_template_part("footer-single") ?>