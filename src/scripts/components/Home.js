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
      if (_parents.hasClass("show-dropdown")) {
        _parents.removeClass("show-dropdown");
      } else {
        _parents.addClass("show-dropdown");
        if (
          _this
            .parents(".home__posts")
            .siblings(".home__posts")
            .find(".home__head")
            .hasClass("show-dropdown")
        ) {
          _this
            .parents(".home__posts")
            .siblings(".home__posts")
            .find(".home__head")
            .removeClass("show-dropdown");
        }
      }
      e.stopPropagation();
    });
  };

  // - handleCloseDropdownCategory
  const handleCloseDropdownCategory = () => {
    $("body").on("click", () => {
      if ($(".home__head").hasClass("show-dropdown")) {
        $(".home__head").removeClass("show-dropdown");
      }
    });
  };

  // - handleClickSubCategory
  const handleClickSubCategory = () => {
    if ($(window).width() >= 992) {
      $(".js-home-sub-category li").on("click", (e) => {
        const _this = $(e.currentTarget);
        const _txt = _this.text();
        const _parents = _this.parents(".home__head");
        _parents.find(".home__current-category").text(_txt);
        _this
          .addClass("active")
          .siblings(".home__sub-category__item")
          .removeClass("active");
        e.stopPropagation();
      });
    }
  };

  // - handleAjaxDropdown
  const handleAjaxDropdown = () => {
    $(".js-home-sub-category .home__sub-category__item").on("click", (e) => {
      const _this = $(e.currentTarget);
      const _category = _this.attr("data-id");
      const _str = "&category=" + _category + "&action=dropdown_ajax";
      $.ajax({
        type: "POST",
        dataType: "html",
        url: ajax_posts.ajaxurl,
        data: _str,
        success: (data) => {
          const _data = $(data);
          _this.parents(".home__posts").find(".home__list").html(_data);
          setTimeout(() => {
            if ($(".card-primary__img__el").length) {
              $(".card-primary__img__el").each((i, el) => {
                $(el).imagesLoaded(() => {
                  if (!$(el).parents(".card-primary").hasClass("is-visible")) {
                    $(el).parents(".card-primary").addClass("is-visible");
                  }
                });
              });
            }
          }, 100);
        },
        error: (data) => {},
      });
    });
  };

  // - init
  const init = () => {
    handleDropdownCategory();
    handleCloseDropdownCategory();
    handleClickSubCategory();
    handleAjaxDropdown();
  };

  return {
    init,
  };
})();

export default Home;
