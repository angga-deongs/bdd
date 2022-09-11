<!--top-->
<div class="top">
  <div class="container">
    <div class="top__content">
      <?php if (is_home()): ?>
        <h1 class="top__txt js-sidenav-logo">BINTARO DESIGN DISTRICT<span>2020</span></h1>
      <?php else: ?>
        <h1 class="top__txt"><a href="<?= site_url() ?>">BINTARO DESIGN DISTRICT<span>2020</span></a></h1>
      <?php endif; ?>
      </h1>
      <form class="top__search js-top-search<?= (isset($_GET['s']) ? ' top__search--show' : '') ?>" action="<?= site_url() ?>">
        <input class="top__search__bar" type="search" name="s" placeholder="ENTER A SEARCH TERM..." autocomplete="off" <?= (isset($_GET['s'])) ? 'value='.$_GET['s'] : ''; ?> />
        <button class="top__search__btn btn btn--secondary" type="submit">
          <span>Search</span>
          <i class="fi fi-search"></i>
        </button>
      </form>
    </div>
  </div>
</div>
<!--/top-->
