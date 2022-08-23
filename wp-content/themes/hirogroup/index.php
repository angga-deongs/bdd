<?php
  $fields = get_fields(get_page_by_title('Home'));
  // get_header();
?>

<!--main-site-->
<main class="main-site main-site--hide js-main-site">
  <?php get_template_part("components/upcoming-events") ?>
  <?php
    // categories
    $categories = get_categories(array(
      'orderby' => 'name',
      'order'   => 'ASC',
      'parent'  => 0
    ));
    if ($categories): ?>
      <ul>
        <?php foreach ($categories as $category): ?>
          <li><?= trim($category->name) ?>
            <?php
              // sub categories
              $subCategories = get_categories(array(
                'child_of' => $category->term_id
              ));
              if ($subCategories): ?>
                <ul>
                  <?php foreach ($subCategories as $subCategory): ?>
                    <li><?= $subCategory->name ?></li>
                  <?php endforeach; ?>
                </ul>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <?php
      // echo "<pre>";
      // var_dump($categories);
      // echo "</pre>";
    ?>
</main>
<!--/.main-site-->

<?php
  // get_footer();
?>
