/* ------------------------------------------------------------------------------
@name: Default
@description: Default
--------------------------------------------------------------------------------- */

const Default = (() => {
  // - handleSetSideMenu
  const handleSetSideMenu = () => {
    if ($(".default__txt").length) {
      let _menu = "";
      $(".default__txt h3").each((i, v) => {
        // set tab
        $(v).attr("data-pane", i);
        const _txt = $(v).text();
        _menu +=
          '<li class="default__side__item">' +
          '<a class="default__side__link" href="#" data-target="' +
          i +
          '">' +
          _txt +
          "</a>" +
          "</li>";
      });
      $(".default__side__list").html(_menu);
      $(".default__side__item:first").addClass("active");
    }
  };

  // - handleClickSideMenu
  const handleClickSideMenu = () => {
    $(".js-default-side-list a").on("click", (e) => {
      const _this = $(e.currentTarget);
      const _target = _this.attr("data-target");
      const _topHeight = $(".top").height();
      if (!_this.parents("li").hasClass("active")) {
        if ($(window).width() >= 992) {
          $(".default__posts").animate(
            {
              scrollTop:
                $('.default__txt h3[data-pane="' + _target + '"]').offset()
                  .top -
                _topHeight -
                48,
            },
            500
          );
        } else {
          $("html, body").animate(
            {
              scrollTop:
                $('.default__txt h3[data-pane="' + _target + '"]').offset()
                  .top -
                _topHeight -
                48,
            },
            500
          );
        }
      }
      e.preventDefault();
    });
  };

  // - handleScrollSideMenu
  const handleScrollSideMenu = () => {
    if ($(window).width() >= 992) {
      $(".default__posts").on("scroll", () => {
        $(".default__txt h3").each((i, v) => {
          const _scrollTop = $(window).scrollTop();
          const _this = $(v);
          const _target = _this.attr("data-pane");
          const _offsetTop =
            $('.default__txt h3[data-pane="' + _target + '"]').offset().top -
            $(".default__side__list").height() -
            $(".top").height();
          if (_scrollTop > _offsetTop) {
            $(".default__side__item").removeClass("active");
            $('.default__side__item a[data-target="' + _target + '"]')
              .parent()
              .addClass("active");
          }
        });
      });
    } else {
      $(window).on("scroll", () => {
        $(".default__txt h3").each((i, v) => {
          const _scrollTop = $(window).scrollTop();
          const _this = $(v);
          const _target = _this.attr("data-pane");
          const _offsetTop =
            $('.default__txt h3[data-pane="' + _target + '"]').offset().top -
            $(".default__side__list").height() -
            $(".top").height();
          if (_scrollTop > _offsetTop) {
            $(".default__side__item").removeClass("active");
            $('.default__side__item a[data-target="' + _target + '"]')
              .parent()
              .addClass("active");
          }
        });
      });
    }
  };

  // - init
  const init = () => {
    handleSetSideMenu();
    handleClickSideMenu();
    handleScrollSideMenu();
  };

  return {
    init,
  };
})();

export default Default;
