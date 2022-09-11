<?php $term = get_queried_object();  ?>

<!--header-->
<header class="header">
  <div class="header__content">
    <div class="header__top">
      <a class="header__logo" href="<?= site_url() ?>">
        <img class="header__logo__el" src="<?= get_template_directory_uri() ?>/assets/img/logo/bintaro-design-district-white-logo.svg" alt="bdd" />
      </a>
      <button class="header__close btn js-close-mobile-menu" type="button">
        <i class="fi fi-close"></i>
      </button>
    </div>
    <div class="header__menu js-header-menu">
      <nav class="header__nav">
        <ul class="header__list">
          <?php
            // categories
            $categories = get_categories(array(
              'orderby' => 'name',
              'order'   => 'ASC',
              'parent'  => 0
            ));
            if ($categories) foreach ($categories as $category):
              // sub categories
              $subCategories = get_categories(array(
                'child_of' => $category->term_id
              )); ?>
              <li class="header__item<?= ($subCategories) ? ' has-sub-category' : '' ?>">
                <a class="header__link" href="#"><?= trim($category->name) ?><i class="fi fi-arrow-down"></i></a>
                <?php if ($subCategories): ?>
                  <ul class="header__sub-category__list">
                    <?php foreach ($subCategories as $subCategory): ?>
                      <li class="header__sub-category__item">
                        <a class="header__sub-category__link" href="<?= get_term_link($subCategory->term_id) ?>"><?= $subCategory->name ?></a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </li>
              <?php endif; ?>
          <?php endforeach; ?>
          <li class="header__item">
            <a class="header__link" href="<?= site_url() ?>/participants">Participants</a>
          </li>
        </ul>
        <ul class="header__list">
          <li class="header__item">
            <a class="header__link" href="<?= site_url() ?>/about">About BDD</a>
          </li>
          <li class="header__item">
            <a class="header__link" href="<?= site_url() ?>/archive/2019/inclusivity/">Archive</a>
          </li>
          <li class="header__item">
            <a class="header__link" href="<?= site_url() ?>/strategic-partners">Strategic Partners</a>
          </li>
          <li class="header__item">
            <a class="header__link" href="<?= site_url() ?>/sponsors">Sponsors</a>
          </li>
          <li class="header__item">
            <a class="header__link" href="#">Press Release</a>
          </li>
        </ul>
        <ul class="header__list">
          <li class="header__item">
            <a class="header__link" href="#" target="_blank">Buy Ticket</a>
          </li>
          <li class="header__item">
            <a class="header__link" href="#" target="_blank">Download App</a>
          </li>
        </ul>
        <button class="header__search-btn btn js-header-search-btn" type="button">
          <i class="fi fi-search"></i>
          <span>Search</span>
        </button>
      </nav>
      <div class="header__search">
        <form class="header__search__form" action="<?= site_url() ?>">
          <input class="header__search__input" type="search" name="s" placeholder="ENTER A SEARCH TERM" />
          <button class="header__search__btn btn" type="submit">
            <i class="fi fi-search"></i>
          </button>
        </form>
      </div>
    </div>
    <div class="header__bottom">
      <ul class="header__socmed">
        <li class="header__socmed__item">
          <a class="header__socmed__link" href="#" target="_blank">
            <i class="fi fi-fb"></i>
          </a>
        </li>
        <li class="header__socmed__item">
          <a class="header__socmed__link" href="#" target="_blank">
            <i class="fi fi-tw"></i>
          </a>
        </li>
        <li class="header__socmed__item">
          <a class="header__socmed__link" href="#" target="_blank">
            <i class="fi fi-ig"></i>
          </a>
        </li>
      </ul>
      <p class="header__copyright">&copy; 2020 Bintaro Design District. All rights reserved.</p>
    </div>
  </div>
</header>
<!--/.header-->