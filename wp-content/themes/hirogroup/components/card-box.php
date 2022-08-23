<!--card-box-->
<div class="card-box load-hidden">
  <?php if (get_the_post_thumbnail_url($post->ID, 'original')): ?>
    <div class="card-box__img">
      <img class="card-box__img__el" src="<?= get_the_post_thumbnail_url($post->ID, 'original') ?>" alt="<?= the_title() ?>" />
    </div>
  <?php endif; ?>
  <div class="card-box__txt">
    <h1 class="card-box__title"><?= the_title() ?></h1>
    <div class="card-box__desc">
      <?= the_content() ?>
    </div>
  </div>
</div>
<!--/.card-box-->