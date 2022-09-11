<?php
  $rel_categories = get_the_category();
  $rel_subcategories = [];
  if ($rel_categories) foreach ($rel_categories as $rel_category):
    if ($rel_category->parent !== 0) {
      $rel_subcategories[] = $rel_category->name;
    }
  endforeach;
?>

<!--card-primary-->
<div class="card-primary">
  <div class="card-primary__box">
    <a class="card-primary__link" href="<?= the_permalink() ?>"><?= get_the_title() ?></a>
    <figure class="card-primary__img">
      <img class="card-primary__img__el" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_title() ?>" />
    </figure>
    <h3 class="card-primary__title"><?= get_the_title() ?></h3>
    <?php if (get_field('date')): ?>
      <h6 class="card-primary__date"><?= get_field('date') ?></h6>
    <?php endif; ?>
    <h6 class="card-primary__tag"><?= implode(', ', $rel_subcategories) ?></h6>
    <p class="card-primary__desc"><?= get_the_excerpt() ?></p>
  </div>
</div>
<!--/card-primary-->