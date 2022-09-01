/* ------------------------------------------------------------------------------
@name: About
@description: About
--------------------------------------------------------------------------------- */

const About = (() => {
  // - handleSideMenu
  const handleSideMenu = () => {
    if ($(".about__txt").length) {
      let _menu = "";
      $(".about__txt h3").each((i, v) => {
        $(v).attr("data-pane", i);
        const _txt = $(v).text();
        _menu +=
          '<li class="about__side__item">' +
          '<a class="about__side__link" href="#" data-target="' +
          $(i) +
          '">' +
          _txt +
          "</a>" +
          "</li>";
      });
      $(".about__side__list").html(_menu);
    }
  };

  // - init
  const init = () => {
    handleSideMenu();
  };

  return {
    init,
  };
})();

export default About;
