// --- utilities
import { Scrollable, BrowserCheck } from "utilities";

// --- components
import { Header, Search, Home } from "components";

// --- App
const App = (() => {
  // --- run transition
  const runTransition = () => {
    $("body").removeClass("hold-transition");
  };

  // --- show site content
  const showSiteContent = () => {
    $(".js-main-site").removeClass("main-site--hide");
    // --- disable scroll
    Scrollable.enable();
  };

  // --- ready
  const ready = () => {
    (($) => {
      // --- disable scroll
      Scrollable.disable();

      // --- Global
      runTransition();
      showSiteContent();
      BrowserCheck.init();

      // --- Project
      Header.init();
      Search.init();
      Home.init();
    })(jQuery);
  };

  // --- load
  const load = () => {
    (($) => {
      $(window).on("load", () => {});
    })(jQuery);
  };

  // --- init
  const init = () => {
    load();
    ready();
  };

  // --- return
  return {
    init,
  };
})();

// ---  run main js
App.init();
