/* ------------------------------------------------------------------------------
@name: Scrollable
@description: Scrollable
--------------------------------------------------------------------------------- */

// --- Scrollable
const Scrollable = (() => {
  // --- handleEnable
  const handleEnable = () => {
    $("body").removeClass("rm-scroll");
  };

  // --- handleDisable
  const handleDisable = () => {
    $("body").addClass("rm-scroll");
  };

  // --- return
  return {
    enable: handleEnable,
    disable: handleDisable,
  };
})();

export default Scrollable;
