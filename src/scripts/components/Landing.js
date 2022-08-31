/* ------------------------------------------------------------------------------
@name: Landing
@description: Landing
--------------------------------------------------------------------------------- */

const Landing = (() => {
  // - handleSetLanding
  const handleSetLanding = () => {
    $.scrollify({
      section: ".landing",
    });
  };

  // - init
  const init = () => {
    handleSetLanding();
  };

  return {
    init,
  };
})();

export default Landing;
