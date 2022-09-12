/* ------------------------------------------------------------------------------
@name: NavCategory
@description: NavCategory
--------------------------------------------------------------------------------- */

const NavCategory = (() => {
  // --- handleFocus
  const handleFocus = () => {
    if ($(".layout-primary__sub-category__item.active").length) {
      let _scrollLeft =
        $(".layout-primary__sub-category__item.active").position().left - 24;

      $(".layout-primary__main").animate(
        {
          scrollLeft: _scrollLeft,
        },
        0
      );
    }

    if ($(".archive__side__item.active").length) {
      let _scrollLeft = $(".archive__side__item.active").position().left - 24;

      $(".archive__side__inner").animate(
        {
          scrollLeft: _scrollLeft,
        },
        0
      );
    }
  };

  // --- init
  const init = () => {
    handleFocus();
  };

  return {
    init,
  };
})();

export default NavCategory;
