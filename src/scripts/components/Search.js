/* ------------------------------------------------------------------------------
@name: Search
@description: Search
--------------------------------------------------------------------------------- */

const Search = (() => {
  // - handleOpenSearch
  const handleOpenSearch = () => {
    $(".js-header-search .header__search__btn").on("click", (e) => {
      const _this = $(e.currentTarget);
      const _parents = _this.parents(".header__search");
      const _bar = _parents.find(".header__search__bar");
      if (!_bar.val().replace(/\s/g, "")) {
        _parents.addClass("header__search--show");
        setTimeout(() => {
          _bar.focus();
        }, 300);
        e.preventDefault();
      }
    });
  };

  // - handleCloseSearch
  const handleCloseSearch = () => {
    $(".js-header-search .header__search__bar").blur((e) => {
      const _this = $(e.currentTarget);
      const _parents = _this.parents(".header__search");
      if (_this.val()) {
        _parents.addClass("header__search--show");
      } else {
        _parents.removeClass("header__search--show");
      }
    });
    $(document).on("keyup", (e) => {
      if (e.which === 27) {
        if ($(".header__search").hasClass("header__search--show")) {
          $(".header__search").removeClass("header__search--show");
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
