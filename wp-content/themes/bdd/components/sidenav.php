<!--sidenav-->
<div class="sidenav">
  <div class="sidenav__head">
    <?php if (is_home()): ?>
      <button class="sidenav__logo btn js-sidenav-logo" type="button">
        <img class="sidenav__logo__el" src="<?= get_template_directory_uri() ?>/assets/img/logo/bintaro-design-district.svg" alt="bdd" />
      </button>
    <?php else: ?>
      <a class="sidenav__logo btn js-sidenav-logo" href="<?= site_url() ?>">
        <img class="sidenav__logo__el" src="<?= get_template_directory_uri() ?>/assets/img/logo/bintaro-design-district.svg" alt="bdd" />
      </a>
    <?php endif; ?>
    <button class="burger-menu js-burger-menu">
      <span class="burger-menu__bar"></span>
      <span class="burger-menu__bar"></span>
      <span class="burger-menu__bar"></span>
    </button>
  </div>
</div>
<!--/sidenav-->