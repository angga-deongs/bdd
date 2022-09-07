<?php $term = get_queried_object();  ?>

<!--header-->
<header class="header">
  <div class="container">
    <div class="header__inner">
      <!--header-logo-->
      <a class="header__logo" href="<?= site_url() ?>">
        <img class="header__logo__el" src="<?= get_template_directory_uri() ?>/assets/img/logo/hirogroup.svg" alt="<?= bloginfo('name') ?>" />
      </a>
      <!--header-menu-->
      <nav class="header__menu">
        <ul class="header__list">
          <li class="header__item<?= ($post->post_name === 'about') ? ' header__item--active' : '' ?>">
            <a class="header__link" href="<?= site_url('about') ?>">About</a>
          </li>
          <li class="header__item header__item--dropdown">
            <a class="header__link js-header-dropdown" href="#">Brands</a>
            <ul class="header__dropdown">
              <?php 
                $brands = get_terms(array(
                  'taxonomy' => 'brands_category',
                  'hide_empty' => true
                ));
              ?>
              <?php if (!empty($brands)) foreach ($brands as $value): ?> 
                <li class="header__dropdown__item<?= ($term->slug === $value->slug) ? ' header__dropdown__item--active' : '' ?>">
                  <a class="header__dropdown__link" href="<?= site_url('brands/' . $value->slug) ?>"><?= $value->name ?></a>
                </li>
              <?php endforeach; ?>
            </ul>
          </li>
          <li class="header__item header__item--dropdown">
            <a class="header__link js-header-dropdown" href="#">What's On</a>
            <ul class="header__dropdown">
              <li class="header__dropdown__item<?= ($post->post_name === 'news') ? ' header__dropdown__item--active' : '' ?>">
                <a class="header__dropdown__link" href="<?= site_url('news') ?>">News</a>
              </li>
              <li class="header__dropdown__item<?= ($post->post_name === 'event-and-promotion') ? ' header__dropdown__item--active' : '' ?>">
                <a class="header__dropdown__link" href="<?= site_url('event-and-promotion') ?>">Event & Promotion</a>
              </li>
            </ul>
          </li>
          <li class="header__item<?= ($post->post_name === 'contacts') ? ' header__item--active' : '' ?>">
            <a class="header__link" href="<?= site_url('contacts') ?>">Contacts</a>
          </li>
        </ul>
      </nav>
      <!--burger-menu-->
      <button class="burger-menu js-burger-menu" type="button">
        <span class="burger-menu__bar"></span>
        <span class="burger-menu__bar"></span>
      </button>
    </div>
  </div>
</header>
<!--/.header-->