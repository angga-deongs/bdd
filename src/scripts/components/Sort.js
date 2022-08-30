/* ------------------------------------------------------------------------------
@name: Sort
@description: Sort
--------------------------------------------------------------------------------- */

const Sort = (() => {
  // - handleClickSort
  const handleClickSort = () => {
    $(".js-sort-btn").on("click", (e) => {
      $(e.currentTarget).parents(".sort").toggleClass("show-sort");
      e.stopPropagation();
    });
    $(".sort__link").on("click", (e) => {
      e.stopPropagation();
    });
  };

  // - handleCloseSort
  const handleClsoeSort = () => {
    $("body").on("click", () => {
      if ($(".sort").hasClass("show-sort")) {
        $(".sort").removeClass("show-sort");
      }
    });
  };

  // - init
  const init = () => {
    handleClickSort();
    handleClsoeSort();
  };

  return {
    init,
  };
})();

export default Sort;
