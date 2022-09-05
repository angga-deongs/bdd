/* ------------------------------------------------------------------------------
@name: Category
@description: Category
--------------------------------------------------------------------------------- */

const Category = (() => {
  // - handleSetCategory
  const handleSetCategory = () => {
    if ($(window).width() >= 768) {
      const _category = $(".js-layout-primary");
      _category.imagesLoaded().progress(() => {
        /* isotope ------------------------------------------------------------------ */
        _category.isotope({
          itemSelector: ".card-primary",
          percentPosition: true,
          masonry: {
            gutter: 0,
            columnWidth: ".layout-primary__sizer",
          },
        });
      });
    } else {
      $(".layout-primary__list").removeAttr("style");
      $(".layout-primary__list .card-primary").removeAttr("style");
    }
  };

  // - init
  const init = () => {
    if ($(".js-layout-primary").length) {
      handleSetCategory();
    }
  };

  return {
    init,
    setCategory: handleSetCategory,
  };
})();

export default Category;
