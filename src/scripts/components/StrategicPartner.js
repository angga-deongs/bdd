/* ------------------------------------------------------------------------------
@name: StrategicPartner
@description: StrategicPartner
--------------------------------------------------------------------------------- */

const StrategicPartner = (() => {
  // - handleSetSideMenu
  const handleSetSideMenu = () => {
    if ($(".strtgc-prtnr__txt").length) {
      let _menu = "";
      $(".strtgc-prtnr__txt h3").each((i, v) => {
        // set tab
        $(v).attr("data-pane", i);
        const _txt = $(v).text();
        _menu +=
          '<li class="strtgc-prtnr__side__item">' +
          '<a class="strtgc-prtnr__side__link" href="#" data-target="' +
          i +
          '">' +
          _txt +
          "</a>" +
          "</li>";
      });
      $(".strtgc-prtnr__side__list").html(_menu);
      $(".strtgc-prtnr__side__item:first").addClass("active");
    }
  };

  // - handleClickSideMenu
  const handleClickSideMenu = () => {
    $(".js-strtgc-prtnr-side-list a").on("click", (e) => {
      const _this = $(e.currentTarget);
      const _target = _this.attr("data-target");
      const _topHeight = $(".top").height();
      if (!_this.parents("li").hasClass("active")) {
        $(".strtgc-prtnr__posts").animate(
          {
            scrollTop:
              $('.strtgc-prtnr__txt h3[data-pane="' + _target + '"]').offset()
                .top -
              _topHeight -
              48,
          },
          500
        );
      }
      e.preventDefault();
    });
  };

  // - handleScrollSideMenu
  const handleScrollSideMenu = () => {
    $(".strtgc-prtnr__posts").on("scroll", () => {
      $(".strtgc-prtnr__txt h3").each((i, v) => {
        const _scrollTop = $(window).scrollTop();
        const _this = $(v);
        const _target = _this.attr("data-pane");
        const _offsetTop =
          $('.strtgc-prtnr__txt h3[data-pane="' + _target + '"]').offset().top -
          $(".strtgc-prtnr__side__list").height() -
          $(".top").height();
        if (_scrollTop > _offsetTop) {
          $(".strtgc-prtnr__side__item").removeClass("active");
          $('.strtgc-prtnr__side__item a[data-target="' + _target + '"]')
            .parent()
            .addClass("active");
        }
      });
    });
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

export default StrategicPartner;
