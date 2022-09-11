<?php
  $fields = get_fields(get_page_by_title('Home'));
  get_header();
?>

<!--snap-->
<div class="snap">

  <!--landing-->
  <div class="landing snap-section" data-section-name="landing">
    <div class="landing__img">
      <img class="landing__img__el landing__img__el--d" src="<?= $fields['image_d'] ?>" alt="<?= $fields['title'] ?>" />
      <img class="landing__img__el landing__img__el--m" src="<?= $fields['image_m'] ?>" alt="<?= $fields['title'] ?>" />
    </div>
    <div class="landing__logo">
      <img class="landing__logo__el" src="<?= get_template_directory_uri() ?>/assets/img/logo/bintaro-design-district-white.svg" alt="<?= $fields['title'] ?>" />
    </div>
    <div class="landing__txt">
      <h2 class="landing__txt__title"><?= $fields['title'] ?></h2>
      <p class="landing__txt__desc"><?= $fields['description'] ?></p>
      <img class="landing__txt__img" src="<?= $fields['logo'] ?>" alt="<?= $fields['title'] ?>" />
      <h2 class="landing__txt__year"><?= $fields['year'] ?></h2>
    </div>
    <div class="landing__arrow js-landing-arrow">
      <img class="landing__arrow__el" src="<?= get_template_directory_uri() ?>/assets/img/icons/arrow-landing.svg" alt="arrow" />
    </div>
  </div>
  <!--/landing-->

  <!--main-site-->
  <main class="main-site main-site--hide js-main-site snap-section" data-section-name="main">

    <!--top-->
    <div class="top">
      <div class="container">
        <div class="top__content">
          <h1 class="top__txt js-sidenav-logo">BINTARO DESIGN DISTRICT<span>2020</span></h1>
          <form class="top__search js-top-search" action="<?= site_url() ?>">
            <input class="top__search__bar" type="search" name="s" placeholder="ENTER A SEARCH TERM..." autocomplete="off" />
            <button class="top__search__btn btn btn--secondary" type="submit">
              <span>Search</span>
              <i class="fi fi-search"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
    <!--/top-->

    <!--home-->
    <div class="home">
      <div class="container">
        <div class="home__content">
          <!--home-nav-->
          <section class="home__side">
            <!--sidenav-->
            <div class="sidenav">
              <div class="sidenav__head">
                <button class="sidenav__logo btn js-sidenav-logo" type="button">
                  <img class="sidenav__logo__el" src="<?= get_template_directory_uri() ?>/assets/img/logo/bintaro-design-district.svg" alt="<?= $fields['title'] ?>" />
                </button>
                <button class="burger-menu js-burger-menu">
                  <span class="burger-menu__bar"></span>
                  <span class="burger-menu__bar"></span>
                  <span class="burger-menu__bar"></span>
                </button>
              </div>
            </div>
            <!--/sidenav-->
            <?php get_template_part("components/upcoming-events") ?>
          </section>
          <!--home-posts-->
          <section class="home__posts">
            <!--home-head-->
            <div class="home__head">
              <button class="home__category btn btn--secondary js-home-posts-category" type="button">
                <span class="home__category__name">Main Events</span>
                <i class="fi fi-arrow-right"></i>
                <i class="fi fi-arrow-down"></i></button>
              <span class="home__current-category">Talk & Workshop</span>
              <ul class="home__sub-category js-home-sub-category">
                <li class="home__sub-category__item">Open Studio</li>
                <li class="home__sub-category__item">Exhibition</li>
                <li class="home__sub-category__item">Open Architecture</li>
                <li class="home__sub-category__item">Talk & Workshop</li>
              </ul>
            </div>
            <!--home-list-->
            <div class="home__list">
              <!--card-primary-->
              <div class="card-primary">
                <div class="card-primary__box">
                  <a class="card-primary__link" href="single.html">BDD Center Competition</a>
                  <figure class="card-primary__img">
                    <img class="card-primary__img__el" src="<?= get_template_directory_uri() ?>/assets/img/dummy/post-1.jpg" alt="BDD Center Competition" />
                  </figure>
                  <h3 class="card-primary__title">BDD Center Competition</h3>
                  <h6 class="card-primary__date">26 March 2020</h6>
                  <h6 class="card-primary__tag">Exhibition</h6>
                  <p class="card-primary__desc">BDD Center Competition uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
                </div>
              </div>
              <!--/card-primary-->
              <!--card-primary-->
              <div class="card-primary">
                <div class="card-primary__box">
                  <a class="card-primary__link" href="single.html">Curatorial Review</a>
                  <figure class="card-primary__img">
                    <img class="card-primary__img__el" src="<?= get_template_directory_uri() ?>/assets/img/dummy/post-2.jpg" alt="Curatorial Review" />
                  </figure>
                  <h3 class="card-primary__title">Curatorial Review</h3>
                  <h6 class="card-primary__date">12 March 2020</h6>
                  <h6 class="card-primary__tag">Exhibition</h6>
                  <p class="card-primary__desc">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn’t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>
                </div>
              </div>
              <!--/card-primary-->
              <!--card-primary-->
              <div class="card-primary">
                <div class="card-primary__box">
                  <a class="card-primary__link" href="single.html">Curatorial Review</a>
                  <figure class="card-primary__img">
                    <img class="card-primary__img__el" src="<?= get_template_directory_uri() ?>/assets/img/dummy/post-3.jpg" alt="Curatorial Review" />
                  </figure>
                  <h3 class="card-primary__title">Curatorial Review</h3>
                  <h6 class="card-primary__date">12 March 2020</h6>
                  <h6 class="card-primary__tag">Exhibition</h6>
                  <p class="card-primary__desc">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn’t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>
                </div>
              </div>
              <!--/card-primary-->
              <!--card-primary-->
              <div class="card-primary">
                <div class="card-primary__box">
                  <a class="card-primary__link" href="single.html">Arkonin’s Open Exhibition by PT. Arkonin</a>
                  <figure class="card-primary__img">
                    <img class="card-primary__img__el" src="<?= get_template_directory_uri() ?>/assets/img/dummy/post-4.jpg" alt="Arkonin’s Open Exhibition by PT. Arkonin" />
                  </figure>
                  <h3 class="card-primary__title">Arkonin’s Open Exhibition by PT. Arkonin</h3>
                  <h6 class="card-primary__date">12 March 2020</h6>
                  <h6 class="card-primary__tag">Exhibition</h6>
                  <p class="card-primary__desc">This installation stands on the land to be built by an Extension School of Sayap Ibu Foundation. which this allows visitors to feel a position as children with disabilities in carrying out their daily activities.</p>
                </div>
              </div>
              <!--/card-primary-->
              <!--card-primary-->
              <div class="card-primary">
                <div class="card-primary__box">
                  <a class="card-primary__link" href="single.html">Parklet: Place Making for Inclusive City</a>
                  <figure class="card-primary__img">
                    <img class="card-primary__img__el" src="<?= get_template_directory_uri() ?>/assets/img/dummy/post-5.jpg" alt="Parklet: Place Making for Inclusive City" />
                  </figure>
                  <h3 class="card-primary__title">Parklet: Place Making for Inclusive City</h3>
                  <h6 class="card-primary__date">12 March 2020</h6>
                  <h6 class="card-primary__tag">Exhibition</h6>
                  <p class="card-primary__desc">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn’t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>
                </div>
              </div>
              <!--/card-primary-->
            </div>
            <a class="home__action btn btn--primary" href="category.html">See All</a>
          </section>
          <!--home-posts-->
          <section class="home__posts">
            <!--home-head-->
            <div class="home__head">
              <button class="home__category btn btn--secondary js-home-posts-category" type="button">
                <span class="home__category__name">Installation</span>
                <i class="fi fi-arrow-right"></i>
                <i class="fi fi-arrow-down"></i></button>
              <span class="home__current-category"></span>
              <ul class="home__sub-category js-home-sub-category">
                <li class="home__sub-category__item">1 x 1 Installation</li>
                <li class="home__sub-category__item">Chair Exhibition</li>
              </ul>
            </div>
            <!--home-list-->
            <div class="home__list">
              <!--card-primary-->
              <div class="card-primary">
                <div class="card-primary__box">
                  <a class="card-primary__link" href="single.html">Security Post by Budipradono Architects</a>
                  <figure class="card-primary__img">
                    <img class="card-primary__img__el" src="<?= get_template_directory_uri() ?>/assets/img/dummy/post-6.jpg" alt="Security Post by Budipradono Architects" />
                  </figure>
                  <h3 class="card-primary__title">Security Post by Budipradono Architects</h3>
                  <h6 class="card-primary__date">26 March 2020</h6>
                  <h6 class="card-primary__tag">Studio</h6>
                  <p class="card-primary__desc">BDD Center Competition uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
                </div>
              </div>
              <!--/card-primary-->
              <!--card-primary-->
              <div class="card-primary">
                <div class="card-primary__box">
                  <a class="card-primary__link" href="single.html">Diff-a-ble by Studio ArsitektropiS</a>
                  <figure class="card-primary__img">
                    <img class="card-primary__img__el" src="<?= get_template_directory_uri() ?>/assets/img/dummy/post-7.jpg" alt="Diff-a-ble by Studio ArsitektropiS" />
                  </figure>
                  <h3 class="card-primary__title">Diff-a-ble by Studio ArsitektropiS</h3>
                  <h6 class="card-primary__date">12 March 2020</h6>
                  <h6 class="card-primary__tag">Studio</h6>
                  <p class="card-primary__desc">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn’t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>
                </div>
              </div>
              <!--/card-primary-->
              <!--card-primary-->
              <div class="card-primary">
                <div class="card-primary__box">
                  <a class="card-primary__link" href="single.html">Comparing Perspective by Rumah Miring by CGartspace</a>
                  <figure class="card-primary__img">
                    <img class="card-primary__img__el" src="<?= get_template_directory_uri() ?>/assets/img/dummy/post-8.jpg" alt="Comparing Perspective by Rumah Miring by CGartspace" />
                  </figure>
                  <h3 class="card-primary__title">Comparing Perspective by Rumah Miring by CGartspace</h3>
                  <h6 class="card-primary__date">12 March 2020</h6>
                  <h6 class="card-primary__tag">Studio</h6>
                  <p class="card-primary__desc">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn’t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>
                </div>
              </div>
              <!--/card-primary-->
              <!--card-primary-->
              <div class="card-primary">
                <div class="card-primary__box">
                  <a class="card-primary__link" href="single.html">Arkonin’s Open Exhibition by PT. Arkonin</a>
                  <figure class="card-primary__img">
                    <img class="card-primary__img__el" src="<?= get_template_directory_uri() ?>/assets/img/dummy/post-9.jpg" alt="Arkonin’s Open Exhibition by PT. Arkonin" />
                  </figure>
                  <h3 class="card-primary__title">Arkonin’s Open Exhibition by PT. Arkonin</h3>
                  <h6 class="card-primary__date">12 March 2020</h6>
                  <h6 class="card-primary__tag">Studio</h6>
                  <p class="card-primary__desc">This installation stands on the land to be built by an Extension School of Sayap Ibu Foundation. which this allows visitors to feel a position as children with disabilities in carrying out their daily activities.</p>
                </div>
              </div>
              <!--/card-primary-->
              <!--card-primary-->
              <div class="card-primary">
                <div class="card-primary__box">
                  <a class="card-primary__link" href="single.html">AlvinT x Museum Macan</a>
                  <figure class="card-primary__img">
                    <img class="card-primary__img__el" src="<?= get_template_directory_uri() ?>/assets/img/dummy/post-10.jpg" alt="AlvinT x Museum Macan" />
                  </figure>
                  <h3 class="card-primary__title">AlvinT x Museum Macan</h3>
                  <h6 class="card-primary__date">12 March 2020</h6>
                  <h6 class="card-primary__tag">Studio</h6>
                  <p class="card-primary__desc">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn’t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>
                </div>
              </div>
              <!--/card-primary-->
            </div>
            <a class="home__action btn btn--primary" href="category.html">See All</a>
          </section>
          <!--home-posts-->
          <section class="home__posts">
            <!--home-head-->
            <div class="home__head">
              <button class="home__category btn btn--secondary js-home-posts-category" type="button">
                <span class="home__category__name">Collateral Events</span>
                <i class="fi fi-arrow-right"></i>
                <i class="fi fi-arrow-down"></i></button>
              <span class="home__current-category"></span>
              <ul class="home__sub-category js-home-sub-category">
                <li class="home__sub-category__item">Collateral Events 1</li>
                <li class="home__sub-category__item">Collateral Events 2</li>
                <li class="home__sub-category__item">Collateral Events 3</li>
              </ul>
            </div>
            <!--home-list-->
            <div class="home__list">
              <!--card-primary-->
              <div class="card-primary">
                <div class="card-primary__box">
                  <a class="card-primary__link" href="single.html">Security Post by Budipradono Architects</a>
                  <figure class="card-primary__img">
                    <img class="card-primary__img__el" src="<?= get_template_directory_uri() ?>/assets/img/dummy/post-11.jpg" alt="Security Post by Budipradono Architects" />
                  </figure>
                  <h3 class="card-primary__title">Security Post by Budipradono Architects</h3>
                  <h6 class="card-primary__date">26 March 2020</h6>
                  <h6 class="card-primary__tag">Talks</h6>
                  <p class="card-primary__desc">BDD Center Competition uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
                </div>
              </div>
              <!--/card-primary-->
              <!--card-primary-->
              <div class="card-primary">
                <div class="card-primary__box">
                  <a class="card-primary__link" href="single.html">Diff-a-ble by Studio ArsitektropiS</a>
                  <figure class="card-primary__img">
                    <img class="card-primary__img__el" src="<?= get_template_directory_uri() ?>/assets/img/dummy/post-12.jpg" alt="Diff-a-ble by Studio ArsitektropiS" />
                  </figure>
                  <h3 class="card-primary__title">Diff-a-ble by Studio ArsitektropiS</h3>
                  <h6 class="card-primary__date">12 March 2020</h6>
                  <h6 class="card-primary__tag">Talks</h6>
                  <p class="card-primary__desc">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn’t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>
                </div>
              </div>
              <!--/card-primary-->
              <!--card-primary-->
              <div class="card-primary">
                <div class="card-primary__box">
                  <a class="card-primary__link" href="single.html">Comparing Perspective by Rumah Miring by CGartspace</a>
                  <figure class="card-primary__img">
                    <img class="card-primary__img__el" src="<?= get_template_directory_uri() ?>/assets/img/dummy/post-13.jpg" alt="Comparing Perspective by Rumah Miring by CGartspace" />
                  </figure>
                  <h3 class="card-primary__title">Comparing Perspective by Rumah Miring by CGartspace</h3>
                  <h6 class="card-primary__date">12 March 2020</h6>
                  <h6 class="card-primary__tag">Talks</h6>
                  <p class="card-primary__desc">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn’t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>
                </div>
              </div>
              <!--/card-primary-->
              <!--card-primary-->
              <div class="card-primary">
                <div class="card-primary__box">
                  <a class="card-primary__link" href="single.html">Arkonin’s Open Exhibition by PT. Arkonin</a>
                  <figure class="card-primary__img">
                    <img class="card-primary__img__el" src="<?= get_template_directory_uri() ?>/assets/img/dummy/post-14.jpg" alt="Arkonin’s Open Exhibition by PT. Arkonin" />
                  </figure>
                  <h3 class="card-primary__title">Arkonin’s Open Exhibition by PT. Arkonin</h3>
                  <h6 class="card-primary__date">12 March 2020</h6>
                  <h6 class="card-primary__tag">Talks</h6>
                  <p class="card-primary__desc">This installation stands on the land to be built by an Extension School of Sayap Ibu Foundation. which this allows visitors to feel a position as children with disabilities in carrying out their daily activities.</p>
                </div>
              </div>
              <!--/card-primary-->
              <!--card-primary-->
              <div class="card-primary">
                <div class="card-primary__box">
                  <a class="card-primary__link" href="single.html">AlvinT x Museum Macan</a>
                  <figure class="card-primary__img">
                    <img class="card-primary__img__el" src="<?= get_template_directory_uri() ?>/assets/img/dummy/post-15.jpg" alt="AlvinT x Museum Macan" />
                  </figure>
                  <h3 class="card-primary__title">AlvinT x Museum Macan</h3>
                  <h6 class="card-primary__date">12 March 2020</h6>
                  <h6 class="card-primary__tag">Talks</h6>
                  <p class="card-primary__desc">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn’t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>
                </div>
              </div>
              <!--/card-primary-->
            </div>
            <a class="home__action btn btn--primary" href="category.html">See All</a>
          </section>
        </div>
        <div class="home__copyright">
          <p class="home__copyright__txt">2020 Bintaro Design District. All rights reserved.</p>
        </div>
      </div>
    </div>
    <!--/home-->

  </main>
  <!--/main-site-->

</div>
<!--/snap-->

<?php
  get_footer();
?>
