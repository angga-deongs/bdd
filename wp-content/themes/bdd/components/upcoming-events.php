<!-- upcoming-events -->
<div class="upcoming-events">
  <?php
    $idEvents = 64; 
    $postEvent = get_post($idEvents); 
    $contentEvent = apply_filters('the_content', $postEvent->post_content); 
    echo $contentEvent;
  ?>
</div>
<!-- /upcoming-events -->