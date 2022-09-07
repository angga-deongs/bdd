<!-- upcoming-events -->
<div class="upcoming-events">
  <?php
    // query for get the content another page
    $your_query = new WP_Query( 'pagename=upcoming-events' );
    while ( $your_query->have_posts() ) : $your_query->the_post();
        the_content();
    endwhile;
    wp_reset_postdata();
  ?>
</div>
<!-- /upcoming-events -->