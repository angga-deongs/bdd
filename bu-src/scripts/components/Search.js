/* ------------------------------------------------------------------------------
@name: Search
@description: Search
--------------------------------------------------------------------------------- */

const Search = (() => {
  // - handleOpenSearch
  const handleOpenSearch = () => {
    $(".js-top-search .top__search__btn").on("click", (e) => {
      const _this = $(e.currentTarget);
      const _parents = _this.parents(".top__search");
      const _bar = _parents.find(".top__search__bar");
      if (!_bar.val().replace(/\s/g, "")) {
        _parents.addClass("top__search--show");
        setTimeout(() => {
          _bar.focus();
        }, 300);
        e.preventDefault();
      }
    });
  };

  // - handleCloseSearch
  const handleCloseSearch = () => {
    $(".js-top-search .top__search__bar").blur((e) => {
      const _this = $(e.currentTarget);
      const _parents = _this.parents(".top__search");
      if (_this.val()) {
        _parents.addClass("top__search--show");
      } else {
        _parents.removeClass("top__search--show");
      }
    });
    $(document).on("keyup", (e) => {
      if (e.which === 27) {
        if ($(".top__search").hasClass("top__search--show")) {
          $(".top__search").removeClass("top__search--show");
        }
      }
    });
  };

  // - init
  const init = () => {
    handleOpenSearch();
    handleCloseSearch();
  };

  return {
    init,
  };
})();

export default Search;
