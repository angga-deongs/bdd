/* ------------------------------------------------------------------------------
@name: Home
@description: Home
--------------------------------------------------------------------------------- */

const Home = (() => {
  // - handleDropdownCategory
  const handleDropdownCategory = () => {
    $(".js-home-posts-category").on("click", (e) => {
      const _this = $(e.currentTarget);
      const _parents = _this.parents(".home__head");
      if (_parents.hasClass("show-sub-category")) {
        _parents.removeClass("show-sub-category");
      } else {
        _parents.addClass("show-sub-category");
        if (
          _this
            .parents(".home__posts")
            .siblings(".home__posts")
            .find(".home__head")
            .hasClass("show-sub-category")
        ) {
          _this
            .parents(".home__posts")
            .siblings(".home__posts")
            .find(".home__head")
            .removeClass("show-sub-category");
        }
      }
    });
  };

  // - init
  const init = () => {
    handleDropdownCategory();
  };

  return {
    init,
  };
})();

export default Home;
