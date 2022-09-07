
<?php
  get_header();
?>

<!--main-site-->
<main class="main-site main-site--hide js-main-site">
  <!--article-->
  <article class="article">
    <div class="container">
      <div class="article__wrapper">
        <div class="article__content">
          <figure class="article__banner load-hidden">
            <?php if (get_field('banner')): ?>
              <img class="article__banner__el" src="<?= get_field('banner') ?>" alt="<?= get_the_title() ?>" />
            <?php else: ?>
              <img class="article__banner__el" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_title() ?>" />
            <?php endif; ?>
          </figure>
          <h5 class="article__page load-hidden">news</h5>
          <h1 class="article__title load-hidden"><?= get_the_title() ?></h1>
          <h2 class="article__date load-hidden"><?= get_the_date('j F Y') ?></h2>
          <div class="article__desc load-hidden">
            <?= the_content() ?>
          </div>
          <div class="article__pagination load-hidden">
            <?php
              // get_posts in same custom taxonomy
              $postlist_args = array(
                'post_type' => 'news',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'post_date',
                'order' => 'DESC',
              ); 
              $postlist = get_posts( $postlist_args );

              // get ids of posts retrieved from get_posts
              $ids = array();
              foreach ($postlist as $thepost) {
                $ids[] = $thepost->ID;
              }

              // get and echo previous and next post in the same taxonomy        
              $thisindex = array_search($post->ID, $ids);
              $previd = $ids[$thisindex-1];
              $nextid = $ids[$thisindex+1];
              if ( !empty($previd) ) {
                echo '<a class="article__pagination__left" href="' . get_permalink($previd) . '"><i class="fi fi-arrow-left"></i>Previous</a>';
              } else {
                echo '<a class="article__pagination__left disabled" href="' . get_permalink($previd) . '"><i class="fi fi-arrow-left"></i>Previous</a>';
              }
              if ( !empty($nextid) ) {
                echo '<a class="article__pagination__right" href="' . get_permalink($nextid) . '">Next<i class="fi fi-arrow-right"></i></a>';
              } else {
                echo '<a class="article__pagination__right disabled" href="' . get_permalink($nextid) . '">Next<i class="fi fi-arrow-right"></i></a>';
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </article>
  <!--/.article-->
</main>
<!--/.main-site-->

<?php
  get_footer();
?>
