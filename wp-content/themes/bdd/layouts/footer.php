<?php 
  $fields = get_fields(get_page_by_title('Footer'));
?>

<!--footer-->
<footer class="footer">
  <div class="container">
    <div class="footer__wrapper">
      <div class="footer__left">
        <?php if ($fields['menu']) foreach ($fields['menu'] as $value): ?>
          <div class="footer__col">
            <h6 class="footer__title"><?= $value['title'] ?></h6>
            <ul class="footer__menu">
              <?php if ($value['list']) foreach ($value['list'] as $item): ?>
                <li class="footer__menu__item">
                  <a class="footer__menu__link" href="<?= $item['link'] ?>"><?= $item['title'] ?></a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="footer__right">
        <div class="footer__desc">
          <p><?= $fields['description'] ?></p>
        </div>
        <div class="footer__newsletter">
          <h5 class="footer__newsletter__title">let’s keep in touch</h5>
          <div class="footer__newsletter__mailchimp">
            <?= $fields['mailchimp'] ?>
          </div>
        </div>
        <div class="footer__bottom">
          <a class="footer__bottom__link" href="<?= $fields['privacy_policy'] ?>">privacy policy</a>
          <h5 class="footer__copyright"><?= $fields['copyright'] ?></h5>
          <ul class="footer__socmed">
            <li class="footer__socmed__item">
              <a class="footer__socmed__link" href="<?= $fields['instagram'] ?>" target="_blank"><i class="fi fi-ig"></i></a>
            </li>
            <li class="footer__socmed__item">
              <a class="footer__socmed__link" href="<?= $fields['facebook'] ?>" target="_blank"><i class="fi fi-fb"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<!--/.footer-->

<!-- mailchimp -->
<?= $fields['mailchimp_script'] ?>
<!--/.mailchimp -->