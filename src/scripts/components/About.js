/* ------------------------------------------------------------------------------
@name: About
@description: About
--------------------------------------------------------------------------------- */

const About = (() => {
  // - handleSetSideMenu
  const handleSetSideMenu = () => {
    if ($(".about__txt").length) {
      let _menu = "";
      $(".about__txt h3").each((i, v) => {
        // set tab
        $(v).attr("data-pane", i);
        const _txt = $(v).text();
        _menu +=
          '<li class="about__side__item">' +
          '<a class="about__side__link" href="#" data-target="' +
          i +
          '">' +
          _txt +
          "</a>" +
          "</li>";
      });
      $(".about__side__list").html(_menu);
      $(".about__side__item:first").addClass("active");
    }
  };

  // - handleClickSideMenu
  const handleClickSideMenu = () => {
    $(".js-about-side-list a").on("click", (e) => {
      const _this = $(e.currentTarget);
      const _target = _this.attr("data-target");
      const _topHeight = $(".top").height();
      if (!_this.parents("li").hasClass("active")) {
        $(".about__posts").animate(
          {
            scrollTop:
              $('.about__txt h3[data-pane="' + _target + '"]').offset().top -
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
    $(".about__posts").on("scroll", () => {
      $(".about__txt h3").each((i, v) => {
        const _scrollTop = $(window).scrollTop();
        const _this = $(v);
        const _target = _this.attr("data-pane");
        const _offsetTop =
          $('.about__txt h3[data-pane="' + _target + '"]').offset().top -
          $(".about__side__list").height() -
          $(".top").height();
        if (_scrollTop > _offsetTop) {
          $(".about__side__item").removeClass("active");
          $('.about__side__item a[data-target="' + _target + '"]')
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

export default About;
