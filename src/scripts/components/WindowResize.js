/*----------------------------------------
@name : components - windowresize
@description: Function to window resize
----------------------------------------
*/

import { Home, Category } from "components";

const WindowResize = (() => {
  let _timeout = false,
    _delta = 100,
    _rtime;

  // - handleWindowResize
  const handleWindowResize = () => {
    $(window).on("resize", () => {
      _rtime = new Date();
      if (_timeout === false) {
        _timeout = true;
        $("body").addClass("hold-transition");
        setTimeout(handleWindowResizeEnd, _delta);
      }
    });
  };

  const handleWindowResizeEnd = () => {
    if (new Date() - _rtime < _delta) {
      setTimeout(handleWindowResizeEnd, _delta);
    }
    // - end on window resize
    else {
      _timeout = false; // run function on Resize end
      $("body").removeClass("hold-transition");
      Category.setCategory();
    }
  };

  // - init
  const init = () => {
    handleWindowResize();
  };

  return {
    init,
  };
})();

export default WindowResize;
