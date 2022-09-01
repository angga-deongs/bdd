/* ------------------------------------------------------------------------------
@name: Category
@description: Category
--------------------------------------------------------------------------------- */

const Category = (() => {
  // - handleSetCategory
  const handleSetCategory = () => {
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
  };

  // - init
  const init = () => {
    handleSetCategory();
  };

  return {
    init,
  };
})();

export default Category;
