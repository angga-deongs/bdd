/* ------------------------------------------------------------------------------
@name: Header
@description: Header
--------------------------------------------------------------------------------- */

// - utilities
import { Scrollable } from "utilities";

const Header = (() => {
  // - handleMobileMenu
  const handleMobileMenu = () => {
    $(".js-burger-menu").on("click", () => {
      handleHideMobileMenu();
    });
  };

  // - handleCloseMobileMenu
  const handleCloseMobileMenu = () => {
    $(".js-close-mobile-menu").on("click", () => {
      $("body").removeClass("show-navigation");
      Scrollable.enable();
    });
    $(".js-overlay").on("click", () => {
      handleHideMobileMenu();
    });
    $(document).on("keyup", (e) => {
      if (e.which === 27) {
        if ($("body").hasClass("show-navigation")) {
          $("body").removeClass("show-navigation");
          Scrollable.enable();
        }
      }
    });
  };

  // - handleHideMobileMenu
  const handleHideMobileMenu = () => {
    if ($("body").hasClass("show-navigation")) {
      $("body").removeClass("show-navigation");
      Scrollable.enable();
    } else {
      $("body").addClass("show-navigation");
      Scrollable.disable();
    }
  };

  // - handleDropdownMenu
  const handleDropdownMenu = () => {
    $(".js-header-menu .has-sub-category .header__link").on("click", (e) => {
      const _this = $(e.currentTarget);
      const _parents = _this.parents(".header__item");
      if (_parents.hasClass("show-sub-category")) {
        _parents.removeClass("show-sub-category");
        _parents.find(".header__sub-category__list").slideUp();
      } else {
        _parents.addClass("show-sub-category");
        _parents.find(".header__sub-category__list").slideDown();
        if (_parents.siblings(".header__item").hasClass("show-sub-category")) {
          _parents.siblings(".header__item").removeClass("show-sub-category");
          _parents
            .siblings(".header__item")
            .find(".header__sub-category__list")
            .slideUp();
        }
      }
      e.preventDefault();
    });
  };

  // - init
  const init = () => {
    handleMobileMenu();
    handleCloseMobileMenu();
    handleDropdownMenu();
  };

  return {
    init,
  };
})();

export default Header;
