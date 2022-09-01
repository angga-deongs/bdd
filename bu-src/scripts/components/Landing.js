/* ------------------------------------------------------------------------------
@name: Landing
@description: Landing
--------------------------------------------------------------------------------- */

const Landing = (() => {
  // - handleSetLanding
  const handleSetLanding = () => {
    $.scrollify({
      section: ".snap-section",
      sectionName: "section-name",
      setHeights: false,
      updateHash: false,
      scrollbars: false,
      standardScrollElements: ".header, .overlay, section",
      after: () => {
        $(".landing").addClass("show");
      },
    });
  };

  // - handleClickLogo
  const handleClickLogo = () => {
    $(".js-sidenav-logo").on("click", (e) => {
      $.scrollify.previous();
    });
  };

  // - handleClickArrow
  const handleClickArrow = () => {
    $(".js-landing-arrow").on("click", (e) => {
      $.scrollify.next();
    });
  };

  // - init
  const init = () => {
    handleSetLanding();
    handleClickLogo();
    handleClickArrow();
  };

  return {
    init,
  };
})();

export default Landing;
