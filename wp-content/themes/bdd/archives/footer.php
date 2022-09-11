<?php get_template_part("layouts/footer") ?>

<!-- script -->
<script src="<?= get_template_directory_uri() ?>/assets/js/vendor.min.js"></script>

<script>
  console.log('tes');
  $('.js-home-sub-category .home__sub-category__item').on('click', (e) => {
    const _this = $(e.currentTarget);
    e.preventDefault();
    const category = _this.attr('data-id');
    
    console.log(category);
    const _str = '&category=' + _category + '&action=filter';
    $.ajax({
      type: 'post',
      dataType: 'html',
      url: ajax_posts.ajaxUrl,
      data: _str,
      data: {
        action: 'filter',
        category: category
      },
      success: (data) => {
        const _data = $(data);
        console.log(_data);
        // _this.parents('.home__posts').find('.home__list').html(data);
      },
      error: (data) => {
        console.warn(data);
      }
    });
  });
</script>

<?php wp_footer() ?>

</body>

</html>
