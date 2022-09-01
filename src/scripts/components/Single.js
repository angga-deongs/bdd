/* ------------------------------------------------------------------------------
@name: Single
@description: Single
--------------------------------------------------------------------------------- */

const Single = (() => {
  // - handleRunCarousel
  const handleRunCarousel = () => {
    const _selector = $(".wp-block-gallery");
    const _itemLength = $(".wp-block-gallery .wp-block-image").length;
    const _itemRun = 1;

    // destroy carousel
    if (_selector.hasClass("owl-carousel")) {
      _selector.owlCarousel("destroy").removeClass("owl-carousel");
    }

    // --- check if itemLength > itemRun
    if (_itemLength > _itemRun) {
      // --- init carousel
      _selector.addClass("owl-carousel").owlCarousel({
        items: 1,
        autoplay: true,
        dots: false,
        nav: true,
        loop: true,
        touchDrag: true,
        mouseDrag: true,
        smartSpeed: 1000,
        autoplayHoverPause: false,
        autoplayTimeout: 6000,
      });
    } else {
      if (_selector.hasClass("owl-carousel")) {
        _selector.removeClass("owl-carousel");
      }
      _selector.addClass("wp-block-gallery--single");
    }
  };

  // - handleGallery
  const handleGallery = () => {
    $(".wp-block-image img").wrap("<div class='wp-block-image-box'></div>");
  };

  // - handleClickCopy
  const handleClickCopy = () => {
    $(".js-copy-link").on("click", (e) => {
      const _this = $(e.currentTarget);
      const _temp = $('<input type="text"/>');
      _this.parents(".single-events__share__item").addClass("show-tooltip");
      setTimeout(() => {
        _this
          .parents(".single-events__share__item")
          .removeClass("show-tooltip");
      }, 2000);

      $(".single-events__share__item:last").append(_temp);
      _temp.val(_this.attr("data-link")).select();
      document.execCommand("copy");
      _temp.remove();
      e.preventDefault();
    });
  };

  // - init
  const init = () => {
    handleClickCopy();
    if ($(".wp-block-gallery")) {
      handleRunCarousel();
      handleGallery();
    }
  };

  return {
    init,
  };
})();

export default Single;
